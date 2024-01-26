<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{  
    // direct login page
    public function login(){
        return view('login');
    }

    // direct register page
    public function register(){
        return view('register'); 
    }

    public function dashboard(){

        // dd(Auth::user()->toArray());
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.home');
        }
        if(Auth::user()->role == 'user'){
            return redirect()->route('user.home');
        }
        return redirect()->route('login');
    }
}
