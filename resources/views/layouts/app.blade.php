<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>.:{{ config('app.name', 'dormans') }}:.</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    {{--fontawesome--}}
    <link href="{{ asset('css/fontawesome.all.min.css') }}" rel="stylesheet">

    {{--theme--}}
    <link href="{{ asset('css/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

    {{--custom css for this application --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div id="app" class="wrapper">
        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    .:{{ config('app.name', 'dormans') }}:.
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            --}}{{--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif--}}{{--
                        @else
                            @hasanyrole('Admin|User Manager')
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endhasrole
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav>--}}

                <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/no-image.gif') }}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('images/no-image.gif') }}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since {{ date('F, Y', strtotime(Auth::user()->arrival_date)) }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{url('/user/'.Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                            <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/home') }}" class="brand-link">
                <img src="{{ asset('images/dormans_logo-128x128.png') }}" alt=".:dormans:. Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">.:dormans:.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/no-image.gif') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link  {{ request()->is('home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('users*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="fas fa-users-cog"></i>
                                <p>
                                    User Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link {{ request()->is('users/create') ? 'active' : '' }}">
                                        <i class="fas fa-user-plus nav-icon"></i>
                                        <p>Create New User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>User List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('products*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-store-alt"></i>
                                <p>
                                    Product Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @can('product-create')
                                <li class="nav-item">
                                    <a href="{{ route('products.create') }}" class="nav-link {{ request()->is('products/create') ? 'active' : '' }}">
                                        <i class="fas fa-luggage-cart nav-icon"></i>
                                        <p>Add New Product</p>
                                    </a>
                                </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products') ? 'active' : '' }}">
                                        <i class="fas fa-layer-group nav-icon"></i>
                                        <p>Product List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('roles*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <p>
                                    Role Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @can('role-create')
                                <li class="nav-item">
                                    <a href="{{ route('roles.create') }}" class="nav-link {{ request()->is('roles/create') ? 'active' : '' }}">
                                        <i class="fas fa-notes-medical"></i>
                                        <p>Add New Role</p>
                                    </a>
                                </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('roles') ? 'active' : '' }}">
                                        <i class="fas fa-clipboard-list"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ request()->is('advance*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('advance*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-ad"></i>
                                <p>
                                    Advance Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @can('advance-create')
                                <li class="nav-item">
                                    <a href="{{ route('advances.create') }}" class="nav-link {{ request()->is('advances/create') ? 'active' : '' }}">
                                        <i class="fas fa-hand-holding-usd nav-icon"></i>
                                        <p>Advance Entry</p>
                                    </a>
                                </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="{{ route('advances.index') }}" class="nav-link {{ request()->is('advances') ? 'active' : '' }}">
                                        <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                        <p>Advances</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('divisions') ? 'menu-open' : request()->is('districts') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('divisions') ? 'active' : request()->is('districts') ? 'active' : '' }}">
                                <i class="fab fa-modx"></i>
                                <p>
                                    Extras
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('home.division') }}" class="nav-link {{ request()->is('division*') ? 'active' : '' }}">
                                        <i class="nav-icon far fa-circle text-info"></i>
                                        <p>Divisions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.district') }}" class="nav-link {{ request()->is('district*') ? 'active' : '' }}">
                                        <i class="nav-icon far fa-circle text-info"></i>
                                        <p>Districts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{--<!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard v2</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v2</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->--}}

            <!-- Main content -->
            {{--<main class="py-4">--}}
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
            {{--</main>--}}
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2019 - @php echo date("Y"); @endphp <a href="http://huntever.com">.: t4 Technologies & Media Inc :.</a></strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> d.0.1
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}" defer></script>
    <script src="{{ asset('js/adminlte.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
