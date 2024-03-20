<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="container">
    @component('components.header')
    @endcomponent
    <main class="main">
        @yield('main')
    </main>
    @component('components.footer')
    @endcomponent

    <ul class="header-nav">
        @if (Auth::check())
        <li class="header-nav__item">
            <a class="header-nav__link" href="/mypage">マイページ</a>
        </li>
        <li class="header-nav__item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
            </form>
        </li>
        @endif
    </ul>
</body>

</html>