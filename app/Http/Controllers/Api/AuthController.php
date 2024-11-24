<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use FastResponse\FastResponse\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $userData = $request->validated();

        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);

        $userToken = $user->createToken("API TOKEN")->plainTextToken;

        return Response::withStatus(200)->withAppends([
            'user' => $user,
            'token' => $userToken
        ]);
        
    }
    public function login(LoginRequest $request) {
        if(!Auth::attempt($request->validated())){
            return Response::withStatus(401)->send();
        }

        $user = Auth::user();

        $userToken = $user->createToken("API TOKEN")->plainTextToken;
        
        return Response::withStatus(200)->withAppends([
            'user' => $user,
            'token' => $userToken
        ]);
        
    }
}
