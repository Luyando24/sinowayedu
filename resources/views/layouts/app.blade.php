<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinoway Edu')</title>

    <!-- Local Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <!-- Flag Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
    @include('components.mobile-nav')

    <!-- Local Bootstrap Bundle JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Your custom JS (optional) -->
    @vite('resources/js/app.js')
    
</body>
</html>

