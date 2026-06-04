@extends('layouts.master')

@section('content')

    @if(session()->has('success'))
        {{session()->get('success')}} 
    @endif

    @if (auth()->check())
        already logged in  {{  auth()->user()->name }} 
        
        <form action="{{ route('login.destroy') }} " method='POST'>
            @csrf
            <a href={{ route('login.destroy') }} >logout </a>
        </form>
        
        @else 

<div class="relative flex flex-col justify-center pt-12 gap-6 items-center w-full h-full"> 

    <div class="absolute top-0 right-0 w-1/3 max-w-[200px] md:max-w-[300px] pointer-events-none -z-10">
        <img src="{{ asset('assets/images/FlorInvertida.png') }}" alt="Ilustração Topo" class="w-full h-auto object-contain">
    </div>

    <div class="absolute bottom-0 left-0 w-1/2 max-w-[250px] md:max-w-[400px] pointer-events-none -z-10">
        <img src="{{ asset('assets/images/flor1.png') }}" alt="Ilustração Flor 1" class="w-full h-auto object-contain drop-shadow-sm">
    </div>

    <h1 class="text-5xl font-bold text-[#615ACD]">Entre na sua Conta </h1>
    <div class=" flex flex-col items-center w-full h-full pt-24">
        <form action="{{ route('login.store') }} " method='POST' >
            
            @error('error')
                <span>{{ $message }}</span> 
            @enderror

            <div class="flex flex-col w-fit border border-gray-300 rounded-md p-4 gap-2">
                @csrf    
                <div>
                    <label class="block mb-1.5 text-lg font-medium text-gray-700">Email</label>
                    @error('email')
                        <span class = "text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="text" name="email" class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-[#615ACD] focus:border-[#615ACD] placeholder-gray-400" placeholder="Ex: usuario@gmail.com" />
                </div>

                <div>
                    <label class="block mb-1.5 text-lg font-medium text-gray-700">Senha</label>
                    @error('password')
                        <span class = "text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <input type="password" name="password" class="block w-full px-3 py-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-[#615ACD] focus:border-[#615ACD] placeholder-gray-400" />
                </div>
                
                <div class= "flex flex-col gap-4 pt-4">

                    <a class="text-sm text-[#2C2966]"> Esqueci minha Senha</a>

                    <div class="flex justify-center">
                        <button type="submit" class="inline-block bg-[#5B51D8] hover:bg-[#4A40C5] text-white font-semibold w-full p-1.5 rounded-xl shadow-md transition duration-200 ease-in-out transform hover:-translate-y-0.5">Entrar</button>
                    </div>

                </div>
            
            </div>
        
        </form>
    </div>
</div>         
        
@endif
@endsection