@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="id-card-sharp" class="mr-2"></ion-icon>Admin
    </div>
    <div class="flex flex-col px-6">
        {{--flash de add--}}
        @if (session()->has('message'))
        <div class="mb-4 text-green-700 bg-green-200 w-full flex items-center justify-center py-2 rounded">{{ session()->get('message') }}</div>
        @endif

        <div class="flex items-center mb-2">
            <input type="search" name="" id="" autofocus class="w-full bg-white rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mr-2 placeholder:font-light placeholder:text-sm" placeholder="Pesquise por um administrador">
            <a href="{{ route('users.add') }}" class="flex items-center py-2 h-full text-white bg-indigo-500 border-0 px-4 text-base focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
        </div>
        <div class="flex flex-wrap">

            @foreach ($users as $user)
            <div class="w-1/4 p-2">
                <div class="bg-white rounded border border-gray-200 h-80 p-3 py-5 flex flex-col items-center justify-between">
                    <div>
                        <div class="w-full text-9xl text-gray-200 flex justify-center">
                            @if (!empty($user->avatar))
                            <div class="my-3 h-28 w-28 rounded-full flex items-center justify-center">
                                <img src="/media/avatar/{{ $user->avatar }}" class="w-28 h-28 rounded-full">
                            </div>
                            @else
                                <ion-icon name="person-circle-sharp"></ion-icon>
                            @endif
                        </div>
                        <div class="mb-2 text-gray-400 text-sm w-full flex justify-center">Desde 27.08.2022</div>
                        <div class="text-gray-500 text-2xl w-full flex justify-center font-semibold">{{ $user->name }}</div>
                        <div class="text-gray-400 w-full flex justify-center">{{ $user->email }}</div>
                    </div>
                    <a href="{{ url('/admin/usuarios/editar', ['user' => $user->id])}}">
                        <button class="w-36 flex items-center justify-center py-2 text-white bg-indigo-500 border-0 text-base focus:outline-none hover:bg-indigo-600 rounded">Gerenciar</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection