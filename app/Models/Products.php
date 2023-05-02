<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

/*     public function scopeProducts($query){
        dd($query->select('products'))
    }
 */
}
