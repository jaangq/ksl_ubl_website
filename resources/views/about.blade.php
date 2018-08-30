@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/about.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="about">
  <section>
    <div class="row m-0">
      <div class="col-md-1"></div>
      <div class="col-md-8">
        <div class="container p-5">
          <p class="h1 text-justify">
            What is KSL <i class="fab fa-linux"></i>
          </p>
          <div class="p-5">
            <img src="{{ asset('storage/dummy_images/what_is_ksl.png') }}" alt="" class="img img-fluid">
          </div>
          <p class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <p class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p><br><br>
            <p class="h1 text-justify">
              What Do We Do on KSL ?
            </p>
            <div class="px-5 pb-5 pt-3">
              <img class="img img-fluid" src="{{ asset('storage/dummy_images/people-coffee-notes-tea.jpg') }}" alt="">
            </div>
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p><br><br>
            <p class="h1 text-justify">
              Our Team (Organization Info Graphic)
            </p>
            <div class="p-5">
              <img src="{{ asset('storage/dummy_images/fam.png') }}" alt="" class="img img-fluid border">
            </div>
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p><br><br>
            <p class="h1 text-justify">
              Our Partners
            </p>
            <p class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <div class="p-5">
              <img src="{{ asset('storage/dummy_images/logos-about.png') }}" alt="" class="img img-fluid">
            </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </section>
</div>
<!-- <script src="{{ asset('js/pages/about.js') }}" charset="utf-8" defer></script> -->
@endsection
