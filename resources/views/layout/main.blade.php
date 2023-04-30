<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="container">
        <span class="logo">Blog News</span>
        <nav>
            <a href="/">Головна</a>
            {{-- <a href="/about">Про нас</a> --}}
           

            <!-- Authentication Links -->
            @guest
                <a href="/login">Увійти</a>
                <a href="/register">Зареєструватись</a>
            @else
                <a href="/article/add">Добавити статтю</a>
                <a href="/home">{{ Auth::user()->name}}</a>
            
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Вийти</button>
                </form>

            @endguest
        </nav>
        

    </header>

    

    <main class="container">
        @include('blocks/message')
        @yield('content')
    </main>
    <footer>
        Всі права захищені 
    </footer>
    
</body>
</html>