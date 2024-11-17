<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', HomeController::class)->name('admin.index');

    Route::prefix('category')->name('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::put('/{category}', 'update');
        Route::delete('/{category}', 'destroy')->name('delete');
    });

    Route::prefix('post')->name('category')->controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::put('/{category}', 'update');
        Route::delete('/{category}', 'destroy')->name('delete');
        Route::get('/change-status/{category}', 'changeStatus')->name('change-status');
    });
});
