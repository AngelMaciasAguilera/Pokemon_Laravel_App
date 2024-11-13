<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('pokemon')}}">Pokemons</a>
        </div>
    </div>

    <div>
        @yield('content')
    </div>


    @yield('scripts')

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Pokémon App. All rights reserved.</p>
    </footer>

</body>
</html>
