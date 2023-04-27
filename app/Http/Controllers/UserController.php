<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    //authenticate user
    public function authenticate(Request $request){
        $validCredentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if(Auth::attempt($validCredentials)){
            $request->session()->regenerate();
            return redirect("/");
        }
        return response("FAILED");
/*         return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); */
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
