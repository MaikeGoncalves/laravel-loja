@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="people-sharp" class="mr-2"></ion-icon>Clientes
    </div>
    <div class="flex flex-col px-6">
        {{--flash de add--}}
        @if (session()->has('message'))
        <div class="mb-4 text-green-700 bg-green-200 w-full flex items-center justify-center py-2 rounded">{{ session()->get('message') }}</div>
        @endif

        <div class="flex items-center mb-2">
            <input type="search" name="" id="" class="w-full bg-white rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mr-2 placeholder:font-light placeholder:text-sm" placeholder="Pesquise por um cliente">
            <a href="" class="flex items-center py-2 h-full text-white bg-indigo-500 border-0 px-4 text-base focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
        </div>
        <div class="flex flex-wrap">

            @foreach ($clients as $client)
            
                <div class="w-1/4 p-2">
                    <div class="bg-indigo-500 rounded border border-gray-200 h-80 p-3 py-5 flex flex-col items-center justify-between">
                        <div>
                            <div class="w-full text-9xl text-gray-100 flex justify-center">
                                {{--
                                <div class="my-3 h-28 w-28 rounded-full flex items-center justify-center">
                                    <img src="/media/avatar/" class="w-28 h-28 rounded-full">
                                </div>
                                --}}
                                    <ion-icon name="person-circle-sharp"></ion-icon>
                                
                            </div>
                            <div class="mb-2 text-gray-100 text-sm w-full flex justify-center">Desde {{ date('d-m-Y', strtotime($client->date_cad)) }}</div>
                            <div class="text-gray-200 text-2xl w-full flex justify-center font-semibold">{{ $client->name }}</div>
                            <div class="text-gray-100 w-full flex justify-center">{{ $client->email }}</div>
                        </div>
                        <a href="">
                            <button class="w-36 flex items-center justify-center py-2 text-indigo-500 bg-gray-100 border-0 text-base focus:outline-none hover:bg-white rounded">Gerenciar</button>
                        </a>
                    </div>
                </div>
                
            @endforeach
           
        </div>
    </div>
@endsection