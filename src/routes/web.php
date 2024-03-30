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

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

Route::get('/menu/login', function () {
    return view('loginmenu');
});

Route::get('/thanks', function () {
    return view('register_thanks');
})->name('register_thanks');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/shops/{shop:slug}/favorite', [UserController::class, 'favorite'])->name('favorite');
    Route::delete('/shops/{shop:slug}/favorite', [UserController::class, 'unfavorite'])->name('unfavorite');
});