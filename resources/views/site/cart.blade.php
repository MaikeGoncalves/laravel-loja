@extends('site.template')

@section('content')

<div class="container px-5 py-16 mx-auto">
    <h2 class="text-xl m-0 text-gray-900 font-medium">Meu Carrinho</h2>
    
    @if (isset($cart) && count($cart) > 0)

        <table class="w-full mt-4">
            <tbody>

                @php
                    $total = 0;    
                @endphp
                @foreach ($cart as $indice => $p)
                    
                    <tr class="" >
                        <td class="text-white bg-indigo-500 rounded border py-4 text-center w-24">Qtd: 1</td>
                        <td class="bg-gray-100 bg-opacity-50 rounded border px-4 w-2/3">
                            <div class="flex h-full w-full items-center">
                                <img src="/media/products/{{ $p->cover }}" class="h-12 w-14 rounded mr-3">
                                {{ $p->name }}
                            </div>
                        </td>
                        <td class="bg-gray-100 bg-opacity-50 rounded border px-4 flex items-center justify-between py-4">
                            <div> 
                                {{  'R$: '.number_format($p->price, 2, ',', '.') }}
                            </div>
                            <div><a href="{{ route('carrinho_excluir', [ 'indice' => $indice ]) }}" class="flex items-center"><ion-icon name="close-outline" class="text-2xl hover:text-red-500"></ion-icon></a></div>
                        </td>
                    </tr>
                    @php
                        $total += $p->price;
                    @endphp
                @endforeach

                <tr class="">
                    <td></td>
                    <td></td>
                    <td class="mt-1 text-left flex justify-between bg-gray-100 bg-opacity-50 rounded border">
                        <div class="py-4 pl-4">Total
                            {{  'R$: '.number_format($total, 2, ',', '.') }}
                        </div>
                        <div class="py-4 px-5 rounded bg-indigo-500 text-white hover:bg-indigo-600 cursor-pointer">Finalizar Compra</div>
                    </td>
                </tr>
            </tbody>
        </table>
        
    @else

        <h1 class="text-gray-400">Nenhum produto no carrinho :/</h1>
        
    @endif

    
</div>
    
@endsection