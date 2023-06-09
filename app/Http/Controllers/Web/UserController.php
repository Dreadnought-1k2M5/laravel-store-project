<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //register new user
    public function store(Request $request){
        $formValidated = $request->validateWithBag('signup', [
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formValidated['password'] = bcrypt($formValidated['password']);

        $newUser = User::create($formValidated);
        auth()->login($newUser);

        return redirect('/');
    }

    //authenticate user
    public function authenticate(Request $request){
        $validCredentials = $request->validateWithBag('auth', [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if(Auth::attempt($validCredentials)){
            $request->session()->regenerate();
            return back();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records. Please Try Again.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function show(){
        $order = Order::where('customer_id', Auth::user()->id)->get();
        return view('users.profile', ['orders' => $order]);
    }
}
