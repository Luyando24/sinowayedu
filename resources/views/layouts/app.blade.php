<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinoway Edu')</title>

    <!-- Local Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">




    <!-- Optional: Google Fonts -->
    <link href="https://fonts.loli.net/css2?family=Roboto&display=swap" rel="stylesheet">

    
    <!-- Your custom CSS (optional) -->
    @vite('resources/css/app.css')
</head>
<body style="font-family: 'Inter', sans-serif;" class="text-dark">
    
    @include('components.top-bar')
    @include('components.header')

    <main class="py-4">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Local Bootstrap Bundle JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Your custom JS (optional) -->
    @vite('resources/js/app.js')
    
</body>
</html>
