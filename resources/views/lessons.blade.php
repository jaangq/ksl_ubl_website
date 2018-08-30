@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/lessons.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="lessons">
  <div class="cover">
    <div class="cup">
      <div class="coffee"></div>
    </div>
    <div class="smoke"></div>
    <p class="cover-text">Let's Learn Together With Us</p>
  </div>
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li class="chevron"><i class="fas fa-chevron-right"></i></li>
      <li><a href="{{ url('lessons') }}">Lessons</a></li>
    </ul>
  </nav>
  <section>
    <div class="lessons-cat pt-5">
      <div class="row m-0 pb-5">
        <div class="col-md-4">
          <a href="{{ url('lessons/linux') }}">
            <div class="lesson-content">
              <div class="image">
                <i class="ficon fab fa-linux"></i>
              </div>
              <div class="desc">
                Linux
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="{{ url('lessons/linux') }}">
            <div class="lesson-content">
              <div class="image">
                <i class="ficon fas fa-sitemap"></i>
              </div>
              <div class="desc">
                Networking
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="{{ url('lessons/linux') }}">
            <div class="lesson-content">
              <div class="image">
                <i class="ficon fas fa-code"></i>
              </div>
              <div class="desc">
                Programming
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row m-0 pb-5">
        <div class="col-md-4">
          <a href="{{ url('lessons/linux') }}">
            <div class="lesson-content">
              <div class="image">
                <i class="ficon fas fa-paint-brush"></i>
              </div>
              <div class="desc">
                Design
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="{{ asset('js/pages/lessons.js') }}" charset="utf-8" defer></script>
@endsection
