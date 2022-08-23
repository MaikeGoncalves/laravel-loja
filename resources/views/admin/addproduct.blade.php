@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="bag-add-sharp" class="mr-2"></ion-icon>Adicionar produto
    </div>

        <div class="container px-5 w-full">
            <div class="w-full overflow-auto">
                
                <form method="POST" action="{{ route('product.addAction') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                                <input type="text" id="name" name="name" class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @error('name')
                                    <div class="text-sm text-red-500"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="price" name="price"
                                       class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                    @error('price')
                                       <div class="text-sm text-red-500"> {{ $message }}</div>
                                   @enderror
                            </div>
                        </div>
    
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="stock" name="stock"
                                       class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('stock')
                                       <div class="text-sm text-red-500"> {{ $message }}</div>
                                   @enderror
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Min/Estoque</label>
                                <input type="text" id="min_stock" name="min_stock"
                                       class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('min_stock')
                                       <div class="text-sm text-red-500"> {{ $message }}</div>
                                   @enderror
                            </div>
                        </div>
    
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover"
                                       class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                    @error('cover')
                                       <div class="text-sm text-red-500"> {{ $message }}</div>
                                   @enderror
                            </div>
                        </div>
    
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea
                                    id="description" name="description"
                                    class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                    @error('description')
                                        <div class="text-sm text-red-500"> {{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
    
                        <div class="p-2 w-full">
                            <input type="submit" value=" Adicionar"  class="flex w-full justify-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded cursor-pointer">
                        </div>
    
                    </div>
                </form>
            </div>
        </div>

@endsection