<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
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
        return "ERROR";
    }

    public function show (Request $request){
        if(Auth::guard('admin')->check()){
            return redirect('/admin');
        }

        return view('admin.user.login');
    }

    public function showAdmin(Request $request){
        return view('admin.index', ['email' => Auth::guard('admin')->user()->email]);
    }
}
