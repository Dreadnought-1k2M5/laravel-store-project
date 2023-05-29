<?php

namespace App\Http\Controllers\Web;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
/*         if(Auth::user()){
            return response(Auth::user());

        }else{
            return response("user not logged in");
        } */
        //Check if product_quantity is somehow greater than the total stock available
        $currentStock = Products::select('product_stock')->where('id', $request->product_id)->get();
        if($request->product_quantity > $currentStock[0]->product_stock){
            return back();
        }
        /* Checks if the product is not on the cart and checks if
        it belongs to the currently authenticated user */
        if(Carts::check( $request->product_id, Auth::user()->id)->get()->isEmpty()){
            $user_id = Auth::user()->id;
            //Reduce available stock
            Products::changeStock($request->product_id, $request->product_name, $request->product_quantity);
            $totalPrice = $request->product_quantity * $request->product_price;
            Carts::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'total_price' => $totalPrice
            ]);
            return redirect('/cart')->with('message', 'Product added to cart');;
        }
        /* Checks if the given product is already at the cart and
        it belongs to the currently authenticated user, then increment the product_quantity value */
        else if(Carts::check( $request->product_id, Auth::user()->id)->get()->isNotEmpty()){
            //target product_id of row and user_id when getting the value
            Products::changeStock($request->product_id, $request->product_name, $request->product_quantity);
            Carts::increaseQuantity($request->product_id, $request->product_quantity);
            return redirect('/cart')->with('message', 'Product added to cart');
        }
    }

    public function show(){
        //ADD MORE FOR SESSION/GUEST USERS
        $user_id = Auth::user()->id;
        $join = Carts::getCartProductJoin($user_id);
        return view('pages.cart', ['Cart' => $join ]);
    }

    public function delete(Request $request, Carts $cart){
        //Get quantity from product in cart to be put back to available stock
        $quantity = $cart->where('product_id', $request->target_item)->where('user_id', $request->user_id)->get()[0]->product_quantity;
        
        $product = Products::find($request->target_item);
        $product->product_stock += $quantity;
        $product->save();
        
        if($request->user_id != Auth::user()->id){
            return response ("ERROR");
        }
        $cart->where('product_id', $request->target_item)->where('user_id', $request->user_id)->delete();
        return back();
    }

    public function updateQuantity(Request $request, $id){
        $cartItemId = (int)$id; /// the Cart ID of the product in the cart
        $operation = $request->operation;
        $productId = $request->productId;

        $availableStock = DB::table('products')->select('product_stock')->where('id', $productId)->get(); //Current available stock
        //where clause checksi if the given cart entry belongs to the right user, which is the currently authenticated one.
        $currentQuantity = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->select('product_quantity')->get(); //current quantity of a product in a cart
        $currentItemTotalPrice = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->select('total_price')->get();
        switch($operation){
            case "increment":
                //allow increase quantity if by taking 1 away from stock results in either more than or equal to 0, but not less than 0
                if($currentQuantity[0]->product_quantity < $availableStock[0]->product_stock){
                    $productQuantity = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->where('product_id', $productId);
                    $productQuantity->increment('product_quantity', 1);

                    Products::find($productId)->decrement('product_stock', 1);

                    $newQuantity = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->where('product_id', $productId)->select('product_quantity')->get();

                    Carts::find($cartItemId)->where('user_id', Auth::user()->id)->update(['total_price' => ($newQuantity[0]->product_quantity * $currentItemTotalPrice[0]->total_price)]); // change/update total price

                    $output = [
                        'newQuantity' => $newQuantity[0]->product_quantity,
                        'itemTotalPrice' => ($newQuantity[0]->product_quantity * $currentItemTotalPrice[0]->total_price)
                    ];
                    return response()->json($output);
                }
                break;
            case "decrement":
                $currentQuantity = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->where('product_id', $productId)->select('product_quantity')->get();
                if(($currentQuantity[0]->product_quantity - 1) > 0){
                    $productQuantity = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->where('product_id', $productId);
                    $productQuantity->decrement('product_quantity', 1);
                    Products::find($productId)->increment('product_stock', 1);

                    $newQuantity = Carts::find($cartItemId)->where('user_id', Auth::user()->id)->where('product_id', $productId)->select('product_quantity')->get();
                    Carts::find($cartItemId)->where('user_id', Auth::user()->id)->update(['total_price' => ($newQuantity[0]->product_quantity * $currentItemTotalPrice[0]->total_price)]); // change/update total price

                    $output = [
                        'newQuantity' => $newQuantity[0]->product_quantity,
                        'itemTotalPrice' => ($newQuantity[0]->product_quantity * $currentItemTotalPrice[0]->total_price)
                    ];
                    return response()->json($output);
                }
                break;
        }
        $output = [
            'newQuantity' => $currentQuantity[0]->product_quantity,
            'itemTotalPrice' => ($currentItemTotalPrice[0]->total_price * $currentItemTotalPrice[0]->total_price)
        ];

        return response()->json($output);

    }
}
