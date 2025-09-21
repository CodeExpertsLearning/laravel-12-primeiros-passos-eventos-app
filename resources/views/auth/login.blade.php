<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acessar Painel Eventos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-full absolute flex items-center justify-center">
        <div class="max-w-3xl rounded border border-gray-300 p-4 shadow">
            <div class="w-96 text-center">
                <h2 class="text-xl font-bold mb-6">Acessar Meus Eventos</h2>
            </div>
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="w-96 mb-6">
                    <label for="email" class="block mb-2">E-mail</label>
                    <input type="email" name="email"
                        class="w-full rounded outline-none border border-gray-300 p-2 focus:border-gray-900 focus:ring transition duration-300 ease-in-out"
                        id="email" placeholder="Seu email..." value="{{ old('email') }}" />

                    @error('email')
                        <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-96 mb-6">
                    <label for="password" class="block mb-2">Senha</label>
                    <input type="password" name="password"
                        class="w-full rounded outline-none border border-gray-300 p-2 focus:border-gray-900 focus:ring transition duration-300 ease-in-out"
                        id="password" placeholder="Sua senha..." />

                    @error('password')
                        <div class="p-2 border border-red-900 bg-red-400 text-red-900 rounded mb-6">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="w-full mb-6 flex gap-x-4">
                    <input type="checkbox" name="rememberme" id="rememberme" class="p-2 rounded border border-gray-900">
                    <label for="rememberme">Lembrar de mim</label>
                </div>

                <button
                    class="px-4 py-2 rounded border border-green-900 bg-green-600 hover:bg-green-900 text-white font-bold transition duration-300 ease-in-out">
                    Acessar
                </button>
            </form>
        </div>
    </div>
</body>

</html>
