<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        'category',
        'product_image'
    ];

    public function scopeFilter($query, $search){
        $query->where('product_name', 'like' , '%' . $search . '%')->orWhere('category', 'like', '%'.$search.'%');
    }
    public function scopeCategory($query){
        $query->select('category')->distinct();
    }

    public function cart(){
        return $this->hasMany(Carts::class, 'product_id');
    }
    public function scopeChangeStock($query, $product_id, $product_name, $quantity){
        $productTarget = DB::table('products')->select('product_stock')->where('id', $product_id)->get()[0]->product_stock;
        $quantity = (int)$quantity;
        //dd(gettype($quantity));
        DB::table('products')->select('product_stock')->where('id', $product_id)->update(['product_stock' => ($productTarget - $quantity)]);
    }


}
