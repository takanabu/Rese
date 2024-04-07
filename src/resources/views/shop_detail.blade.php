<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
        <div class="shop-detail-container">
            <div class="shop-header">
                <a href="http://localhost/" class="back-button">＜</a>
                <h2 class="shop-name">{{ $shop->shop_name }}</h2>
            </div>
            <div class="shop-detail">
                <div class="shop-image" style="position: relative;">
                    <img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}">
                </div>
                <p class="shop-region-genre">#{{ $shop->region }} #{{ $shop->genre }}</p>
                <p class="shop-overview">{{ $shop->shop_overview }}</p>
            </div>
        </div>
        <div class="form-container">
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}"> <!-- ログイン中のユーザーID -->
                <input type="hidden" name="shop_id" value="{{ $shop->id }}"> <!-- 現在のショップID -->
                <div class="form-group-label">
                    <label for="date">予約</label>
                    <input type="date" id="date-input" name="date" required>
                </div>
                <div class="form-group-time">
                    <label for="time"></label>
                    <input type="time" id="time-input" name="time" required>
                </div>
                <div class="form-group-number">
                    <label for="number_of_people"></label>
                    <input type="number" id="number_of_people-input" name="number_of_people" min="1" required>
                </div>
                <button type="submit">予約する</button>
            </form>
            <div class="reservation-summary">
                <p><span class="label">Shop</span> <span id="shop-name">{{ $shop->shop_name }}</span></p>
                <p><span class="label">Date</span> <span id="reservation-date"></span></p>
                <p><span class="label">Time</span> <span id="reservation-time"></span></p>
                <p><span class="label">Number</span> <span id="reservation-number"></span></p>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('date-input').addEventListener('change', function() {
            document.getElementById('reservation-date').textContent = this.value;
        });
        document.getElementById('time-input').addEventListener('change', function() {
            document.getElementById('reservation-time').textContent = this.value;
        });
        document.getElementById('number_of_people-input').addEventListener('change', function() {
            document.getElementById('reservation-number').textContent = this.value;
        });
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