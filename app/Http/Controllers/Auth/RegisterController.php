<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerView(){
        return view('auth.register');
    }
    public function register(){
        dd("register");
    }
}