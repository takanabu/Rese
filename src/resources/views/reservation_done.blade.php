@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/reservation_done.css') }}">
@endpush

@section('main')
<div class="done-container">
    <div class="card-body">
        <h2 class="text-center">ご予約ありがとうございます</h2>

        @if (session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
        @endif

        <div class="form-group">
            <a href="{{ route('login') }}" class="Back-btn">
                {{ __('戻る') }}
            </a>
        </div>
    </div>
</div>
@endsection