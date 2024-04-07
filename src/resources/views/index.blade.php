<!DOCTYPE html>
<html lang="ja">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rese</title>
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    <body class="container">
        <div class="header">
            <div class="menu-icon">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h1>Rese</h1>
    <div class="search-container-index">
        <div class="col-md-2">
            <select class="form-select" id="region" name="region" onchange="location = this.value;">
                <option value="{{ route('shops.all') }}">All erea</option>
                @foreach ($regions as $region)
                <option value="{{ route('shops.region', ['region' => $region->region]) }}">{{ $region->region }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-select" id="genre" name="genre" onchange="location = this.value;">
                <option selected>All genre</option>
                @foreach ($genres as $genre)
                <option value="{{ route('shops.genre', ['genre' => $genre->genre]) }}">{{ $genre->genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <form action="{{ route('shops.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Search ..." aria-label="Search">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($shops as $shop)
        <div class="col-md-3 mb-4"> 
            <div class="card shadow-sm">
                <img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                    <p class="card-text"><strong>{{ $shop->shop_name }}</strong></p> 
                    <small class="text-muted">#{{ $shop->region }} #{{ $shop->genre }}</small> 
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='/detail/{{ $shop->id }}'">詳しく見る</button>
                        </div>
                        @if (Auth::user()->favorites()->where('shop_id', $shop->id)->exists())
                            <form method="POST" action="{{ route('unfavorite', ['shop' => $shop->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><img src="/images/WhiteHeart-icon.png" alt="White Heart Icon" class="heart-icon"></button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('favorite', ['shop' => $shop->id]) }}">
                                @csrf
                                <button type="submit"><img src="/images/RedHeart-icon.png" alt="Red Heart Icon" class="heart-icon"></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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