<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="max-w-7xl mx-auto py-10 flex justify-end">
        <nav>
            <ul>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="text-red-800 font-bold cursor-pointer hover:underline">Sair</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="max-w-7xl mx-auto py-10">
        <div class="w-full my-10">
            @include('includes.messages')
        </div>
        @yield('body')
    </div>

    @stack('scripts')
</body>

</html>
