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
            <div class="shop-header"> <!-- 新しいdiv要素を追加 -->
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
                <div class="form-group">
                    <label for="date">予約</label>
                    <input type="date" id="date-input" name="date" required>
                </div>
                <div class="form-group">
                    <label for="time"></label>
                    <input type="time" id="time-input" name="time" required>
                </div>
                <div class="form-group">
                    <label for="number"></label>
                    <input type="number" id="number-input" name="number" min="1" required>
                </div>
            </form>
            <!-- 水色の四角を追加 -->
            <div class="reservation-summary">
                <p><span class="label">Shop</span> <span id="shop-name">{{ $shop->shop_name }}</span></p>
                <p><span class="label">Date</span> <span id="reservation-date"></span></p>
                <p><span class="label">Time</span> <span id="reservation-time"></span></p>
                <p><span class="label">Number</span> <span id="reservation-number"></span></p>
            </div>
            <button type="submit">予約する</button>
        </div>
    </div>
    <!-- JavaScriptを追加 -->
    <script>
        document.getElementById('date-input').addEventListener('change', function() {
            document.getElementById('reservation-date').textContent = this.value;
        });
        document.getElementById('time-input').addEventListener('change', function() {
            document.getElementById('reservation-time').textContent = this.value;
        });
        document.getElementById('number-input').addEventListener('change', function() {
            document.getElementById('reservation-number').textContent = this.value;
        });
    </script>
</body>
</html>