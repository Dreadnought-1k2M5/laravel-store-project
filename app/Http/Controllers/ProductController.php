<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    //
    public function index(){
        return view('index', ['products' => Products::all()]);
    }
}
