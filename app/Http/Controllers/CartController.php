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
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity
        ]);
    }
    public function store(Request $request){
        /* Checks if the product is not on the cart and checks if
        it belongs to the currently authenticated user */
        if(Carts::check( $request->product_name, $request->user_id)->get()->isEmpty()){
            $this->create($request);
            return view('pages.cart', ['Carts' => Carts::all()]);
        }

        /* Checks if the given product is already at the cart and
        it belongs to the currently authenticated user, then increment the product_quantity value */
        else if(Carts::check( $request->product_name, $request->user_id)->get()->isNotEmpty()){
            //target ID of row and user_id when getting the value

            $quantity = Carts::where('product_id', $request->product_id)->where('user_id', $request->user_id)->first();
            $prev = $quantity->product_quantity;
            $quantity->update(['product_quantity' => ($prev + $request->product_quantity)]);
            $quantity->save();

            //$quantity = Carts::where('user_id', '=', $request->user_id)->where('product_name', 'like', '%'.$request->product_name . '%')->get();
            return view('pages.cart', ['Cart' => Carts::where('user_id', '=', $request->user_id)->get()]);

            /* Carts::check( $request->product_name, $request->user_id)->update(['product_quantity' => ]) */
        }
        
        /* dd(Carts::check($request->product_name, $request->user_id)->get()); */
    }

    public function show(Request $request){
        
        return view('pages.cart', ['Cart' => Carts::where('user_id', '=', $request->user_id)->get()]);
    }
}
