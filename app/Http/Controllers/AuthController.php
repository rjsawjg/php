<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signout(){
        return view('auth.signout');
    }
    public function register(Request $request){
        $user = $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:App\Models\User',
            'password'=>'required|min:6'
        ]);
        return response()->json($user);
    }
}
