<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'ReparaTec')</title>

    <!-- Agregar Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        {{-- Navbar --}}
        @include('layouts.navbar')
    </header>
    <main>
        <div class="bg-green-100 my-4 text-center">
            <!-- Aquí puede ir contenido adicional -->
        </div>
        @yield('contenido')
    </main>
    <footer class="footer items-center p-4 bg-neutral text-neutral-content">
        @include('layouts.footer')
    </footer>
</body>

</html>
