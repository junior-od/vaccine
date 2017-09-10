<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vaccine') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/vaccine.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/sweet-alert.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('home') }}"> Home </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

    {{ Html::script('js/sweet-alert.js') }}
    {{ Html::script('js/jquery-1.10.2.min.js') }}
    @include('layouts.flash')
    {{ Html::script('js/pace.min.js') }}
    {{ Html::script('js/dropzone.js') }}
    {{ Html::script('js/main.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.min.js') }}
    {{ Html::script('js/dataTables.responsive.min.js') }}
    {{ Html::script('js/responsive.bootstrap.min.js') }}

</body>
</html>
