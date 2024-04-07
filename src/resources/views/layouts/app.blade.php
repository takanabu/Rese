<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="container">
    <div class="header">
        <a href="{{ route('loginmenu') }}" class="menu-icon">
            <div></div>
            <div></div>
            <div></div>
        </a>
        <h1>Rese</h1>
    </div>
    <main class="main">
        @yield('main')
    </main>
    @stack('scripts')
</body>
</html>