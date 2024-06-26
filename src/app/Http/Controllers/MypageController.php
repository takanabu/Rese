<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Shop;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();
        $favorites = Favorite::where('user_id', $user->id)->get();
        $shops = Shop::favoritedByUser(Auth::id())->get();

        return view('mypage', [
            'user' => $user,
            'reservations' => $reservations,
            'favorites' => $favorites,
            'shops' => $shops,
        ]);
    }
}