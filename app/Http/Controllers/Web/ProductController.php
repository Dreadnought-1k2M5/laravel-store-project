<?php

namespace App\Http\Controllers\Web;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index(Request $request){
        /* dd(Products::all()); */
        /* return Products::all(); */
        return view('index', ['products' => Products::where([])->inRandomOrder()->paginate(6)]);
    }

    public function searchListProduct(Request $request){
        $category = $request->category;
        $search = $request->search;
        if($category == "all"){
            $products = Products::where('product_name', 'like', '%' . $search .'%')->paginate(8);
            return view('pages.search-result', ['products' => $products]);
        }else{
            $productsByCategory = Products::where('category', 'like', '%' . $category .'%')->where('product_name', 'like', '%' . $search .'%')->paginate(8);
            return view('pages.search-result', ['products' => $productsByCategory, 'category' => $category]);
        }
    }    

    public function show(Products $product){
        //dd($products->category);
        $related = $product::where('category', 'like', $product->category)->where('product_name', '!=', $product->product_name)->inRandomOrder()->take(3)->get();
        
        return view('pages.single-product', ['product' => $product, 'relatedProducts' => $related]);
    }
    public function showProductsByCategory(Request $request, $category){
        $products = Products::where('category', $category)->paginate(8);
        return view('pages.products-category', ['products' => $products, 'categoryLabel' => $category]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'product_stock' => 'required'
        ]);
        if($request->hasFile('product_image')){
            $formFields['product_image'] = $request->file('product_image')->store('productFolder', 'public');
        }

        Products::create($formFields);
        return redirect('/admin')->with('message', 'Listing created successfully');
        dd("test");
    }
}
