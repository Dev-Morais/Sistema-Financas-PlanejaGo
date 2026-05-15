@extends('layouts.master')

@section('content')
    <div class="flex gap-4 items-center">
        @auth
            <span>Olá, {{ auth()->user()->name }}!</span>
            
            <form action="{{ route('login.destroy') }}" method="POST">
                @csrf
                {{-- <button type="submit" class="bg-red-400 text-white p-2 border rounded-sm">Sair</button> --}}
            </form>
        @endauth
    </div>

@endsection