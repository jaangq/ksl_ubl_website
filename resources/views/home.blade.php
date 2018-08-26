@extends('layouts.app')
@section('css')
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid p-0 home">
  <div class="cover py-5">
    <blockquote class="mt-5 pt-5">
      <p>The Linux philosophy is '<strong>Laugh in the face of danger</strong>'. <strong>Oops. Wrong One.</strong> '<strong>Do it yourself</strong>'. <strong>Yes, that's it.</strong></p>
      <cite>Linux Torvalds</cite>
    </blockquote>
  </div>
  <div class="what-do-we-do p-5 text-center">
    <p class="h2 my-3 a-link-white">What is KSL and What Do We Do on KSL ?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, if you want to learn more about us just click on <a class="about-page-link" href="#">About Page</a> .</p>
  </div>
  <div id="learn-with-us" class="learn-with-us">
    <div class="learn-container p-5">
      <p class="h2 text-right m-3 a-link-white b-n-l">Be Our Family and Learn With Us</p>
      <div class="row">
        <div class="col-md-6">
          <div class="learn-com">
            <p class="h2 p-4">Besides Linux We Also Learn</p>
            <div class="f-lessons cursor-pointer">
              <div><a href="#"><i class="fab fa-linux"></i><p>Linux</p></a></div>
              <div><a href="#"><i class="fas fa-sitemap"></i><p>Networking</p></a></div>
              <div><a href="#"><i class="fas fa-paint-brush"></i><p>Design</p></a></div>
              <div><a href="#"><i class="fas fa-code"></i><p>Code</p></a></div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5 be-our-family">
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="hot-news container-fluid p-5">
    <p class="title cursor-pointer h2 a-link a-link-anim-bottom-border m-0 pt-4 pb-2 mb-3">Let's See the Latest News From Us</p>
    <div class="content p-3">
      <?php $iter = 0; ?>
      @for($j = 0; $j < 2; $j++)
      <div class="row">
        @for($i = 0; $i < 3; $i++)
          <div class="col-md-4 px-4 py-3 news-box cursor-pointer">
            <img class="img-fluid" src="{{ asset('storage/dummy_images/dummy'.$iter.'.jpg') }}" alt="">
            <div class="">
              <p class="h4 my-4">News {{$iter++}}</p>
              <p class="datetime">Tuesday, August 14, 2018</p>
              <p class="article text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <a href="{{url('news/dummy_news')}}">Read More</a>
            </div>
          </div>
        @endfor
      </div>
      @endfor
      <br><br>
      <p class="more-news text-right h5 px-5">
        <strong><a href="{{url('news')}}">More News</a></strong>
        <hr>
      </p>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/pages/home.js') }}" charset="utf-8" defer></script>
@endsection
