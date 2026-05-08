<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanejaGo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('shared._navbar')

    <main class="container">
        @yield('conteudo')
    </main>
    
</body>
</html>