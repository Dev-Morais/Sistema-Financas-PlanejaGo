<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanejaGo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-screen h-screen flex flex-col">

    @include('shared._navbar')

    <main class="flex flex-col w-full h-full">
        @yield('content')
    </main>
    
</body>
</html>