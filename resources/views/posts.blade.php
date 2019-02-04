@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="contaier posts pt-4">
  <nav class="nav-posts pt-2 position-relative">
    <ul class="d-inline-block">
      <li class="@if(url()->current() == url('posts')) active @endif"><a href="{{ url('posts') }}">{!! $data['pages'][$index++]['content'.session('lang')] !!}</a></li>
      <li class="@if(url()->current() == url('posts/news-only')) active @endif"><a href="{{ url('posts/news-only') }}">{!! $data['pages'][$index++]['content'.session('lang')] !!}</a></li>
      <li class="@if(url()->current() == url('posts/lessons-only')) active @endif"><a href="{{ url('posts/lessons-only') }}">{!! $data['pages'][$index++]['content'.session('lang')] !!}</a></li>
      <li class="@if(url()->current() == url('posts/popular')) active @endif"><a href="{{ url('posts/popular') }}">{!! $data['pages'][$index++]['content'.session('lang')] !!}</a></li>
      <li class="@if(url()->current() == url('posts/most-viewed')) active @endif"><a href="{{ url('posts/most-viewed') }}">{!! $data['pages'][$index++]['content'.session('lang')] !!}</a></li>
      <li class="@if(url()->current() == url('posts/tags')) active @endif"><a href="{{ url('posts/tags') }}">Tags</a></li>
    </ul>
    <div class="search-posts d-inline-block position-absolute">
      <form class="" action="{{ url('posts') }}" method="post">
         {{ csrf_field() }}
        <input type="hidden" name="post_sub" value="{{ $data['post_sub'] }}">
        <input class="form-control d-inline-block" type="text" name="search" placeholder="Search posts"><button class="btn btn-primary" type="submit" name="button"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </nav>
  <div class="container mt-5">
    @php($iter = 0)
    @if(array_key_exists('posts', $data))
    @foreach($data['posts'] as $post)

      @if(preg_match('/<img.+src="([^"]+)[^>]+>/', $post->content_en, $matches))
      @endif

      @if(!$post->categories)
        @php($post->categories = (object) ['name_en' => ''])
      @endif
      @if(!$post->sub_categories)
        @php($post->sub_categories = (object) ['name_en' => ''])
      @endif
      @if(!$post->sub_sub_categories)
        @php($post->sub_sub_categories = (object) ['name_en' => ''])
      @endif

      @if(!($iter % 3))
      <div class="row">
      @endif
        <div class="col-md-4 px-4 py-3 posts-box cursor-pointer">
          <img class="img img-fluid" src="@if($matches) {{ $matches[1] }} @else {{ asset('storage/images/default_article_cover.jpg') }} @endif" alt="">
          <div class="">
            <p class="h4 my-4">{{ $post['title'.session('lang')] }}</p>
            <p class="datetime">{{ date("l, F j, Y, g:i A", strtotime($post->updated_at)) }}</p>
            <p class="article text-justify">{{ substr(strip_tags(html_entity_decode(str_replace('&nbsp;', '', $post['content'.session('lang')]))), 0, 100) }}...</p> <a href="{{ KSLLinking::linking($data['posts'][$iter]->pages->name_en, $data['posts'][$iter]->categories->name_en, $data['posts'][$iter]->sub_categories->name_en, $data['posts'][$iter]->sub_sub_categories->name_en, $data['posts'][$iter]->title_slug) }}">Read More</a>
          </div>
        </div>
      @if(!(($iter+1) % 3))
      </div>
      @endif
      @php($iter++)
    @endforeach

    @else
      @foreach($data['tags'] as $tag)
        <span><a class="btn tags m-3 p-3" href="{{ url('posts/tags/'.$tag->name_en) }}">#{{ $tag->{'name'.session('lang')} }}</a></span>
      @endforeach
      <div class="mb-5"><br></div>
    @endif
  </div>
  @if(array_key_exists('posts', $data))
  <div class="m-5 p-5 text-center">
    <div class="d-inline-block">{{ $data['posts']->links() }}</div>
  </div>
  @endif

</section>
<script src="{{ asset('js/pages/posts.js') }}" charset="utf-8" defer></script>
@endsection
