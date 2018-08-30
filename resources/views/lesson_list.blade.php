@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/lesson_list.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="lesson-list">
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li class="chevron"><i class="fas fa-chevron-right"></i></li>
      <li><a href="{{ url('lessons') }}">Lessons</a></li>
      <li class="chevron"><i class="fas fa-chevron-right"></i></li>
      <li><a href="{{ url('lessons/linux') }}">Linux</a></li>
    </ul>
  </nav>
  <section class="container p-5">
    <p class="h4">List Of Linux Lessons</p>
    <div class="list-a-z">
      <span><a href="#">#</a></span> |
      @foreach (range('A', 'Z') as $char)
        <span><a href="{{ url()->current() }}#{{ $char }}">{{ $char }}</a></span> |
      @endforeach
    </div>
    <div class="content">
      <hr>
      <ul>
        <li><strong>#</strong><hr></li>
      @foreach (range('A', 'Z') as $char)
        <li id="{{ $char }}"><strong>{{ $char }}</strong>
          <ul>
            <li><a href="{{ url()->current() }}/dummy_lessons">{{ $char }}orem Ipsum Dolor Sit Amet</a></li>
            <li><a href="{{ url()->current() }}/dummy_lessons">{{ $char }}orem Ipsum Dolor Sit Amet</a>
              <ul>
                <li><a href="{{ url()->current() }}/subcat/dummy_lessons">{{ $char }}orem Ipsum Dolor Sit Amet</a></li>
                <li><a href="{{ url()->current() }}/subcat/dummy_lessons">{{ $char }}orem Ipsum Dolor Sit Amet</a></li>
              </ul>
            </li>
            <li><a href="{{ url()->current() }}/dummy_lessons">{{ $char }}orem Ipsum Dolor Sit Amet</a></li>
          </ul>
          <hr>
        </li>
      @endforeach
      </ul>
    </div>
  </section>
</div>
<!-- <script src="{{ asset('js/pages/lesson_list.js') }}" charset="utf-8" defer></script> -->
@endsection
