<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('category',CategoryController::class);
Route::get('/category/{category}/posts',[CategoryController::class,'posts']);
Route::apiResource('post',PostController::class);
Route::get('/post/change-status/{post}',[PostController::class,'changeStatus']);


Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);