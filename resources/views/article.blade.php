@extends('layouts.app')

@section('css')
<link href="{{ asset('css/pages/article.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="article">
  <div class="cover">
    <div class="cover-bg text-center">
      <p class="title h2 p-2">{{ ucwords('News Lorem ipsum dolor sit amet') }}</p>
      <div class="img-container p-2">
        <img class="img img-fluid" src="{{ asset('storage/images/dp.jpg') }}" alt="">
        <span class="px-2"><a class="a-link-white" href="#">Admin KSL</a></span>
      </div>
      <p class="p-2"><small>Tuesday, August 14, 2018</small></p>
    </div>
  </div>
  @if(Request::segment(1) === 'lessons')
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li class="chevron"><i class="fas fa-chevron-right"></i></li>
      <li><a href="{{ url('lessons') }}">Lessons</a></li>
      <li class="chevron"><i class="fas fa-chevron-right"></i></li>
      <li><a href="{{ url('lessons/linux') }}">Linux</a></li>
      <li class="chevron"><i class="fas fa-chevron-right"></i></li>
      <li><a href="{{ url('lessons/linux#D') }}">Dummy Article</a></li>
    </ul>
  </nav>
  @endif
  <div class="sosmed-icon">
    <span><a href="#"><i class="fab fa-facebook"></i></a></span>
    <span><a href="#"><i class="fab fa-twitter"></i></a></span>
    <span><a href="#"><i class="fab fa-youtube"></i></a></span>
    <span><a href="#"><i class="fab fa-instagram"></i></a></span>
    <span><a href="#"><i class="fab fa-google-plus"></i></a></span>
  </div>
  <div class="start-scroll"></div>
  <div class="article pt-4 m-5">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <article class="text-justify">
          <p class="headline">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </article>
        <div class="next-prev border py-3 m-0 row">
          <div class="col-md-6 text-left">
            <div class="">
              <strong class="">Previous Article</strong>
              <a class="a-link" href="#">
                <p class="m-0">Lorem Ipsum Dolor</p>
              </a>
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="">
              <strong class="">Next Article</strong>
              <a class="a-link" href="#">
                <p class="m-0">Lorem Ipsum Dolor Sit Amet</p>
              </a>
            </div>
          </div>
        </div>
        <hr>
        <div class="tags text-justify">
          <p class="h3 m-2">Tags</p>
          @for($i = 0; $i < 10; $i++)
            <span class="py-1 px-4 m-2"># Tags {{$i+1}}</span>
          @endfor
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
