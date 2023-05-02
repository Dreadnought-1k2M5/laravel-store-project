<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{

    public function index(Request $request){
        return view('index', ['products' => Products::all()]);
    }

    public function test(Request $request){
        /* dd(Products::filter($request->search)); */
        $category = Products::select('category')->distinct()->get();        

        return view('index', ['products' => Products::filter($request->search)->get(), 'categories' => $category]);
    }

    public function show(Products $products){
        return view('pages.single-product', ['product' => $products]);
    }
}
