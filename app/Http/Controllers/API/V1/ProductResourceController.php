<?php

namespace App\Http\Controllers\Api\V1;

use App\Filter\V1\ProductsFilter;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\BulkStoreProductsRequest;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;

class ProductResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchFilter = new ProductsFilter();
        $result = $searchFilter->search($request);
        if(count($result) >= 1){
            return new ProductCollection($result);
        }
        $products = Products::where([])->paginate();
        return new ProductCollection($products);
    }

    public function searchByCategory(Request $request){
        $category = $request->category;
        $search = $request->search;
        if(strtolower($category) == "all"){
            $products = Products::where('product_name', 'like', '%' . $search .'%')->get();
            return response()->json(collect($products)->toArray());
        }else{
            $productsByCategory = Products::where('category', 'like', '%' . $category .'%')->where('product_name', 'like', '%' . $search .'%')->get();
            return response()->json(collect($productsByCategory)->toArray());

        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        //
        //$product = Products::find($id);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request){
        $searchFilter = new ProductsFilter();

        $result = $searchFilter->search($request);
        return response()->json($result);
    }
}
