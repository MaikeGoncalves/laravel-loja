@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="bag-handle-sharp" class="mr-2"></ion-icon>Produtos
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
            <form action="{{ route('admin.products') }}" method="get" class="w-full mr-2">
                <input type="search" name="search" value="{{ request()->search }}" id="" class="w-full bg-gray-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out placeholder:font-light placeholder:text-sm" placeholder="Pesquise por um produto">
            </form>
            <a href="{{ route('product.add') }}" class="flex items-center py-2 h-full text-white bg-indigo-500 border-0 px-4 text-base focus:outline-none hover:bg-indigo-600 rounded">Adicionar</a>
        </div>
        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
            <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">#</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200" style="width: 150px">Imagem</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Nome</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Valor</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Estoque</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Min-Estoque</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 text-right">Ações</th>
            </tr>
            </thead>
            <tbody class="divide-y">

            @foreach ($products as $product)
            <tr class="bg-gray-100">
                <td class="px-4 py-3">{{ $product->id }}</td>
                <td class="h-16 w-28 flex items-center justify-center m-2">
                    @if (empty($product->cover))
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/800x450">
                    @else
                        <img class="object-cover object-center w-28 h-16 block" src="/media/products/{{ $product->cover }}">
                    @endif
                    
                </td>
                <td class="px-4 py-3">{{ ucfirst($product->name) }}</td>
                <td class="px-4 py-3">R${{ $product->price }}</td>
                <td class="px-8 py-3">{{ $product->stock }}</td>
                <td class="px-10 py-3">{{ $product->min_stock }}</td>
                <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                    <a href="{{ route('product.statistic', $product->id) }}" class="mt-3 text-indigo-500 inline-flex items-center">
                        <ion-icon name="stats-chart-outline" class="text-lg">
                    </ion-icon></a>

                    <a href="{{ route('product.destroy', $product->id) }}" class="mt-3 text-indigo-500 inline-flex items-center" onclick="return confirm('Tem certeza que deseja excluir este produto?')" >Deletar</a>
                </td>
            </tr>
                
            @endforeach
            
            </tbody>
        </table>
    </div>

@endsection