<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', 'App\Http\Controllers\Api\AuthController@daftar');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@masuk');

Route::middleware(['userRoleOnly:admin,user'])->group(function () {
    Route::get('/products', 'App\Http\Controllers\Api\ProductController@ambilSemua');
    Route::post('/products', 'App\Http\Controllers\Api\ProductController@tambah');

    Route::delete('/products/{id}', 'App\Http\Controllers\Api\ProductController@hapus');
    Route::put('/products/{id}', 'App\Http\Controllers\Api\ProductController@ubah');
    Route::get('/products/{id}', 'App\Http\Controllers\Api\ProductController@ambil');
});

Route::middleware(['userRoleOnly:admin'])->group(function () {
    Route::get('/categories', 'App\Http\Controllers\Api\CategoryController@ambilSemua');
    Route::post('/categories', 'App\Http\Controllers\Api\CategoryController@tambah');

    Route::get('/categories/{id}', 'App\Http\Controllers\Api\CategoryController@ambil');
    Route::delete('/categories/{id}', 'App\Http\Controllers\Api\CategoryController@hapus');
    Route::put('/categories/{id}', 'App\Http\Controllers\Api\CategoryController@ubah');
});
