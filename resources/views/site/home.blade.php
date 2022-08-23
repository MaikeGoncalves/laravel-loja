@extends('site.template')

@section('content')
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">

            @foreach ($products as $product)
            <div class="flex flex-col transition-all ease-in-out duration-500 lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="flex items-center justify-center h-48 w-full rounded">
                    <img class="max-w-full max-h-full" src="/media/products/{{ $product->cover }}">
                </a>
                <div class="mt-4">
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ ucfirst($product->name) }}</h2>
                    <p class="mt-1">${{ $product->price }}</p>
                </div>
                <a href="{{ route( 'product.show', $product->id ) }}" class="mt-3 text-indigo-500 inline-flex items-center">Ver mais
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            @endforeach
            
        </div>
</div>
@endsection