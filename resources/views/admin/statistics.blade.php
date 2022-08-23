@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="bag-handle-sharp" class="mr-2"></ion-icon>Produto #{{ $produtStatistic->id }}
    </div>

    <div class="w-full px-6 flex ">

        <div class="w-1/3">
            <div class="w-full h-auto p-2 flex items-center justify-center">
                <img src="/media/products/{{ $produtStatistic->cover }}" class="h-full w-full rounded">
            </div>
        </div>
        <div class="w-2/3 flex flex-col p-2">
            <div class="text-gray-900 text-3xl title-font font-medium mb-1">
                {{ ucfirst($produtStatistic->name) }}
            </div>
            <p class="text-sm text-gray-500">{{ $produtStatistic->description }}</p>
            
            @if ($produtStatistic->stock)
                <div class="my-3 flex">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">{{ $produtStatistic->stock }} itens no estoque</span>
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-200 text-green-600 mx-2">25 vendidos</div>
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-200 text-orange-600">{{ $productViewTotal }} visualiações</div>
                </div>
            @else
                <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                    <span class="title-font font-medium text-2xl text-gray-900">${{ $produtStatistic->price }}</span>
                    <a class="flex ml-auto text-red-700 bg-red-200 border-0 py-2 px-6 focus:outline-none rounded">Sem no estoque</a>
                </div>
            @endif
            <div class="border-t-2 border-gray-200 mt-2 flex pt-6 pb-2">
                <div class="title-font font-medium text-2xl py-1 text-gray-900">R$: {{ $produtStatistic->price }}</div>
                
                <button class="cursor-pointer flex ml-auto items-center text-white bg-indigo-500 border-0  px-6 focus:outline-none hover:bg-indigo-600 rounded">Editar</button>
            </div>
        </div>
        
    </div>

@endsection