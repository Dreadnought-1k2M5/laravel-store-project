<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Carts;
use App\Models\Products;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\V1\CartResource;
use App\Http\Requests\API\V1\BulkStoreProductsRequest;

use Carbon\Carbon;

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
             $currentTimestamp = Carbon::now();

             $entry = Carts::create([
                 'user_id' => $user_id,
                 'product_id' => $productId,
                 'product_name' => $product[0]->product_name,
                 'product_price' => $product[0]->price,
                 'product_quantity' => $productQuantity,
                 'total_price' => $totalPrice,
                 'created_at' => $currentTimestamp,
                 'updated_at' => $currentTimestamp

             ])->get();
             return response()->json($entry);
         }
         /* Checks if the given product is already at the cart and it belongs to the currently authenticated user, then increment the product_quantity value */
         else if(Carts::check($productId, Auth::user()->id)->get()->isNotEmpty()){
             Products::changeStock($productId, $product[0]->product_name, $productQuantity);             //target product_id of row and user_id when getting the value
             $entry = Carts::increaseQuantity($productId, $productQuantity)->get();
             return response()->json($entry);
         }
    }

    public function bulkStore(BulkStoreProductsRequest $request){
        $bulk = collect($request->all())->map(function($arr, $key){
            $product = Products::select('price', 'product_stock', 'product_name')->where('id', $arr['product_id'])->get();
            $productId = $arr['product_id'];
            $productQuantity =  $arr['product_quantity'];
            if($productQuantity > $product[0]->product_stock){ //Check if product_quantity is somehow greater than the total stock available
                return response("product quantity is greater than the total stock available!");
            }
             /* Checks if the product is not on the cart and checks if
            it belongs to the currently authenticated user */
            if(Carts::check( $productId, Auth::user()->id)->get()->isEmpty()){
                $user_id = Auth::user()->id;
                $totalPrice = $productQuantity * $product[0]->price;
                Products::changeStock($productId, $product[0]->product_name, $productQuantity);//Reduce available stock
                
                //No need to insert product_id and product_quantity, they're already in $arr
                $arr = [
                    'user_id' => $user_id,
                    'product_id' => $productId,
                    'product_name' => $product[0]->product_name,
                    'product_price' => $product[0]->price,
                    'product_quantity' => $productQuantity,
                    'total_price' => $totalPrice
                ];
            }
            /* Checks if the given product is already at the cart and it belongs to the currently authenticated user, then increment the product_quantity value */
            else if(Carts::check($productId, Auth::user()->id)->get()->isNotEmpty()){
                Products::changeStock($productId, $product[0]->product_name, $productQuantity);             //target product_id of row and user_id when getting the value
                Carts::increaseQuantity($arr['product_id'], $arr['product_quantity']);
                //$arr = ['updated' => true];
                $arr = [
                    'user_id' => null,
                    'product_id' => null,
                    'product_name' => null,
                    'product_price' => null,
                    'product_quantity' => null,
                    'total_price' => null
                ];
                return false;
            }

            //return Arr::except($arr, ['productId', 'productQuantity']);
            return $arr;
        });
        if(empty($bulk->toArray()[0])){
            //$allCart = Carts::all();
            return response()->json("Cart product quantities updated");
        }
        Carts::insert($bulk->toArray());
        return response()->json($bulk->toArray());
    }

    public function delete(Request $request, Carts $cart){

        $quantity = $cart->where('product_id', $request->productId)->where('user_id', Auth::user()->id)->get()[0]->product_quantity;
        
        $product = Products::find($request->productId);
        $product->product_stock += $quantity;
        $product->save();
        
        $cart->where('product_id', $request->productId)->where('user_id', Auth::user()->id)->delete();
        return response()->json('{"message": "Product has been deleted from the cart" }');
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
        
    }

}
