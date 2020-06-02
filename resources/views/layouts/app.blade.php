<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Braća Karić</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Braća Karić
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
        {{--                    <li class="nav-item {{ Request::path() === 'reports' ? 'active' : '' }}"> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">Početna stranica</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Izvještaji</a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('reports.index') }}">
                                            Svi izvještaji
                                        </a>
                                        @can('post-reports')
                                            <a class="dropdown-item" href="{{ route('reports.create') }}">
                                                Postavi izvještaj
                                            </a>
                                        @endcan
                                    </div>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Proizvodi</a>

                                    <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{ route('parentCategories.show', 1) }}">Gotovi proizvodi</a>
                                          <a class="dropdown-item" href="{{ route('parentCategories.show', 2) }}">Poluproizvodi</a>
                                          <a class="dropdown-item" href="{{ route('parentCategories.show', 3) }}">Sirovine</a>
                                          <div class="dropdown-divider"></div>
                                          @can('add-products')
                                            <a class="dropdown-item" href="{{ route('products.create') }}">Dodaj novi</a>
                                          @endcan
                                    </div>
                                </li>
                                @can('manage-specifications')
                                    <li class="nav-item dropdown">
                                        <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Upravljanje specifikacijama</a>

                                        <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('debljinaStjenke.create') }}">Debljine stjenke</a>
                                              <a class="dropdown-item" href="{{ route('duv.create') }}">Dužine / Ugalovi / Vrste</a>
                                              <a class="dropdown-item" href="{{ route('lokacija.create') }}">Lokacije</a>
                                              <a class="dropdown-item" href="{{ route('materijal.create') }}">Materijali</a>
                                              <a class="dropdown-item" href="{{ route('promjer.create') }}">Promjeri</a>
                                              <a class="dropdown-item" href="{{ route('vrstaIzolacije.create') }}">Vrste izolacije</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="{{ route('parentCategories.create') }}">Kategorije nivo 1</a>
                                              <a class="dropdown-item" href="{{ route('childCategories.create') }}">Kategorije nivo 2</a>
                                        </div>
                                    </li>
                                @endcan
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            @can('manage-users')
                                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                                    User Management
                                                </a>
                                            @endcan

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            <div class="row justify-content-center">
                <div class="col-md-11">
                    @include('partials.alerts')
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>

    $('#myModal').modal(options);
    </script>
    
</body>
</html>
