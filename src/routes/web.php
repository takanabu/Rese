<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/shops/region/{region?}', [ShopController::class, 'region'])->name('shops.region');
    Route::get('/shops/genre/{genre?}', [ShopController::class, 'genre'])->name('shops.genre');
    Route::get('/shops/search', [ShopController::class, 'search'])->name('shops.search');
    Route::get('/shops/all', [ShopController::class, 'all'])->name('shops.all');
    Route::get('/detail/{shop_id}', [ShopController::class, 'show']);
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

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

