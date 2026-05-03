<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title> Sistema PlanejaGo </title>

    </head>
    
    <body class= "w-full h-screen  ">
        <p class= "font-roboto font-bold">Projeto Configurado</p>
        @yield('content')

    </body>
</html>
