@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="cart-sharp" class="mr-2"></ion-icon>E-commerce
    </div>

    <section class="px-4 w-full h-36 flex">
        <div class="w-1/5 px-2">
            <div class="w-full h-full bg-white rounded p-5 flex flex-col items-center justify-center">
                <div class="text-sm text-gray-600 mb-1 flex items-center justify-center"><ion-icon name="logo-usd"></ion-icon><div>VENDAS</div></div>
                <div class="text-gray-500 text-5xl font-semibold">187</div>
            </div>
        </div>
        <div class="w-1/5 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="w-full h-full bg-white rounded p-5 flex flex-col items-center justify-center">
                    <div class="text-sm text-gray-600 mb-1 flex items-center justify-center"><ion-icon name="bag-handle-sharp" class="mr-1"></ion-icon><div>PRODUTOS</div></div>
                    <div class="text-gray-500 text-5xl font-semibold">{{ $totalProduct }}</div>
                </div>
            </div>
        </div>
        <div class="w-1/5 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="w-full h-full bg-white rounded p-5 flex flex-col items-center justify-center">
                    <div class="text-sm text-gray-600 mb-1 flex items-center justify-center"><ion-icon name="bag-check-sharp" class="mr-1"></ion-icon><div>BAIXO EST/</div></div>
                    <div class="text-gray-500 text-5xl font-semibold">2</div>
                </div>
            </div>
        </div>
        <div class="w-1/5 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="w-full h-full bg-white rounded p-5 flex flex-col items-center justify-center">
                    <div class="text-sm text-gray-600 mb-1 flex items-center justify-center"><ion-icon name="people-sharp" class="mr-1"></ion-icon><div>CLIENTES</div></div>
                    <div class="text-gray-500 text-5xl font-semibold">{{ $totalclient }}</div>
                </div>
            </div>
        </div>
        <div class="w-1/5 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="w-full h-full bg-white rounded p-5 flex flex-col items-center justify-center">
                    <div class="text-sm text-gray-600 mb-1 flex items-center justify-center"><ion-icon name="mail-sharp" class="mr-1"></ion-icon><div>E-MAILS</div></div>
                    <div class="text-gray-500 text-5xl font-semibold">880</div>
                </div>
            </div>
        </div>
    </section>
    <section class="px-6">
        {{--Usuários online na loja--}}
        <div class="w-full pt-7 pb-4 text-2xl text-gray-600 flex items-center">
            <div class="font-medium"><ion-icon name="stats-chart-sharp" class="mr-1"></ion-icon>Últimas vendas</div> 
        </div>
        <table class="w-full text-center rounded">
            <tbody>
                <tr class="border-b border-solid border-gray-200">
                    <td class="bg-gray-50 text-left pl-6 text-gray-700 py-4">Maike 88</td>
                    <td class="bg-gray-50 text-gray-500 py-4">Chuteira Adidas</td>
                    <td class="bg-gray-50 text-gray-500 py-4">Data: 23-08-2022</td>
                    <td class="bg-gray-50 p-2 text-gray-500 py-4">Total: 109.99</td>
                </tr>
                <tr class="border-b border-solid border-gray-200">
                    <td class="bg-gray-50 text-left pl-6 text-gray-700 py-4">Camisa NoRisk</td>
                    <td class="bg-gray-50 text-gray-500 py-4">Preço: 59.99</td>
                    <td class="bg-gray-50 text-gray-500 py-4">Quant: 2</td>
                    <td class="bg-gray-50 p-2 text-gray-500 py-4">Total: 109.99</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection