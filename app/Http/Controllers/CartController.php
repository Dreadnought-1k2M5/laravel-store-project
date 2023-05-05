<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
        //Check if product_quantity is somehow greater than the total stock available
        $currentStock = Products::select('product_stock')->where('id', $request->product_id)->get();
        if($request->product_quantity > $currentStock[0]->product_stock){
            return back();
        }
        /* Checks if the product is not on the cart and checks if
        it belongs to the currently authenticated user */
        if(Carts::check( $request->product_name, Auth::user()->id)->get()->isEmpty()){
            $user_id = Auth::user()->id;
            //Reduce available stock
            Products::changeStock($request->product_id, $request->product_name, $request->product_quantity);

            Carts::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity
            ]);
            return redirect('/cart');
        }
        /* Checks if the given product is already at the cart and
        it belongs to the currently authenticated user, then increment the product_quantity value */
        else if(Carts::check( $request->product_name, Auth::user()->id)->get()->isNotEmpty()){

            //target product_id of row and user_id when getting the value
            Products::changeStock($request->product_id, $request->product_name, $request->product_quantity);

            Carts::increaseQuantity($request->product_id, $request->product_quantity);
           /*  $quantity = Carts::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();
            $prev = $quantity->product_quantity;
            $quantity->update(['product_quantity' => ($prev + $request->product_quantity)]);
            $quantity->save(); */
            return redirect('/cart');
        }
    }

    public function show(){
        $user_id = Auth::user()->id;
        return view('pages.cart', ['Cart' => Carts::where('user_id', '=', $user_id)->get()]);
    }

    public function delete(Request $request, Carts $cart){
        if($request->user_id != Auth::user()->id){
            return response ("ERROR");
        }

        $cart->where('id', $request->target_item)->where('user_id', $request->user_id)->delete();
        return back();
    }
}
