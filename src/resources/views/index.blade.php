@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('main')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($shops as $shop)
        <div class="col-md-3 mb-4"> 
            <div class="card shadow-sm">
                <img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                    <p class="card-text"><strong>{{ $shop->shop_name }}</strong></p> <!-- ショップ名を太字にします -->
                    <small class="text-muted">#{{ $shop->region }} #{{ $shop->genre }}</small> <!-- リージョンとジャンルの前に#を追加します -->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='/detail/{{ $shop->id }}'">詳しく見る</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection