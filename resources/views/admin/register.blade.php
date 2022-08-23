<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Cadastro - Painel Administrativo</title>
</head>
<body class="h-screen w-full flex items-center justify-center bg-[#f4f3fd]">
    
    <form method="POST" action="{{ route('registerAction') }}" class="flex flex-col bg-white p-8 py-14 rounded w-96 shadow-indigo-400 shadow-2xl">
        @csrf
        <div class="w-full mb-6 text-gray-500 text-3xl font-bold flex items-center justify-center"><ion-icon name="finger-print-outline"></ion-icon>CADASTRE-SE</div>
        <div class="flex items-center text-gray-500"><ion-icon name="person-outline"></ion-icon>Nome completo</div>
        <input type="text" name="name" id="" class="mb-2 w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <div class="flex items-center text-gray-500"><ion-icon name="mail-outline"></ion-icon>E-mail</div>
        <input type="email" name="email" id="" class="mb-2 w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <div class="flex items-center text-gray-500"><ion-icon name="lock-closed-outline"></ion-icon>Senha</div>
        <input type="password" name="password" id="" class="mb-2 w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <div class="flex items-center text-gray-500"><ion-icon name="lock-closed-outline"></ion-icon>Confirme a senha</div>
        <input type="password" name="password_confirmation" id="" class="mb-6 w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <input type="submit" value="Cadastrar"  class="flex w-full mt-2 items-center justify-center text-white bg-indigo-500 border-0 py-3 focus:outline-none hover:bg-indigo-600 rounded cursor-pointer">
    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>