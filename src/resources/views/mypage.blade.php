<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
</head>
<body class="container">
    <div class="header-container">
        <div class="header">
            <div class="menu-icon">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1>Rese</h1>
        </div>
    </div>
    <div class="content">
        <div class="user-info-container">
            <h2 class="user-name">{{ $user['name'] }}</h2>
        </div>
        <div class="reservation-container">
            <h2>予約状況</h2>
            @foreach ($reservations as $reservation)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $reservation['shop'] }}</h5>
                    <p class="card-text">
                        Date: {{ $reservation['date'] }}<br>
                        Time: {{ $reservation['time'] }}<br>
                        Number: {{ $reservation['number'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="favorite-container">
            <h2>お気に入り店舗</h2>
            @foreach ($favorites as $favorite)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $favorite }}</h5>
                    <a href="#" class="btn btn-primary">詳細を見る</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        document.querySelector('.menu-icon').addEventListener('click', function() {
            if ({{ Auth::check() ? 'true' : 'false' }}) {
                // ユーザーがログインしている場合
                window.location.href = '/logoutmenu';
            } else {
                // ユーザーがログアウトしている場合
                window.location.href = '/loginmenu';
            }
        });
    </script>
</body>
</html>