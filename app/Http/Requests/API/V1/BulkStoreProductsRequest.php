<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return  $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
/*               'user_id' => $user_id,
                 'product_id' => $productId,
                 'product_name' => $product[0]->product_name,
                 'product_price' => $product[0]->price,
                 'product_quantity' => $productQuantity,
                 'total_price' => $totalPrice */
        //This means validate the fields of each object within the JSON array.
        return [
            /* '*.userId' => ['required', 'integer'], */
            '*.productId' => ['required', 'integer'],
            '*.productQuantity' => ['required', 'numeric'],
        ];
    }
    public function prepareForValidation(){
        $data = [];
        foreach($this->toArray() as $obj){
            //$obj['user_id'] = $obj['userId'] ?? null;
            $obj['product_id'] = $obj['productId'] ?? null;
            $obj['product_quantity'] = $obj['productQuantity'] ?? null;
            
            $data[] = $obj;

        }
        $this->merge($data);
    }
}
