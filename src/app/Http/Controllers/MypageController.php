<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Shop;  // Shopモデルを追加しました

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();
        $favorites = Favorite::where('user_id', $user->id)->get();
        $shops = Shop::all();  // すべての店舗を取得します

        return view('mypage', [
            'user' => $user,
            'reservations' => $reservations,
            'favorites' => $favorites,
            'shops' => $shops,  // ビューに$shops変数を渡します
        ]);
    }
}