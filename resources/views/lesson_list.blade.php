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
      <?php
        $sub_arr = []; $sub_i = 0; $sub_flag = false;
        $sub_sub_arr = []; $sub_sub_i = 0; $sub_sub_flag = false; 
      ?>
      @foreach (range('A', 'Z') as $char)
        <li id="{{ $char }}"><strong>{{ $char }}</strong>
          <ul>
            @foreach($data['posts'] as $post)
              @if($post->sub_categories)
                  @if($char == strtoupper(substr($post->sub_categories->name_en, 0, 1)))
                    <?php $sub_arr[$sub_i++] =  $post->sub_categories->name_en; ?>
                    @foreach($sub_arr as $sub_array)
                      @if($sub_array == $post->sub_categories->name_en && array_count_values($sub_arr)[$post->sub_categories->name_en] > 1)
                      <?php $sub_flag = true; ?>
                      @endif
                    @endforeach
                    @if(!$sub_flag)
                    <li><a href="">{{ $post->sub_categories->name_en }}
                    @endif
                      @if($post->sub_sub_categories)
                        @if($post->sub_sub_categories->name_en)
                        @if(!$sub_flag)
                        <ul>
                        @endif
                          <li><a href="">{{ $post->sub_sub_categories->name_en }}</a>
                            <ul>
                              <li><a href="">{{ $post->title_en }}</a></li>
                            </ul>
                          </li>
                        @if(!$sub_flag)
                        </ul>
                        @endif
                        @endif
                      @else
                      <ul>
                        <li><a href="">{{ $post->title_en }}</a></li>
                      </ul>
                      @endif
                    @if(!$sub_flag)
                    </a></li>
                    @endif
                  @endif
                @elseif($char == strtoupper(substr($post->title_en, 0, 1)))
                <li><a href="">{{ $post->title_en }}</a></li>
              @endif
            @endforeach
            <!-- @if(count($data['categories'][0]->sub_categories))
              @foreach($data['categories'][0]->sub_categories as $sub_categories)
                @if(count($sub_categories->sub_sub_categories))

                @elseif(substr($sub_categories->name, 0, 1) == $char)
                  <li><a href="">{{ $sub_categories->name }}</a><ul>
                  @foreach($sub_categories->posts as $posts)
                    <li><a href="">{{ $posts->title }}</a></li>
                  @endforeach
                  </ul></li>
                @endif
              @endforeach
            @elseif(count($data['categories'][0]->posts))
              @foreach($data['categories'][0]->posts as $posts)
                @if($char == substr($posts->title, 0, 1))
                <li><a href="">{{ $posts->title }}</a></li>
                @endif
              @endforeach
            @endif -->
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
