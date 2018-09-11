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
      <li><a href="{{ url('lessons/'.strtolower(str_slug($data['categories'][0]->name_en, '-'))) }}">{{ $data['categories'][0]->{'name'.session('lang')} OR '' }}</a></li>
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

              @if(!$post->categories)
                @php($post->categories = (object) ['name_en' => '', 'name' => ''])
              @endif
              @if(!$post->sub_categories)
                @php($post->sub_categories = (object) ['name_en' => '', 'name' => ''])
              @endif
              @if(!$post->sub_sub_categories)
                @php($post->sub_sub_categories = (object) ['name_en' => '', 'name' => ''])
              @endif

              @if($post->sub_categories->{'name'.session('lang')})
                  @if($char == strtoupper(substr($post->sub_categories->{'name'.session('lang')}, 0, 1)))
                    <?php $sub_arr[$sub_i++] =  $post->sub_categories->{'name'.session('lang')}; ?>
                    @foreach($sub_arr as $sub_array)
                      @if($sub_array == $post->sub_categories->{'name'.session('lang')} && array_count_values($sub_arr)[$post->sub_categories->{'name'.session('lang')}] > 1)
                      <?php $sub_flag = true; ?>
                      @endif
                    @endforeach
                    @if(!$sub_flag)
                    <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')) }}" href="#">{{ $post->sub_categories->{'name'.session('lang')} }}
                    @endif
                      @if($post->sub_sub_categories)
                        <?php $sub_sub_arr[$sub_sub_i++] =  $post->sub_sub_categories->{'name'.session('lang')}; ?>
                        @foreach($sub_sub_arr as $sub_sub_array)
                          @if($sub_sub_array == $post->sub_sub_categories->{'name'.session('lang')} && array_count_values($sub_sub_arr)[$post->sub_sub_categories->{'name'.session('lang')}] > 1)
                          <?php $sub_sub_flag = true; ?>
                          @endif
                        @endforeach
                        @if($post->sub_sub_categories->{'name'.session('lang')})
                        @if(!$sub_flag)
                        <ul>
                        @endif
                          @if(!$sub_sub_flag && $sub_flag)
                          <li>
                            <ul>
                              <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')) }}" href="#">{{ $post->sub_sub_categories->{'name'.session('lang')} }}</a>
                                <ul>
                                  <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')).'-'.$post->title_slug }}" href="{{ KSLLinking::linking($post->pages->name_en, $post->categories->name_en, $post->sub_categories->name_en, $post->sub_sub_categories->name_en, $post->title_slug) }}"><u class='less-list-title-post'>{{ $post->{'title'.session('lang')} }}</u></a></li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          @elseif($sub_sub_flag)
                          <li>
                            <ul>
                              <li>
                                <ul><li>
                                  <a href="{{ KSLLinking::linking($post->pages->name_en, $post->categories->name_en, $post->sub_categories->name_en, $post->sub_sub_categories->name_en, $post->title_slug) }}"><u class='less-list-title-post'>{{ $post->{'title'.session('lang')} }}</u> oy</a>
                                </li></ul>
                              </li>
                            </ul>
                          </li>
                          @else
                          <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')) }}" href="#">{{ $post->sub_sub_categories->{'name'.session('lang')} }}</a>
                            <ul>
                              <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')).'-'.$post->title_slug }}" href="{{ KSLLinking::linking($post->pages->name_en, $post->categories->name_en, $post->sub_categories->name_en, $post->sub_sub_categories->name_en, $post->title_slug) }}"><u class='less-list-title-post'>{{ $post->{'title'.session('lang')} }}</u></a></li>
                            </ul>
                          </li>
                          @endif
                        @if(!$sub_flag)
                        </ul>
                        @endif

                      @else
                      <ul>
                        <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')).'-'.$post->title_slug }}" href="{{ KSLLinking::linking($post->pages->name_en, $post->categories->name_en, $post->sub_categories->name_en, $post->sub_sub_categories->name_en, $post->title_slug) }}"><u class='less-list-title-post'>{{ $post->{'title'.session('lang')} }}</u></a></li>
                      </ul>
                        @endif
                      @else
                      <ul>
                        <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')).'-'.$post->title_slug }}" href="{{ KSLLinking::linking($post->pages->name_en, $post->categories->name_en, $post->sub_categories->name_en, $post->sub_sub_categories->name_en, $post->title_slug) }}"><u class='less-list-title-post'>{{ $post->{'title'.session('lang')} }}</u></a></li>
                      </ul>
                      @endif
                    @if(!$sub_flag)
                    </a></li>
                    @endif
                  @endif
                @elseif($char == strtoupper(substr($post->{'title'.session('lang')}, 0, 1)))
                <li><a id="{{ strtolower(str_slug($post->sub_categories->name_en. '-')).'-'.strtolower(str_slug($post->sub_sub_categories->name_en. '-')).'-'.$post->title_slug }}" href="{{ KSLLinking::linking($post->pages->name_en, $post->categories->name_en, $post->sub_categories->name_en, $post->sub_sub_categories->name_en, $post->title_slug) }}"><u class='less-list-title-post'>{{ $post->{'title'.session('lang')} }}</u></a></li>
              @endif
            @endforeach
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
