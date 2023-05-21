<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{


    public function __construct()
{
    $this->middleware('auth');
}

    public function showLoginForm(){
        return view('products.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);
    
            return redirect()->route('login')->withSuccess("Login successful!");
        } else {
        
           return redirect()->route('login')->withSuccess("Login Unsuccessful!");
        }

    }
}
