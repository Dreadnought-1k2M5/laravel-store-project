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
        return view('index', ['products' => Products::where([])->paginate(4)]);
    }

    public function showListCategory(Request $request){
        /* dd(Products::filter($request->search)); */
        $category = Products::select('category')->distinct()->get();        

        return view('index', ['products' => Products::filter($request->search)->get(), 'categories' => $category]);
    }

    public function show(Products $products){
        return view('pages.single-product', ['product' => $products]);
    }
}
