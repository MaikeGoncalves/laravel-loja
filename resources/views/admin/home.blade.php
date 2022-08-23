@extends('admin.template')

@section('content')
    {{--Titulo das páginas--}}
    <div class="w-full p-6 font-semibold text-2xl text-gray-600 flex items-center">
        <ion-icon name="bar-chart-sharp" class="mr-2"></ion-icon>Dashboard
    </div>

    <section class="px-4 w-full h-40 flex">
        <div class="w-1/4 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="text-2xl text-gray-700 mb-3 pb-1 flex items-center border-b border-solid border-gray-400">
                    <ion-icon name="eye-sharp" class="mr-1"></ion-icon>Acessos
                </div>
                <div class="flex flex-col text-sm">
                    <div class="flex">
                        <strong>7 dias:</strong><div> {{ $view_7 }}</div>
                    </div>
                    <div class="flex">
                        <strong>30 dias:</strong><div> {{ $view_30 }}</div>
                    </div>
                    <div class="flex">
                        <strong>Total:</strong><div> {{ $view_total }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="text-2xl text-gray-700 mb-3 pb-1 flex items-center border-b border-solid border-gray-400">
                    <ion-icon name="rocket-sharp" class="mr-1"></ion-icon>Vendas
                </div>
                <div class="flex flex-col text-sm">
                    <div class="flex">
                        <strong>7 dias:</strong><div> 30</div>
                    </div>
                    <div class="flex">
                        <strong>30 dias:</strong><div> 10</div>
                    </div>
                    <div class="flex">
                        <strong>Total:</strong><div> 450</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="text-2xl text-gray-700 mb-3 pb-1 flex items-center border-b border-solid border-gray-400">
                    <ion-icon name="people-sharp" class="mr-1"></ion-icon>Clientes
                </div>
                <div class="flex flex-col text-sm">
                    <div class="flex">
                        <strong>7 dias:</strong><div> {{ $clients_7 }}</div>
                    </div>
                    <div class="flex">
                        <strong>30 dias:</strong><div> {{ $clients_30 }}</div>
                    </div>
                    <div class="flex">
                        <strong>Total:</strong><div> {{ $clients }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 px-2">
            <div class="w-full h-full bg-white rounded p-5">
                <div class="text-2xl text-gray-700 mb-3 pb-1 flex items-center border-b border-solid border-gray-400">
                    <ion-icon name="person-sharp" class="mr-1"></ion-icon>Admin
                </div>
                <div class="flex flex-col text-sm">
                    <div class="flex">
                        <strong>Admin:</strong><div> {{ $admin }}</div>
                    </div>
                    <div class="flex">
                        <strong>total:</strong><div> {{ $admin }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="px-6">
        {{--Usuários online na loja--}}
        <div class="w-full pt-7 pb-4 text-2xl text-gray-600 flex items-center">
            <ion-icon name="fitness-sharp" class="mr-2"></ion-icon>
            <div class="font-medium">Online agora:</div>{{ $totalOn }}
        </div>
        <table class="w-full text-center rounded">
            <tbody>
                @foreach ($nowTotals as $nowTotal)
                    
                    <tr class="border-b border-solid border-gray-200">
                        <td class="text-left pl-6 text-gray-500">Endereço ip: {{ $nowTotal->ip }}</td>
                        <td class="text-gray-500">Página vista: {{ $nowTotal->page }}</td>
                        <td class="p-2 text-gray-500">
                            <div class="bg-white py-3">Acesso {{ date('d-m-Y H:i:s', strtotime($nowTotal->date_access)) }}</div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </section>
@endsection