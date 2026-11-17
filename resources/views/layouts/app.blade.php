
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'WebHub')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap"
        rel="stylesheet"
    >

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">

    @stack('styles')
</head>

<body>

    <!-- Barra de navegación -->
    <nav class="navbar-custom">
        <div class="container-fluid px-4">

            <a href="{{ route('estudiantes.index') }}" class="brand">
                WebHub<span>.</span>
            </a>

            <div class="d-flex align-items-center gap-3">
                @yield('navbar-actions')
            </div>

        </div>
    </nav>

    <!-- Contenido de cada vista -->
    <main class="main-container">

        @yield('content')

    </main>

    @stack('scripts')

</body>
</html>
