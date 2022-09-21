<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Metas -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Links -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="all" />
        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            @yield('content')
        </div>
    </body>
</html>
