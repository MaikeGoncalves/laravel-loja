@extends('site.template')

@section('content')
<section class="text-gray-600 overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <div class="lg:w-1/2 w-full lg:h-auto max-h-64 max-w-full rounded flex items-center justify-center">
                <img class="flex " src="/media/products/{{ $product->cover }}">
            </div>
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ ucfirst($product->name) }}</h1>
                <p class="leading-relaxed">{{ $product->description }}</p>
                @if ($product->stock)
                    <div class="my-3">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">Em estoque</span>
                    </div>
                    <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                        <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price }}</span>
                        <a href="{{ route('adicionar_carrinho', ['idproduto' => $product->id ]) }}" class="cursor-pointer flex ml-auto items-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                            <ion-icon name="cart-sharp" class="mr-1 text-xl"></ion-icon>Adicionar
                        </a>
                    </div>
                @else
                    <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                        <span class="title-font font-medium text-2xl text-gray-900">${{ $product->price }}</span>
                        <a class="flex ml-auto text-red-700 bg-red-200 border-0 py-2 px-6 focus:outline-none rounded">Sem no estoque</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection