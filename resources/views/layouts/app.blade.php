<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rey Electric Services</title>

    {{-- Bootstrap (ya lo tienes en Vite o npm) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body>

    {{-- SIDEBAR --}}
    @include('layouts.partials.sidebar')

    {{-- TOPBAR --}}
    @include('layouts.partials.topbar')

    {{-- CONTENT --}}
    <div class="content p-4">
        @yield('content')
    </div>

</body>
</html>