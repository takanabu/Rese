<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('logoutmenu');
        } else {
            return view('loginmenu');
        }
    }
}