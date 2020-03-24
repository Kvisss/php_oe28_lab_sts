<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bower_components/adminlte/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">

</head>
<body class="hold-transition @yield('body')">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('adminIndex')}}" class="nav-link">{{ __('messages.home') }}</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('adminIndex')}}" class="brand-link">
                <img src="{{ asset('images/logo.png') }}"
                     class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">{{ __('messages.Admin') }}</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/img_avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->full_name}}</a>
                        <a href="{{ route('logout') }}">{{__('Logout')}}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="{{route('courses.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    {{ __('messages.list_course')}}
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('content-header')</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
        </footer>
    </div>

    <script src="{{ asset('bower_components/jQuery/dist/jquery.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/js/adminlte.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/js/file.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ mix('/js/all.js') }}"></script>

</body>

</html>
