<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // ユーザーがログインしている場合
            return view('logoutmenu');
        } else {
            // ユーザーがログアウトしている場合
            return view('loginmenu');
        }
    }
}