<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'productName' => $this->product_name,
            'productDescription' => $this->product_description,
            'price' => $this->price,
            'category' => $this->category,
            'productImage' => $this->product_image,
            'productStock' => $this->product_stock,
        ];
    }
}
