<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MypageController;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/shops/region/{region?}', [ShopController::class, 'region'])->name('shops.region');
    Route::get('/shops/genre/{genre?}', [ShopController::class, 'genre'])->name('shops.genre');
    Route::get('/shops/search', [ShopController::class, 'search'])->name('shops.search');
    Route::get('/shops/all', [ShopController::class, 'all'])->name('shops.all');
    Route::get('/detail/{shop_id}', [ShopController::class, 'show']);
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/success', [ReservationController::class, 'success'])->name('reservation.success');
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

Route::get('/thanks', function () {
    return view('register_thanks');
})->name('thanks');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/shops/{shop:slug}/favorite', [UserController::class, 'favorite'])->name('favorite');
    Route::delete('/shops/{shop:slug}/favorite', [UserController::class, 'unfavorite'])->name('unfavorite');
});

Route::get('/done', function () {
    return view('reservation_done');
})->name('done');

Route::get('/loginmenu', function () {
    return view('loginmenu');
})->name('loginmenu');

Route::get('/logoutmenu', function () {
    return view('logoutmenu');
})->name('logoutmenu');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');