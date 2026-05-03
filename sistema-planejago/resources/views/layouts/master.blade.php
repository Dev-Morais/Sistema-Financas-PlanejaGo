<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title> Sistema PlanejaGo </title>

    </head>
    
    <body class= "w-full h-screen bg-amber-100 ">

        @yield('content')

    </body>
</html>
