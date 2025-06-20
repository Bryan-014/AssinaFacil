<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Assina Fácil</title>
        <script>
            (function () {
                try {
                    const temaSalvo = localStorage.getItem('tema') || 'light';
                    document.documentElement.setAttribute('data-theme', temaSalvo);
                } catch (e) {
                    document.documentElement.setAttribute('data-theme', 'light');
                }
            })();
        </script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        @yield('css-resources')
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @yield('header')
            <div class="app-container">
                @yield('aside-links')
                <div class="content">
                    <div class="cont-box">
                        @yield('cont-box')
                    </div>
                    @if (session('alert'))
                        <x-alert />
                    @endif
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js-resources')
</html>
