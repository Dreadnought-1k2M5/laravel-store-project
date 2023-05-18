<?php

namespace App\Http\Controllers\Web;

use Omnipay\Omnipay;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\PaymentRequest;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest'); //returns Omnipay class/instance
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID')); //refers to .env
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET')); //refers to .env
        $this->gateway->setTestMode(true); // set to true since this is only testing mode
    }
    public function deleteOrder($order_id){
        OrderItems::where('order_id', $order_id)->delete();
        Shipping::where('order_id', $order_id)->delete();
        Order::where('id', $order_id)->delete();
    }

    public function pay(PaymentRequest $request){ //this function handles the payment request from your website to paypal.
        $user_id = Auth::user()->id;
        $cart = Carts::getCartProductJoin($user_id);
        
        if($request->payment_method == "cod"){
            $order = Order::create([ //create order entry
                'customer_id' => Auth::user()->id,
                'payment_status' => "pending",
                'payment_method' => "cash-on-delivery",
                'order_status' => "processing"
            ]);
            OrderItems::mapItem($cart, $order->id); //create order items entry with 1 columnr referencing $order entry.
            Shipping::insertInfo($request->safe()->except(['_token', 'payment_method', 'amount']), $order->id);
            Carts::where('user_id', Auth::user()->id)->delete(); //MODIFY LATER FOR GUEST USER.  

            return redirect('/cart');
        }else if($request->payment_method == "paypal"){    
            $order = Order::create([ //create order entry
                'customer_id' => Auth::user()->id, //MODIFY LATER FOR GUEST USER.
                'payment_status' => "Pending",
                'payment_method' => "PayPal",
                'order_status' => "Processing"
            ]);
            OrderItems::mapItem($cart, $order->id); //create order items entry with 1 columnr referencing $order entry.
            Shipping::insertInfo($request->safe()->except(['_token', 'payment_method', 'amount']), $order->id);
            try{
                $response = $this->gateway->purchase(array(
                    'amount' => $request->amount, //amount you want to pay
                    'currency' => env('PAYPAL_CURRENCY'), //currency specified at .env file
                    'returnUrl' => url('success', [$order->id]), //redirect to the specified url after payment is done.
                    'cancelUrl' => url('error', [$order->id]) //redirect to the specified url when payment is canceld or cannot be payed
                ))->send();
    
                if($response->isRedirect()){//if the response (->send()) is successful
                    $response->redirect(); //redirect to paypal payment page.
                }
                else{
                    $this->deleteOrder($order->id);
                    return $response->getMessage(); // get the error message.
                }
            }catch(\Throwable $th){
                $this->deleteOrder($order->id);
                return $th->getMessage(); // get/return error message
            }
        }
    }

    public function success(Request $request, $id){ //function is called when done with the paypal payment page
        $order_id = (int)$id;
        if($request->input('paymentId') && $request->input('PayerID')){ //check if if paymentID and payerID is in the request input
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
            if($response->isSuccessful()){ //if transaction is successful
                $arr = $response->getData();

                Carts::where('user_id', Auth::user()->id)->delete(); //MODIFY LATER FOR GUEST USER.  

                //store transaction information to the payment table.
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->payment_status = $arr['state'];
                $payment->currency = env('PAYPAL_CURRENCY');

                $payment->save();

                Order::where('id', $order_id)->update(['payment_status' => 'Paid1']);

                return "Payment is successful. Transaction ID: " . $arr['id'];
            }
            else{

                $this->deleteOrder($order_id);
                return $response->getMessage();
            }
        }else{
            $this->deleteOrder($order_id);
            return "Payment declined!";
        }
    }
    public function error($id){
        $order_id = (int)$id;
        $this->deleteOrder($order_id);
        
        return redirect('/cart');
        //return "User declined the payment!";
    }
}
