<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/logoutmenu.css') }}">
    </head>
    <body>
        <div class="header">
            <button class="close-btn" onclick="javascript:history.back()">
                <div class="line line1"></div>
                <div class="line line2"></div>
            </button>
        </div>
        <div class="menu">
            <a href="/" class="first-link">Home</a> 
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"class="logout-button">Logout</button>
            </form>
            <a href="/mypage">Mypage</a>
        </div>
    </body>
</html>