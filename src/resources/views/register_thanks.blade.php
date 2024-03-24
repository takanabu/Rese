@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/register_thanks.css') }}">
@endpush

@section('main')
<div class="thanks-container">
    <div class="card-body">
        <h2 class="text-center">会員登録ありがとうございます</h2>

        @if (session('result'))
        <div class="flash_message">
            {{ session('result') }}
        </div>
        @endif

        <div class="form-group">
            <a href="{{ route('login') }}" class="thanks-btn">
                {{ __('ログインする') }}
            </a>
        </div>
    </div>
</div>
@endsection