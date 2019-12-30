<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'FlyHigh') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class = "wrapper">
        <div class = "header">
            <a href="{{ url('home') }}">
                <div class = "header-logo">
                    <img src="{{ asset('images/SiteLogo.png') }}">
                </div>
            </a>
            <div class = "top-navigation">
                <ul class = "navigation-items">
                    @yield('homeBtn')
                    @yield('ticketBtn')
                    @yield('flightsBtn')
                    @yield('flights')
                    @yield('tickets')
                    @yield('airports')
                    @yield('planes')
                    @yield('logout')
                    @yield('other')
                </ul>
            </div>
        </div>
        <main>
            @yield('home')
            @yield('table')
            @yield('search')
        </main>
        <div class = "footer">
            FlyHigh © 2019
        </div>
    </div>
</body>
</html>
