<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KSL Admin Pages</title>


    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/ksl.style.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- config('app.name', 'Laravel') --}}
                    <span class="font-concert-one h2">KSL-UBL</span>
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
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
        </nav>


    </div>

    <div class="container-fluid row m-0 p-0">
      <section class="col-md-2 justify-content-center sidebar p-0">
        <ul class="p-0">
          <li><a href="{{ url('ksl/admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          <li><a href="{{ url('ksl/admin/profile-information') }}"><i class="fas fa-info-circle"></i> <span>Profile Information</span></a></li>
          <li class="has-sub"><a class="pages-nav" href="{{ url('ksl/admin/pages') }}"><i class="fas fa-file"></i> <span>Pages</span>
            <i class="fas fa-chevron-right"></i>
            <i class="fas fa-chevron-down d-none"></i>
          </a>
            <ul>
              @foreach ($pages as $page)
                <li><a href="#"><span>{{ $page->name_en }}</span></a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{ url('ksl/admin/posts') }}"><i class="fas fa-file"></i> <span>Posts</span></a></li>
          <li><a href="{{ url('ksl/admin/categories') }}"><i class="fas fa-list-ul"></i> <span>Categories</span></a></li>
          <li><a href="{{ url('ksl/admin/users') }}"><i class="fas fa-users"></i> <span>Users</span></a></li>
          <li><a href="{{ url('ksl/admin/tags') }}"><i class="fas fa-tags"></i> <span>Tags</span></a></li>
        </ul>
      </section>
      <main class="col-md-10">
          @yield('content')
      </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/fontawesome-all.min.js') }}" defer></script>
    <script src="{{ asset('js/admin/universal.js') }}" defer></script>
    @yield('js')
</body>
</html>
