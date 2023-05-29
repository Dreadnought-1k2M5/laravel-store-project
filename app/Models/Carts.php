<?php

namespace App\Models;

use PDO;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_price', 
        'product_quantity',
        'total_price'
    ];
    public function user(){
        return $this->BelongsTo(User::class, 'user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function scopeCheck($query, $product_id, $user_id){
        /* dd($query->where('product_name', '=', '%' . $product_name . '%')); */
        $query->where('product_id', $product_id)->where('user_id', $user_id);
    }
    public function scopeChangestock($query, $product_id, $product_name, $quantity){
        //$productTarget = Products::select('product_stock')->where('id', $product_id)->where('product_name', 'like', '%'.$product_name.'%')->get();
        /* dd(gettype($quantity)); */
        /* dd($productTarget->update(['product_stock' => 0])); */
        $productTarget = DB::table('products')->select('product_stock')->where('id', $product_id)->get()[0]->product_stock;
        $quantity = (int)$quantity;
        //dd(gettype($quantity));
        DB::table('products')->select('product_stock')->where('id', $product_id)->update(['product_stock' => ($productTarget - $quantity)]);
    }   

    public function scopeIncreaseQuantity($query, $product_id, $additionalQuantity){
        $queryResult = Carts::where('product_id', $product_id)->where('user_id', Auth::user()->id);
        $currentQuantity = $queryResult->get()[0]->product_quantity;
        $currentTotalPrice = $queryResult->get()[0]->total_price;
        $productPrice = $queryResult->get()[0]->product_price;

        $newQuantity = $currentQuantity + $additionalQuantity;
        $newTotalPrice = $currentTotalPrice + ($productPrice * $currentQuantity);

        $queryResult->update(['product_quantity' => $newQuantity, 'total_price' => $newTotalPrice]);
        //Carts::where('product_id', $product_id)->where('user_id', Auth::user()->id)
    }

    public function scopeGetCartProductJoin($query, $user_id){
        $join = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.id', 'carts.user_id', 'carts.product_id', 'carts.product_name', 'carts.product_price', 'carts.product_quantity', 'carts.total_price', 'products.product_stock', 'products.product_image')
        ->where('user_id', $user_id)->get();
        return $join;
    }
}
