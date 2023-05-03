<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PDO;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_price', 
        'product_quantity'
    ];
    public function user(){
        return $this->BelongsTo(User::class, 'user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function scopeCheck($query, $product_name, $user_id){
        /* dd($query->where('product_name', '=', '%' . $product_name . '%')); */
        $query->select('product_name')->where('product_name', 'like', '%'.$product_name.'%')->where('user_id', '=', $user_id);
    }

/*     public function scopeReturnCart($query, $user_id){
        $query->
    } */
    
}
