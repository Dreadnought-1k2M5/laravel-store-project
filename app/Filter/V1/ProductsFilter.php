<?php

namespace App\Filter\V1;

use App\Models\Products;

class ProductsFilter{
    protected $safeParams = [
        'search'
    ];

    public function search($request){
        $result = [];
        foreach($this->safeParams as $param){
            $search = $request->query($param);

            if(!isset($search)){
                continue;
            }
            
            $products = Products::filter($search)->get();
            return $products;
        }
        return $result;
    }
}