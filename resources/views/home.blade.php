@extends('layouts.app')
@section('css')
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid p-0 home">
  <div class="cover py-5">
    <blockquote class="mt-5 pt-5">
      {!! $data['home'][$index++]['content'.session('lang')] !!}
      <!-- <p>The Linux philosophy is '<strong>Laugh in the face of danger</strong>'. <strong>Oops. Wrong One.</strong> '<strong>Do it yourself</strong>'. <strong>Yes, that's it.</strong></p>
      <cite>Linux Torvalds</cite> -->
    </blockquote>
  </div>
  <div class="what-do-we-do p-5 text-center">
    <p class="h2 my-3 a-link-white">{!! $data['home'][$index++]['content'.session('lang')] !!}</p>
    {!! $data['home'][$index++]['content'.session('lang')] !!}
  </div>
  <div id="learn-with-us" class="learn-with-us">
    <div class="learn-container p-5">
      <p class="h2 text-right m-3 a-link-white b-n-l">{!! $data['home'][$index++]['content'.session('lang')] !!}</p>
      <div class="row">
        <div class="col-md-6">
          <div class="learn-com">
            <p class="h2 p-4">{!! $data['home'][$index++]['content'.session('lang')] !!}</p>
            <div class="f-lessons cursor-pointer">
              <div><a href="{{ url('lessons/linux') }}"><i class="{{ $data['categories'][0]->icon }}"></i><p>{{ $data['categories'][0]['name'.session('lang')] }}</p></a></div>
              <div><a href="{{ url('lessons/linux') }}"><i class="{{ $data['categories'][1]->icon }}"></i><p>{{ $data['categories'][1]['name'.session('lang')] }}</p></a></div>
              <div><a href="{{ url('lessons/linux') }}"><i class="{{ $data['categories'][3]->icon }}"></i><p>{{ $data['categories'][3]['name'.session('lang')] }}</p></a></div>
              <div><a href="{{ url('lessons/linux') }}"><i class="{{ $data['categories'][2]->icon }}"></i><p>{{ $data['categories'][2]['name'.session('lang')] }}</p></a></div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5 be-our-family">
          <p class="text-center h3 my-4 d-none">{!! $data['home'][3]['content'.session('lang')] !!}</p>
          {!! $data['home'][$index++]['content'.session('lang')] !!}
        </div>
      </div>
    </div>
  </div>
  <div class="hot-news container-fluid p-5">
    <p class="title cursor-pointer h2 a-link a-link-anim-bottom-border m-0 pt-4 pb-2 mb-3">{!! $data['home'][$index++]['content'.session('lang')] !!}</p>
    <div class="content p-3">
      @php($iter = 0)
      @for($j = 0; $j < 2; $j++)
      <div class="row">
        @for($i = 0; $i < 3; $i++)
          @if(preg_match('/<img.+src="([^"]+)[^>]+>/', $data['posts'][$iter]->content_en, $matches))
          @endif

          <div class="col-md-4 px-4 py-3 news-box cursor-pointer">
            <img class="img-fluid" src="@if($matches) {{ $matches[1] }} @else {{ asset('storage/images/default_article_cover.jpg') }} @endif" alt="">
            <div class="">
              <p class="h4 my-4">{{ $data['posts'][$iter]['title'.session('lang')] }}</p>
              <p class="datetime">{{ date("l, F j, Y, g:i A", strtotime($data['posts'][$iter]->updated_at)) }}</p>
              <p class="article text-justify">{{ substr(strip_tags(html_entity_decode(str_replace('&nbsp;', '', $data['posts'][$iter]['content'.session('lang')]))), 0, 100) }}...</p>
              @if(!$data['posts'][$iter]->categories)
                @php($data['posts'][$iter]->categories = (object) ['name_en' => ''])
              @endif
              @if(!$data['posts'][$iter]->sub_categories)
                @php($data['posts'][$iter]->sub_categories = (object) ['name_en' => ''])
              @endif
              @if(!$data['posts'][$iter]->sub_sub_categories)
                @php($data['posts'][$iter]->sub_sub_categories = (object) ['name_en' => ''])
              @endif
              <a href="{{ KSLLinking::linking($data['posts'][$iter]->pages->name_en, $data['posts'][$iter]->categories->name_en, $data['posts'][$iter]->sub_categories->name_en, $data['posts'][$iter]->sub_sub_categories->name_en, $data['posts'][$iter]->title_slug) }}">Read More</a>
              @php($iter++)
            </div>
          </div>
        @endfor
      </div>
      @endfor
    </div>
    <br><br>
      <p class="more-news text-right h5 px-5">
        <strong><a href="{{url('news')}}">More News</a></strong>
        <hr>
      </p>
    </div>
  </div>
</div>
<meta name="page" content="home">
@endsection
@section('js')
<script src="{{ asset('js/pages/home.js') }}" charset="utf-8" defer></script>
@endsection
