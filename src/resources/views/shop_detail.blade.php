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
    <div class="header">
        <div class="menu-icon">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1>Rese</h1>
    </div>
    <div class="shop-detail">
        <div class="pagination">
    {{ $shops->links('vendor.pagination.custom') }}
</div>
        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
        <div class="shop-image" style="position: relative;">
            <img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}">
        </div>
        <p class="shop-region-genre">#{{ $shop->region }} #{{ $shop->genre }}</p>
<p class="shop-overview">{{ $shop->shop_overview }}</p>
    </div>
    <form action="{{ route('reservation.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="date">日付</label>
        <input type="date" id="date" name="date" required>
    </div>
    <div class="form-group">
        <label for="time">時間</label>
        <input type="time" id="time" name="time" required>
    </div>
    <div class="form-group">
        <label for="number">人数</label>
        <input type="number" id="number" name="number" min="1" required>
    </div>
    <button type="submit">予約する</button>
</form>
    
</body>
</html>