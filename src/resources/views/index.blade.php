@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($shops as $shop)
    <div class="card mb-4">
        <img src="{{ $shop->image_url }}" class="card-img-top" alt="{{ $shop->shop_name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $shop->shop_name }}</h5>
            <p class="card-text">{{ $shop->shop_overview }}</p>
            <a href="/shop/{{ $shop->id }}" class="btn btn-primary">詳しく見る</a>
        </div>
    </div>
    @endforeach
</div>
@endsection