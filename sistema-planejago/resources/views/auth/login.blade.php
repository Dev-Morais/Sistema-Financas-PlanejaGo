@extends('layouts.master')

@section('content')

    <a href="{{ route('home') }}">Home</a>

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

<div class="flex w-full min-h-screen justify-center items-center ">
    <form action="{{ route('login.store') }} " method='POST' >
        
        @error('error')
            <span>{{ $message }}</span> 
        @enderror

        <div class="flex flex-col w-fit border rounded-sm p-4 gap-4">
            @csrf    
            <p>Email </p>
            <input type="text" name="email" value="" class="border rounded" >
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            
            <p>Senha </p>
            <input type="password" name="password" value="" class="border rounded" >
            @error('password')
                <span>{{ $message }}</span>
            @enderror
            
            <div class="flex justify-center">
                <button type="submit" class="bg-purple-300 p-2 border rounded-sm">submit</button>
            </div>
        
        </div>
    
    </form>
</div>    
        
    @endif
@endsection