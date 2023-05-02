<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    private function create($request){
        Carts::create([
            'user_id' => $request->user_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity
        ]);
    }
    public function show(Request $request){
        /* Checks if the product is not on the cart and checks if
        it belongs to the currently authenticated user */
        
        if(Carts::check( $request->product_name, $request->user_id)->get()->isEmpty()){
            dd(false);
            $this->create($request);
            return view('pages.cart', ['Carts' => Carts::all()]);
        }
        /* Checks if the given product is already at the cart and
        it belongs to the currently authenticated user, then increment the product_quantity value */
        else if(Carts::check( $request->product_name, $request->user_id)->get()->isNotEmpty()){
            /* dd(true); */
            $quantity = Carts::where('user_id', '=', $request->user_id)->where('product_name', 'like', '%'.$request->product_name . '%')->get();
            dd($quantity[0]->product_quantity + 1);

            return view('pages.cart', ['Carts' => Carts::all()]);

            /* Carts::check( $request->product_name, $request->user_id)->update(['product_quantity' => ]) */
        }
        
        /* dd(Carts::check($request->product_name, $request->user_id)->get()); */


    }
}
