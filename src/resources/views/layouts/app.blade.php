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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var isLoggedIn = @json(Auth::check());
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
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
    <main class="main">
        @yield('main')
    </main>
</body>

</html>