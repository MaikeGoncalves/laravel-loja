@extends('site.template')

@section('content')
    <section class="h-96 flex items-center justify-center flex-col my-10">

        @if (session()->has('successCad'))
            <div class="mb-4 text-green-700 bg-green-200 w-80 flex items-center justify-center py-2 rounded">
                {{ session()->get('successCad') }}
            </div>
        @endif

        </div>

        <form method="POST" action="{{ route('loginLojaAction') }}" class="flex flex-col rounded shadow-gray-900 shadow-2xl px-5 py-12">
            
            @csrf
            <div class="pb-3 flex items-center justify-center tenxt-gray-500 text-2xl font-bold">
                <ion-icon name="finger-print-outline"></ion-icon>LOGIN
            </div>
            <div class="text-gray-500 flex items-center py-1">
                <ion-icon name="mail-outline"></ion-icon>E-mail
            </div>
            <input type="email" name="email" id="" class="w-80 bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('email')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            @if (session('error'))
                <div class="text-sm text-red-500">{{ session('error')}}</div>
            @endif
            <div class="text-gray-500 flex items-center pb-1 mt-3">
                <ion-icon name="lock-closed-outline"></ion-icon>Senha
            </div>
            <input type="password" name="password" id="" class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('password')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
            <input type="submit" value="Entrar" class="mt-5 flex w-full items-center justify-center text-white bg-indigo-500 border-0 py-3 focus:outline-none hover:bg-indigo-600 rounded cursor-pointer">
            <div class="flex items-center justify-end text-indigo-500 text-sm pt-1">
                <a href="{{ route('loja.cadastro') }}" class="hover:underline">Não possui conta? Cadastre-se</a>
            </div>
        </form>
    </section>
@endsection