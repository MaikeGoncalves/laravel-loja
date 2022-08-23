<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login - Painel Administrativo</title>
</head>
<body class="h-screen w-full flex items-center justify-center bg-indigo-500">

    <form method="POST" action="{{ route('loginAction') }}" class="flex flex-col bg-white p-8 py-14 rounded w-96 shadow-black shadow-2xl">
        @csrf

        <div class="w-full text-gray-500 text-3xl font-bold flex items-center justify-center"><ion-icon name="finger-print-outline"></ion-icon>
            LOGIN
        </div>
        <div class="flex mb-6 w-full justify-center items-center">
            <div class="text-gray-400 font-light">Painel</div>
            <div class="text-gray-400 font-semibold">Admin</div>
        </div>
        <div class="flex items-center text-gray-500"><ion-icon name="mail-outline"></ion-icon>E-mail</div>
        <input type="email" name="email" id="" autofocus class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @if (session('error'))
            <div class="text-sm text-red-500">{{ session('error')}}</div>
        @endif
        @error('email')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        
        <div class="mt-2 flex items-center text-gray-500"><ion-icon name="lock-closed-outline"></ion-icon>Senha</div>
        <input type="password" name="password" id="" class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

        <div class="mt-2 flex items-center text-gray-500"><ion-icon name="lock-closed-outline"></ion-icon>Confirme a senha</div>
        <input type="password" name="password_confirmation" id="" class="w-full bg-gray-50/50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        @error('password')
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        
        <input type="submit" value="Entrar"  class="mt-8 flex w-full items-center justify-center text-white bg-indigo-500 border-0 py-3 focus:outline-none hover:bg-indigo-600 rounded cursor-pointer">
    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>