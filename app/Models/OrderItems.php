<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{

    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_id',
        'product_id',
        'produc_name',
        'product_price',
        'product_quantity',
        'total_price'
    ];
    public function scopeMapItem($query, $cartContent, $orderId){
        foreach($cartContent as $item){
            $query->insert([
                'customer_id' => $item->user_id, 
                'order_id' => $orderId, 
                'product_id' => $item->product_id, 
                'product_name' => $item->product_name, 
                'product_price' => $item->product_price,
                'product_quantity' => $item->product_quantity,
                'total_price' => $item->total_price,
                'created_at' => now(), // Specify the created_at value
                'updated_at' => now(), // Specify the updated_at value
            ]);
        }
    }
}
