<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>My Store</title>
</head>
<body class="h-full">
    <header class="bg-indigo-500 shadow-lg fixed w-full">
        <div class="container flex items-center p-5 px-20 w-full">
            <a href="{{ route('loja.home') }}" class="w-1/5 flex title-font font-medium items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 bg-white p-2 text-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">My store</span>
            </a>
            <div class="w-3/5 flex">
                <form action="/" method="GET" class="w-full flex">
                    <input type="search" name="search" value="{{ request()->search }}" id="" class="w-full bg-indigo-50 rounded border border-gray-300 focus:ring-2 focus:bg-white text-base outline-none text-gray-900 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out placeholder:font-light" placeholder="Busque aqui seu produto">
                    <button class="-ml-11 h-full flex items-center justify-center bg-indigo-400 px-3 rounded"><ion-icon name="search-outline" class="text-gray-100 text-xl"></ion-icon></button>
                </form>
            </div>
            <div class="flex items-center w-1/5">
                <nav class="md:ml-auto flex flex-wrap items-center text-2xl justify-center">
                    
                        <a href="{{ route('loja.cart') }}" class="mr-2 flex items-center justify-center">
                            <ion-icon name="cart-sharp" class="text-indigo-100 hover:text-white"></ion-icon>
                        </a>

                    <a href="{{ route('loja.cart') }}" class="mr-5 flex items-center justify-center">
                        <ion-icon name="heart-sharp" class="text-indigo-100 hover:text-white"></ion-icon>
                    </a>
                </nav>

                <a href="{{ route('loja.login') }}">
                    <button class="text-indigo-600 inline-flex items-center bg-indigo-100 border-0 py-1 px-3 focus:outline-none hover:bg-white rounded text-base md:mt-0">
                        <ion-icon name="person-outline" class="mr-1"></ion-icon>Entrar
                    </button>
                </a>

            </div>
        </div>
    </header>

<section class="text-gray-600 pt-20">

    @yield('content')

</section>

<footer class="text-gray-600">
    <div class="border-t border-gray-200">
        <div class="container px-5 py-8 flex flex-wrap mx-auto items-center">
            <div class="flex md:flex-nowrap flex-wrap justify-center items-end md:justify-start">
                <div class="relative sm:w-64 w-40 sm:mr-4 mr-2">
                    <label for="footer-field" class="leading-7 text-sm text-gray-600">Placeholder</label>
                    <input type="text" id="footer-field" name="footer-field" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                <p class="text-gray-500 text-sm md:ml-6 md:mt-0 mt-2 sm:text-left text-center">Bitters chicharrones fanny pack
                    <br class="lg:block hidden">waistcoat green juice
                </p>
            </div>
            <span class="inline-flex lg:ml-auto lg:mt-0 mt-6 w-full justify-center md:justify-start md:w-auto">
        <a class="text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-gray-500 text-sm text-center sm:text-left">© 2020 Tailblocks —
                <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" target="_blank" rel="noopener noreferrer">@knyttneve</a>
            </p>
            <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-gray-500 text-sm">Enamel pin tousled raclette tacos irony</span>
        </div>
    </div>
</footer>
    

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>