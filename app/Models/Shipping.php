<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping extends Model
{

    protected $fillable = [
        'recipient_name',
        'street_address',
        'city',
        'state',
        'country',
        'phone_number',
        'shipping_method',
        'zip_code',
        'order_id'
    ];
    use HasFactory;

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function scopeInsertInfo($query, $info, $orderId){
        $temp = json_encode($info);
        $info = json_decode($temp);
        $query->insert([
            'recipient_name' => $info->name,
            'street_address'=> $info->address,
            'city' => $info->city,
            'state' => $info->state,
            'country' => $info->country,
            'phone_number' => $info->phoneNumber,
            'shipping_method' => $info->shippingMethod,
            'zip_code' => $info->zipCode,
            'order_id' => $orderId,
            'created_at' => now(), // Specify the created_at value
            'updated_at' => now(), // Specify the updated_at value
        ]);

    }
    
}
