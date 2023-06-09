<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "productName" => $this->product_name,
            "productPrice" => $this->price,
            "userId" => $this->user_id,
            "productStock" => $this->product_stock,
            "productQuantity" => $this->product_quantity
        ];
    }
}
