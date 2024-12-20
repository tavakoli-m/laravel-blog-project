<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\App\HomeController as AppHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\CategoryController as AppCategoryController;
use App\Http\Controllers\App\PostController as AppPostController;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', HomeController::class)->name('index');

    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('delete');
    });

    Route::prefix('post')->name('post.')->controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{post}', 'edit')->name('edit');
        Route::put('/{post}', 'update')->name('update');
        Route::delete('/{post}', 'destroy')->name('delete');
        Route::get('/change-status/{post}', 'changeStatus')->name('change-status');
    });
});


Route::prefix('/')->name('app.')->group(function () {
    Route::prefix('/login')->controller(LoginController::class)->group(function () {
        Route::get('/', 'loginView')->name('login-view');
        Route::post('/', 'login')->name('login');
    });

    Route::prefix('/register')->controller(RegisterController::class)->group(function () {
        Route::get('/', 'registerView')->name('register-view');
        Route::post('/', 'register')->name('register');
    });

    Route::get('/logout', LogoutController::class)->name('logout');


    Route::get('/', AppHomeController::class)->name('index');
    Route::get('/category/{category}', AppCategoryController::class)->name('category');
    Route::get('/post/{post}', AppPostController::class)->name('post');
});
