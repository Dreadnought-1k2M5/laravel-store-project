<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CartResource;
use Illuminate\Support\Facades\Auth;


class CartResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $join = DB::table('carts')->join('products', 'carts.user_id', '=', 'products.id')->select('carts.*', 'products.product_stock')->where('user_id', $user_id)->get();
        return response()->json($join);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $product = Products::select('price', 'product_stock', 'product_name')->where('id', $request->product_id)->get();
         $productId = $request->product_id;
         $productQuantity = $request->product_quantity;

         if($productQuantity > $product[0]->product_stock){ //Check if product_quantity is somehow greater than the total stock available
             return response("product quantity is greater than the total stock available!");
         }
         /* Checks if the product is not on the cart and checks if
         it belongs to the currently authenticated user */
         if(Carts::check( $productId, Auth::user()->id)->get()->isEmpty()){
             $user_id = Auth::user()->id;
             $totalPrice = $productQuantity * $product[0]->price;
             Products::changeStock($productId, $product[0]->product_name, $productQuantity);//Reduce available stock
             $entry = Carts::create([
                 'user_id' => $user_id,
                 'product_id' => $productId,
                 'product_name' => $product[0]->product_name,
                 'product_price' => $product[0]->price,
                 'product_quantity' => $productQuantity,
                 'total_price' => $totalPrice
             ])->get();
             return response()->json($entry);
         }
         /* Checks if the given product is already at the cart and it belongs to the currently authenticated user, then increment the product_quantity value */
         else if(Carts::check($productId, Auth::user()->id)->get()->isNotEmpty()){
             Products::changeStock($productId, $product[0]->product_name, $productQuantity);             //target product_id of row and user_id when getting the value
             $entry = Carts::increaseQuantity($request->product_id, $request->product_quantity)->get();
             return response()->json($entry);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
