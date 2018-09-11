@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/article.css') }}" rel="stylesheet">
@endsection

@section('content')
@if(preg_match('/<img.+src="([^"]+)[^>]+>/', $data['posts']->content_en, $matches)) @endif
<div class="article">
  <div class="cover" style="background-image: url({{ $matches[1] OR '' }})">
    <div class="cover-bg text-center">
      <p class="title h2 p-2">{{ $data['posts']['title'.session('lang')] }}</p>
      <div class="img-container p-2">
        <img class="img img-fluid" src="{{ asset('storage/images/dp.jpg') }}" alt="">
        <span class="px-2"><a class="a-link-white" href="#">{{ $data['posts']->users->name }}</a></span>
      </div>
      <p class="p-2"><small>{{ date("l, F j, Y, g:i A", strtotime($data['posts']->updated_at)) }}</small></p>
    </div>
  </div>
  @if(Request::segment(1) === 'lessons')
  <nav>
    <ul>
      {!! KSLNavLessons::navlessons(Request::segment(2), Request::segment(3), Request::segment(4), Request::segment(5)) !!}
    </ul>
  </nav>
  @endif
  <div class="sosmed-icon">
    @foreach($data['sosmed'] as $sosmed)
    @if($sosmed->label_en == 'google+') @php($sosmed->label_en = 'google-plus')  @endif
    <span><a href="{{ $sosmed->{'content'.session('lang')} }}"><i class="fab fa-{{ $sosmed->label_en }}"></i></a></span>
    @endforeach
  </div>
  <div class="start-scroll"></div>
  <div class="article pt-4 m-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <article class="text-justify">
          <!-- <p class="headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
          {!! $data['posts']['content'.session('lang')] !!}
        </article>
        <div class="next-prev border py-3 m-0 row">
          <div class="col-md-6 text-left">
            <div class="">
              <strong class="">Previous Article</strong>
              @if(!$data['prev_post']->categories)
                @php($data['prev_post']->categories = (object) ['name_en' => ''])
              @endif
              @if(!$data['prev_post']->sub_categories)
                @php($data['prev_post']->sub_categories = (object) ['name_en' => ''])
              @endif
              @if(!$data['prev_post']->sub_sub_categories)
                @php($data['prev_post']->sub_sub_categories = (object) ['name_en' => ''])
              @endif
              <a class="a-link" href="{{ KSLLinking::linking($data['prev_post']->pages->name_en, $data['prev_post']->categories->name_en, $data['prev_post']->sub_categories->name_en, $data['prev_post']->sub_sub_categories->name_en, $data['prev_post']->title_slug) }}">
                <p class="m-0">{{ $data['prev_post']->{'title'.session('lang')} }}</p>
              </a>
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="">
              <strong class="">Next Article</strong>
              @if(!$data['next_post']->categories)
                @php($data['next_post']->categories = (object) ['name_en' => ''])
              @endif
              @if(!$data['next_post']->sub_categories)
                @php($data['next_post']->sub_categories = (object) ['name_en' => ''])
              @endif
              @if(!$data['next_post']->sub_sub_categories)
                @php($data['next_post']->sub_sub_categories = (object) ['name_en' => ''])
              @endif
              <a class="a-link" href="{{ KSLLinking::linking($data['next_post']->pages->name_en, $data['next_post']->categories->name_en, $data['next_post']->sub_categories->name_en, $data['next_post']->sub_sub_categories->name_en, $data['next_post']->title_slug) }}">
                <p class="m-0">{{ $data['next_post']->{'title'.session('lang')} }}</p>
              </a>
            </div>
          </div>
        </div>
        <hr>
        <div class="tags text-justify">
          <p class="h3 m-2">Tags</p>
          @foreach($data['tags'] as $tags)
            <span><a class="py-1 px-4 m-2" href="{{ url('posts/tags/'.$tags['name'.session('lang')]) }}"># {{ $tags['name'.session('lang')] }}</a></span>
          @endforeach
        </div>
        <div class="end-scroll"></div>
        <hr><br>
        <div class="comment-box mt-2 mx-2">
            <div class="form-group">
              <label class="h3" for="comment-textarea">Comment Article</label>
              <textarea id="comment-textarea" class="form-control" rows="5" name="name" placeholder="Comments Here"></textarea>
              <div class="comment-txt-bottom p-2 position-relative">
                <p class="login-comment m-0 px-3">LOG IN WITH</p>
                <p class="m-0">
                    <span><a href="#"><i class="fab fa-facebook"></i></a></span>
                    <span><a href="#"><i class="fab fa-twitter"></i></a></span>
                    <span><a href="#"><i class="fab fa-youtube"></i></a></span>
                    <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                    <span><a href="#"><i class="fab fa-google-plus"></i></a></span>
                </p>
                <div class="btn-comments">
                  <p class="m-0">
                    <button class="form-control btn btn-primary" type="button" name="comment">Comments</button>
                  </p>
                  <p class="m-0">
                    <button class="form-control btn btn-primary" type="button">Resets</button>
                  </p>
                </div>
              </div>
            </div>
            <div class="comment-user">
              <div class="comment-cont p-3">
                <div class="comment-header">
                  <p class="user-name m-0">Nanda Nisya</p>
                  <p class="date-post"><small>12 December 2016 at 01:54</small></p>
                  <div class="user-dp"><img class="img img-fluid" src="{{ asset('storage/images/dp-comment.jpg') }}" alt="User"></div>
                </div>
                <div class="comment-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="comment-foot">
                  <div class="btn-foot-comments">
                    <p class="m-0">
                      <button class="form-control btn btn-primary" type="button" name="reply">Reply</button>
                    </p>
                    <p class="m-0">
                      <button class="form-control btn btn-primary" type="button">Delete</button>
                    </p>
                  </div>
                </div>

                <!--  -->
                <div class="comment-cont p-3">
                  <div class="comment-header">
                    <p class="user-name m-0">Nanda Nisya</p>
                    <p class="date-post"><small>12 December 2016 at 01:54</small></p>
                    <div class="user-dp"><img class="img img-fluid" src="{{ asset('storage/images/dp-comment.jpg') }}" alt="User"></div>
                  </div>
                  <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="comment-foot">
                    <div class="btn-foot-comments">
                      <p class="m-0">
                        <button class="form-control btn btn-primary" type="button" name="reply">Reply</button>
                      </p>
                      <p class="m-0">
                        <button class="form-control btn btn-primary" type="button">Delete</button>
                      </p>
                    </div>
                  </div>
                </div>
                <!--  -->
              </div>

              <!--  -->
              <div class="comment-cont p-3">
                <div class="comment-header">
                  <p class="user-name m-0">Nanda Nisya</p>
                  <p class="date-post"><small>12 December 2016 at 01:54</small></p>
                  <div class="user-dp"><img class="img img-fluid" src="{{ asset('storage/images/dp-comment.jpg') }}" alt="User"></div>
                </div>
                <div class="comment-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="comment-foot">
                  <div class="btn-foot-comments">
                    <p class="m-0">
                      <button class="form-control btn btn-primary" type="button" name="reply">Reply</button>
                    </p>
                    <p class="m-0">
                      <button class="form-control btn btn-primary" type="button">Delete</button>
                    </p>
                  </div>
                </div>

                <!--  -->
                <div class="comment-cont p-3">
                  <div class="comment-header">
                    <p class="user-name m-0">Nanda Nisya</p>
                    <p class="date-post"><small>12 December 2016 at 01:54</small></p>
                    <div class="user-dp"><img class="img img-fluid" src="{{ asset('storage/images/dp-comment.jpg') }}" alt="User"></div>
                  </div>
                  <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="comment-foot">
                    <div class="btn-foot-comments">
                      <p class="m-0">
                        <button class="form-control btn btn-primary" type="button" name="reply">Reply</button>
                      </p>
                      <p class="m-0">
                        <button class="form-control btn btn-primary" type="button">Delete</button>
                      </p>
                    </div>
                  </div>
                </div>
                <!--  -->
              </div>
              <!--  -->
            </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>

<script src="{{ asset('js/pages/article.js') }}" charset="utf-8" defer></script>
@endsection
