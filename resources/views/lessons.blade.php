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
    <p class="cover-text">{!! $data['lessons'][$index++]['content'.session('lang')] !!}</p>
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
      @php ($i = 0)
      @foreach ($data['categories'] as $cat)
        @if (!($i % 3))
        <div class="row m-0 pb-5">
        @endif
        <div class="col-md-4">
          <a href="{{ url('lessons/linux') }}">
            <div class="lesson-content">
              <div class="image">
                <i class="ficon {{ $cat->icon }}"></i>
              </div>
              <div class="desc">
                {{ $cat['name'.session('lang')] }}
              </div>
            </div>
          </a>
        </div>
        @if (!(($i+1) % 3))
        </div>
        @endif
        @php ($i++)
      @endforeach
    </div>
  </section>
</div>
<script src="{{ asset('js/pages/lessons.js') }}" charset="utf-8" defer></script>
@endsection
