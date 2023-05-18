<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\API\V1\LoginRequest;

class UserResourceController extends Controller
{
    public function login(LoginRequest $request){
/*         $validCredentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]); */
        if(Auth::attempt($request->all())){
            $user = Auth::user();
/*             $access = $user->tokens()->first();
            $token = $access->plainTextToken; */

            $token = $user->createToken('client-token', ['read']);
            return response()->json([
                'clientToken' => $token,
                'clientId' => $user->id
            ]);
        }
        return response("Invalid Credentials! Try Again");
    }

    public function check(){
        $user = Auth::user();
        return response()->json($user);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $formValidated = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
