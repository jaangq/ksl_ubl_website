<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KSL-UBL</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('js/part/universal.js') }}"></script>
    @yield('js-head')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="loader-page" class="loader">
      <div class="circ">
        <div class="load">Loading . . . </div>
        <div class="hands"></div>
        <div class="body"></div>
        <div class="head">
          <div class="eye"></div>
        </div>
      </div>
    </div>
    <div id="app">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand nav-title" href="/"><img class="ksl-logo" src="{{ asset('storage/images/logo_KSL-UBL.png') }}" alt="KSL-UBL"> Kelompok Study Linux - UBL </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('posts')}}">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('lessons')}}">Lessons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('contact') }}">Contact</a>
            </li>
            <li class="nav-item lang-li">
              <span class="nav-link lang position-relative">
                <i class="fas fa-language "></i> Change Language
                <ul class="position-absolute">
                  <li class="lang-choice nav-link" val="in"><i class="fas fa-check @if(session('lang')) invisible @endif"></i> <strong>Indonesia</strong></li>
                  <li class="lang-choice nav-link" val="en"><i class="fas fa-check @if(!session('lang')) invisible @endif"></i> <strong>English</strong></li>
                </ul>
              </span>
              <!-- <label class="cwhite" for="lang">Pilih Bahasa</label> -->
              <!-- <select id="lang" class="form-control">
                <option value="">Pilih Bahasa</option>
                <option value="in">Indonesia</option>
                <option value="en">English</option>
              </select> -->
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
          </ul>
        </div>
        </nav>
        <main class="p-0">
            @yield('content')
        </main>
    </div>
    <div class="a-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    <footer class="p-3 text-center">
      <small>&copy;KSL(Kelompok Study Linux) 2018</small>
    </footer>
    @yield('js')
</body>
</html>
