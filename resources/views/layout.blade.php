<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Las Cumbres Shooting Club')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        @include('partials.navbar')
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <footer>
        @include('partials.footer')
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
