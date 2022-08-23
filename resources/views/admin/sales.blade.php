@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="rocket-sharp" class="mr-2"></ion-icon>Vendas
    </div>

    <div class="w-full px-6 flex flex-col">

        {{--flash de add--}}
        @if (session()->has('message'))
        <div class="mb-4 text-green-700 bg-green-200 w-full flex items-center justify-center py-2 rounded">{{ session()->get('message') }}</div>
        @endif
        {{--flash de excluir--}}
        @if (session('deletsuccess'))
            <div class="mb-4 text-green-700 bg-green-200 w-full flex items-center justify-center py-2 rounded">{{ session('deletsuccess')}}</div>
        @endif

        <div class="flex mb-2 items-center">
            <input type="search" name="" id="" class="w-full bg-gray-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mr-2 placeholder:font-light placeholder:text-sm" placeholder="Busque pelo código, nome, cpf">
            <a href="{{ route('product.add') }}" class="flex items-center py-2 h-full text-white bg-indigo-500 border-0 px-4 text-base focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
        </div>
        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
            <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Cod</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200" style="width: 150px">Comprador</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Produto</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Valor</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Data</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Ver</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 text-right">Ações</th>
            </tr>
            </thead>
            <tbody class="divide-y">

            
            <tr class="bg-gray-100">
                <td class="px-4 py-3">id</td>
                <td class="h-16 w-28 flex items-center justify-center m-2">
                    
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/800x450">
                    
                </td>
                <td class="px-4 py-3">Nome do produto</td>
                <td class="px-4 py-3">R$: 480</td>
                <td class="px-8 py-3">8</td>
                <td class="px-10 py-3">2</td>
                <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                    <a class="mt-3 text-indigo-500 inline-flex items-center">Imprimir</a>

                </td>
            </tr>
                
            
            
            </tbody>
        </table>
    </div>

@endsection