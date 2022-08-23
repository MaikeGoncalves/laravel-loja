@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="star-half-sharp" class="mr-2"></ion-icon>Meu Perfil
    </div>

    <div class="px-6">
        <form action="{{ route('perfilAction') }}" method="post" class="" enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            {{--nome--}}
            @if (session()->has('message'))
                <div class="mb-4 text-green-600 bg-green-100 w-full flex items-center justify-center py-2 rounded">{{ session()->get('message') }}</div>
            @endif
            <div class="text-gray-500 flex items-center mb-1"><ion-icon name="person-outline"></ion-icon>Nome completo</div>
            <input type="text" name="name" id="" value="{{ $user->name }}" class="w-full bg-gray-50/90 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-500 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('name')
                <div class="text-sm text-red-500"> {{ $message }}</div>
            @enderror
            {{--email--}}
            <div class="text-gray-500 flex items-center mt-4 mb-1"><ion-icon name="mail-outline"></ion-icon>E-mail</div>
            <input type="email" name="email" id="" value="{{ $user->email }}" class="w-full bg-gray-50/90 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-500 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('email')
                <div class="text-sm text-red-500"> {{ $message }}</div>
            @enderror
            {{--@if (session('error'))
                <div class="text-sm text-red-500">{{ session('error')}}</div>
            @endif--}}
            {{--senha--}}
            <div class="text-gray-500 flex items-center mt-4 mb-1"><ion-icon name="lock-closed-outline"></ion-icon>Nova senha</div>
            <input type="password" name="password" id="" class="w-full bg-gray-50/90 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-500 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            {{--confirmação da senha--}}
            <div class="text-gray-500 flex items-center mt-4 mb-1"><ion-icon name="lock-closed-outline"></ion-icon>Confirme a senha</div>
            <input type="password" name="password_confirmation" id="" class="w-full bg-gray-50/90 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-500 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('password')
                <div class="text-sm text-red-500"> {{ $message }}</div>
            @enderror
            @if (session('error'))
                <div class="text-sm text-red-500">{{ session('error')}}</div>
            @endif
            {{--avatar--}}
            <div class="text-gray-500 flex items-center mt-4 mb-1"><ion-icon name="camera-outline"></ion-icon>Avatar</div>
            <input type="file" name="avatar" id="" class="w-full bg-gray-50/90 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-500 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            
            <input type="submit" value="Salvar"  class="mt-6 flex w-full justify-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded cursor-pointer">
        </form>
    </div>
@endsection