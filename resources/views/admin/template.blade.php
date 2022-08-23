<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Painel Administrativo - Loja My Store</title>
</head>
<body class="h-full min-h-screen w-full font-roboto bg-gray-100 p-0 m-0 box-border">
    <header class="w-full h-full flex">
        <aside class="h-full w-60 fixed bg-indigo-500 left-0 flex flex-col shadow-indigo-500/50 shadow-xl">
            {{--topo-logo--}}
            <div class="container mx-auto flex items-center justify-center px-5 py-9">
                <a href="{{ route('admin.home') }}" class="flex title-font font-medium items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 bg-white p-2 text-indigo-500 rounded-full" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl">My store</span>
                </a>
            </div>
            <ul class="text-white text-base px-1">
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.home') }}" class="w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700 rounded-md"><ion-icon name="bar-chart-sharp" class="mr-2"></ion-icon>Dashboard</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.vendas') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700"><ion-icon name="cart-sharp" class="mr-2"></ion-icon>E-commerce</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.sales') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700"><ion-icon name="rocket-sharp" class="mr-2"></ion-icon>Vendas</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.products') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700"><ion-icon name="bag-handle-sharp" class="mr-2"></ion-icon>Produtos</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.clients') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700"><ion-icon name="people-sharp" class="mr-2"></ion-icon>Clientes</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.emails') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700"><ion-icon name="mail-sharp" class="mr-2"></ion-icon>E-mais</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('admin.users') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700"><ion-icon name="id-card-sharp" class="mr-2"></ion-icon>Admin</a>
                </li>
                <li class="w-full rounded-md mb-1 flex items-center">
                    <a href="{{ route('loja.home') }}" class="rounded-md w-full pl-9 py-3 bg-indigo-600/50 hover:bg-indigo-700" target="_blank" ><ion-icon name="shirt-sharp" class="mr-2"></ion-icon>Ver site</a>
                </li>
            </ul>
        </aside>
        <div class="container h-full min-w-full pl-60 flex flex-col">
            <div class="w-full h-16 bg-white px-6 flex items-center justify-between">
                <div class="flex">
                    <div class="text-gray-400/60 font-semi-bold text-xl flex items-center"><ion-icon name="settings-sharp" class="mr-1"></ion-icon>Painel</div>
                    <div class="text-gray-400/60 text-xl font-bold">Admin</div>
                </div>
                <div class="flex items-center">
                    <div class="text-gray-500 mr-2 flex items-center">
                        <div class="flex items-center  mr-4">
                            <a href="" class="flex items-center">
                                <ion-icon name="notifications-outline" class="text-gray-500 text-2xl"></ion-icon>
                            </a>
                        </div>
                        <a href="{{ route('admin.perfil') }}" class="flex items-center">
                            {{ $userLogged->name }}
                            <div>
                                @if (!empty($userLogged->avatar))
                                <div class="ml-2 h-10 w-10 rounded-full flex items-center justify-center">
                                    <img src="/media/avatar/{{ $userLogged->avatar }}" class="w-10 h-10 rounded-full">
                                </div>
                                @else
                                    <ion-icon name="person-circle-outline" class="w-10 h-10"></ion-icon>
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('admin.logout') }}" class="flex items-center">
                            <ion-icon name="exit-outline" class="text-red-500 text-2xl"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            
            {{--outras páginas--}}
            @yield('content')

        </div>
    </header>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>