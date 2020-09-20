<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    {{--  --}}

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @stack('before-style')
    <!-- style -->
   @include('includes.shopingcard')
   <!--  stack berfungsi untuk memberikan style pada satu halaman tanpa menimpa halaman lain -->
    @stack('after-style')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top" style="background-color: white;">
            <div class="container">
                <div class="navbar-brand">
                        @auth
                            <a href="{{route('home.index')}}" class="phone" title="">
                                {{Auth::user()->name}}
                            </a>
                        @endauth
                        @guest
                            <a href="{{route('login')}}" class="phone" title="">
                                You must be login
                            </a>
                        @endguest
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    @auth
                    <div class="caret" >
                        <a href="{{route('user.edit',Auth::user()->id)}}"
                            style="text-decoration: none;"  class="phone">
                            <i class="fa fa-user-circle"></i>
                            update
                        </a>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                style="text-decoration: none;" />
                                <div class="caret px-3 pt-3">
                                    logout
                                </div>
                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            <div class="nav-item dropdown">
                                <button type="button" class="btn btn-info" data-toggle="dropdown">
                                     <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carts
                                </button>
                                    @include('layouts.chartmodal')
                            </div>
                         @endauth


                         @guest
                            <li class="nav-item">
                                <a href="{{route('login')}}" title="" style="text-decoration: none;">
                                    <span class="caret">login</span>
                                </a>
                            </a>
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
    @stack('before-script')
   <!-- script -->
    @include('includes.script')
    @include('includes.modal')
    @stack('after-script')
</body>
</html>