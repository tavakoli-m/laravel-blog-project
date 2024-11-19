<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerView(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $userData = $request->validated();

        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);

        return to_route('app.login');
    }
}
