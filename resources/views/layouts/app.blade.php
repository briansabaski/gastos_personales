<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/transacciones.css">
<!--La vista debe definir el titulo, sino se aplica el segundo argumento como titulo de la pagina -->
    <title>@yield('titulo', 'Nada')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-900">
    <x-menu />

    <main class="container mx-auto mt-8">
        @yield('contenido')
    </main>

</body>
</html>