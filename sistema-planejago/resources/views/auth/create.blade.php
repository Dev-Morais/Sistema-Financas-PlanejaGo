@extends('layouts.master')

@section('content')
<div class="w-full">
    <div class="flex "> 
        <h1>Registrar-se no Sistema </h1>
    </div>

    <div class="flex justify-center items-center ">
        <form action="{{ route('user.store') }} " method='POST' >
            
        <div class="flex flex-col w-fit border rounded-sm p-4 gap-4">
            @csrf
            
            <div class = "flex flex-col">
            
                <p>Nome: </p>
                <input type="text" name="name" value="" class="border rounded" >
                @error('name')
                    <p>{{$message}}</p>
                @enderror
            </div>
            
            <div class = "flex flex-col">
            
                <p>Data de Nascimento </p>
                <input type="date" name="data_nascimento" value="" class="border rounded" >
            
                @error('date')
                    <p>{{$message}} </p>
                @enderror
            
            </div>

            <div class = "flex flex-col">
            
                <p>Email: </p>
                <input type="text" name="email" value="" class="border rounded" >

                @error('email')
                    <p>{{$message}} </p>
                @enderror

                @error('error')
                    <span>{{ $message }}</span> 
                @enderror

            </div>

            <div class = "flex flex-col">
            
                <p>Senha: </p>
                <input type="password" name="password" value="" class="border rounded" >
                
                @error('password')
                    <p>{{$message}} </p>
                @enderror

            </div>
            
            <div class = "flex flex-col">
            
                <p>Confirmar Senha: </p>
                <input type="password" name="password_confirmation" value="" class="border rounded" >
            
                @error('password_confirmation')
                    <p>{{$message}} </p>
                @enderror
            
            </div>

            <button type="submit" class="bg-purple-300 p-2 border rounded-sm">Cadastrar-se</button>

        </div>
        
        </form>
    </div>  
@endsection