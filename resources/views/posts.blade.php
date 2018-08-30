@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="contaier posts pt-4">
  <nav class="nav-posts pt-2 position-relative">
    <ul class="d-inline-block">
      <li class="active"><a href="#">Most Recent</a></li>
      <li><a href="#">News Only</a></li>
      <li><a href="#">Lessons Only</a></li>
      <li><a href="#">Popular</a></li>
      <li><a href="#">Most Viewed</a></li>
    </ul>
    <div class="search-posts d-inline-block position-absolute">
      <input class="form-control d-inline-block" type="text" name="" placeholder="Search posts"><button class="btn btn-primary" type="button" name="button"><i class="fas fa-search"></i></button>
    </div>
  </nav>
  <div class="container mt-5">
    <?php $iter = 0; ?>
    @for($j = 0; $j < 2; $j++)
    <div class="row">
      @for($i = 0; $i < 3; $i++)
        <div class="col-md-4 px-4 py-3 posts-box cursor-pointer">
          <img class="img-fluid" src="{{ asset('storage/dummy_images/dummy'.$iter.'.jpg') }}" alt="">
          <div class="">
            <p class="h4 my-4">posts {{$iter++}}</p>
            <p class="datetime">Tuesday, August 14, 2018</p>
            <p class="article text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <a href="{{ url('news/dummy_news') }}">Read More</a>
          </div>
        </div>
      @endfor
    </div>
    @endfor
    <?php $iter = 0; ?>
    @for($j = 0; $j < 2; $j++)
    <div class="row">
      @for($i = 0; $i < 3; $i++)
        <div class="col-md-4 px-4 py-3 posts-box cursor-pointer">
          <img class="img-fluid" src="{{ asset('storage/dummy_images/dummy'.$iter.'.jpg') }}" alt="">
          <div class="">
            <p class="h4 my-4">posts {{$iter++}}</p>
            <p class="datetime">Tuesday, August 14, 2018</p>
            <p class="article text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <a href="{{ url('news/dummy_news') }}">Read More</a>
          </div>
        </div>
      @endfor
    </div>
    @endfor
  </div>
  <div class="m-5 p-5 text-center">
    <div class="d-inline-block">{{ $paginatenya->links() }}</div>
  </div>

</div>
<!-- <script src="{{ asset('js/pages/posts.js') }}" charset="utf-8" defer></script> -->
@endsection
