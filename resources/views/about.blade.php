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
            {!! $data['about'][$index++]['content'.session('lang')] !!} <i class="fab fa-linux"></i>
          </p>
          {!! $data['about'][$index++]['content'.session('lang')] !!}
          <p class="h1 text-justify">
            {!! $data['about'][$index++]['content'.session('lang')] !!}
          </p>
          {!! $data['about'][$index++]['content'.session('lang')] !!}
          <p class="h1 text-justify">
            {!! $data['about'][$index++]['content'.session('lang')] !!}
          </p>
          {!! $data['about'][$index++]['content'.session('lang')] !!}
          <p class="h1 text-justify">
            {!! $data['about'][$index++]['content'.session('lang')] !!}
          </p>
          {!! $data['about'][$index++]['content'.session('lang')] !!}
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </section>
</div>
<!-- <script src="{{ asset('js/pages/about.js') }}" charset="utf-8" defer></script> -->
@endsection
