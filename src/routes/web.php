<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\ShopController;
 use App\Http\Controllers\UserController;


 Route::middleware('auth')->group(function () {
     Route::get('/', [ShopController::class, 'index']);
 });

 Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/menu/login', function () {
    return view('loginmenu');
});


