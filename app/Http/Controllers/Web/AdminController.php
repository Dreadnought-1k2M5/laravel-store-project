<?php

namespace App\Http\Controllers\Web;

use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function authenticate(Request $request){
/*         dd($request->all()); */
        $validCredentials = $request->validateWithBag('auth', [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //dd($validCredentials);
        if(Auth::guard('admin')->attempt($validCredentials)){
            $request->session()->regenerate();
            return redirect('/admin');
        }
        return redirect('/gate/login')->with('errorMessage', 'Invalid Credentials! Try Again.')->onlyInput('email');
    }

    public function show (Request $request){
        if(Auth::guard('admin')->check()){
            return redirect('/admin');
        }

        return view('admin.user.login');
    }

    public function showAdmin(Request $request){
        $topOrderedProducts =  DB::table('order_items')
        ->select('product_name', DB::raw('COUNT(*) as count'))
        ->groupBy('product_name')
        ->orderBy('count', 'desc')
        ->take(3)
        ->get();

        $totalRevenue = DB::table('payments')->sum('amount');
        $totalOrders = DB::table('orders')->count();

        return view('admin.index', [
            'email' => Auth::guard('admin')->user()->email, 
            'topProducts' => $topOrderedProducts, 
            'totalRevenue' => $totalRevenue,
            'totalOrders' => $totalOrders
        ]);
    }
}
