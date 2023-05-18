<?php

namespace App\Models;

use App\Models\Shipping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'payment_status',
        'payment_method',
        'order_status'
    ];
    public function user(){
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function shipping(){
        return $this->hasOne(Shipping::class, 'order_id');
    }

/*     public function payment(){
        return $this->hasOne(Shipping::class, 'order_id');
    } */

    public function scopeGetOrder($query, $user){
        /* 'customer_id' => Auth::user()->id, //MODIFY LATER FOR GUEST USER.
        'payment_status' => "Processing",
        'payment_method' => "PayPal",
        'order_status' => "Pending" */

        $query->where('customer_id', $user)->where('payment_status', 'Processing')->where('payment_method', 'PayPal')->where('order_status', 'Pending')->get();
    }
}
