@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title> Sistema PlanejaGo </title>

    </head>
    <body class= "w-full h-screen  ">
        
        <div class="flex gap-4 items-center">
        
        @guest
            <div class= "flex justify-between w-full">
                <h2>Projeto Configurado </h2>
                <a href="{{ route('login.index') }}" class="bg-purple-300 p-2 border rounded-sm">Login</a>
            </div>
        @endguest

        @auth
            <span>Olá, {{ auth()->user()->name }}!</span>
            
            <form action="{{ route('login.destroy') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-400 text-white p-2 border rounded-sm">Sair</button>
            </form>
        @endauth
    </div>
    <main class="p-4">
        @yield('content')
    </main>

    </body>
</html>