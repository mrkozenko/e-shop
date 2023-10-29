@php
    if(!isset($_COOKIE['cart_id']))
            {
                setcookie('cart_id',uniqid());
            }
    @endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm sticky-top " >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    e-MaxiShop<img src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/undefined/external-stuffed-toy-babies-and-maternity-flaticons-flat-flat-icons.png" width="30" height="30" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Товари</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form method="POST" action="{{ route('search') }}">
                                @csrf
                    <div class="input-group mb-0 row-cols-md-6">
                        @isset($search_request)
                            <input type="text" name="search" value="{{$search_request}}" class="form-control" placeholder="Машина" aria-label="" aria-describedby="basic-addon1">
                        @else
                            <input type="text" name="search" value="" class="form-control" placeholder="Машина" aria-label="" aria-describedby="basic-addon1">

                        @endisset
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Знайти</button>
                        </div>
                    </div>
                            </form>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @php
                            if(!isset($_COOKIE['cart_id'])) setcookie('cart_id',uniqid());
          $cart_id=$_COOKIE['cart_id'];
          \Cart::session($cart_id);
                        @endphp
                        <a class="navbar-brand"  id="cart_count">{{\Cart::session($_COOKIE['cart_id'])->getTotalQuantity()}}

                        </a>
                        <a class="navbar-brand" href="{{ route('CartIndex') }}">
                        <img  src="https://img.icons8.com/color/48/undefined/shopping-basket-2.png" width="30" height="30" alt="">
                        </a>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Авторизація</a>
                                </li>
                            @endif


                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->role()->get()[0]->title=='admin')
                                        <a class="dropdown-item" href="{{ route('panel_controll') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('controll_panel').submit();">
                                            Панель керування
                                        </a>

                                        <form id="controll_panel" action="{{ route('panel_controll') }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                    <a class="dropdown-item" href="{{route('orders.show')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('orders-form').submit();">
                                        Мої замовлення
                                    </a>

                                    <form id="orders-form" action="{{route('orders.show')}}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       Вийти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('custom_js')

</body>
</html>
