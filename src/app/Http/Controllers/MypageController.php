<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Favorite;

class MypageController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーIDを取得
        $user_id = Auth::id();

        // ユーザー情報を取得
        $user = Auth::user();

        // 予約情報を取得
        $reservations = Reservation::where('user_id', $user_id)->get();

        // お気に入り店舗情報を取得
        $favorites = Favorite::where('user_id', $user_id)->get();

        return view('mypage', compact('user', 'reservations', 'favorites'));
    }
}