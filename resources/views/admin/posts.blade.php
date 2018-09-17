@extends('admin.layouts.app', ['pages' => $data['pages']])

@section('content')
<div class="flash-message"></div>
<a href="#app"></a>
<section class="container-narrow posts">
        <div class="content-head p-4">
          <p class="h2">
            <span class="prime-col">Posts</span> <span class="second-col">Articles</span>
          </p>
        </div>

         <div class="card m-4 position-relative">
           <div class="card-body table-responsive-md card-body-table">
             <div class="container mb-3">
               <div class="btn-add-art-container text-right">
                 <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary btn-xs add-btn-modal add-article">Add New Article <i class="fas fa-plus"></i></button>
               </div>
               <div class="position-absolute div-search">
                 <div class="search-box-container position-relative">
                   <div class="p-0">
                       <input class="form-control search-box" type="text" name="search-box" placeholder="Search Here..."><!--
                  --></div><!--
                 --><div class="p-0"><!--
                   --><button class="btn btn-primary search-box-btn m-0" type="button" name="button"><i class="fas fa-search"></i></button>
                   </div>
                 </div>
               </div>
             </div>
             <div class="tabelnya">
               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Title</th>
                           <th scope="col">Content</th>
                           <th scope="col">Author</th>
                           <th scope="col">Likes</th>
                           <th scope="col">Views</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Updated At</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody id="posts-list" name="posts-list">
                      @foreach($data['posts'] as $posts)
                       <tr>
                           <td class="td-id">{{ $posts->id }}</td>
                           <td class="td-title-en">{!! KSLLessMore::showLessMore($posts->title_en, 30) !!}</td>
                           <td class="td-content-en">{!! KSLLessMore::showLessMore($posts->content_en, 0) !!}</td>
                           <td>{{ $posts->users->name }}</td>
                           <td>{{ $posts->likes }}</td>
                           <td>{{ $posts->views }}</td>
                           <td>{{ $posts->created_at }}</td>
                           <td>{{ $posts->updated_at }}</td>
                           <td class="d-none">
                             <div class="td-title">{{ $posts->title }}</div>
                             <div class="td-content">{!! $posts->content !!}</div>
                             <div class="td-cat" val="@if($posts->categories){{ $posts->categories->id }}@endif">@if($posts->categories){{ $posts->categories->name }}@endif</div>
                             <div class="td-sub-cat" val="@if($posts->sub_categories){{ $posts->sub_categories->id }}@endif">@if($posts->sub_categories){{ $posts->sub_categories->name }}@endif</div>
                             <div class="td-sub-sub-cat" val="@if($posts->sub_sub_categories){{ $posts->sub_sub_categories->id }}@endif">@if($posts->sub_sub_categories){{ $posts->sub_sub_categories->name }}@endif</div>
                             <div class="td-tags">
                               @foreach($posts->tag_posts as $tag_posts)
                               <span idval="{{$tag_posts->id}}" val="{{$tag_posts->id_tags}}">{{$tag_posts->tags->name}}</span>
                               @endforeach
                             </div>
                             <div class="td-pages" val="{{ $posts->pages->id }}">{{ $posts->pages->name_en }}</div>
                           </td>
                           <td class="td-action">
                               <button class="btn @if($posts->id_post_status == 1)  btn-success @elseif($posts->id_post_status == 2)  btn-warning  @endif btn-post-status" val="{{ $posts->id_post_status }}"><i class="fas fa-bullhorn"></i></button>
                               <button class="btn btn-secondary posts-btn-edit" value="" data-toggle="modal" data-target="#formModal"><i class="fas fa-edit"></i></button>
                               <button class="btn btn-danger btn-remove-post" value=""><i class="fas fa-trash"></i></button>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
               {{ $data['posts']->links() }}
             </div>
           </div>
         </div>
         <!-- Modal -->
         <div class="modal fade formModal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-full" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="formModalLabel">Add New Post</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <form>
                   <div class="form-group">
                       <label for="posts-title">Title (Indonesia)</label>
                       <input id="posts-title" class="form-control" type="text">
                   </div>
                   <div class="form-group">
                       <label for="posts-title-en">Title (English)</label>
                       <input id="posts-title-en" class="form-control" type="text">
                   </div>
                   <div class="form-group">
                     <label for="posts-content">Content (Indonesia)</label>
                     <textarea id="posts-content" class="form-control" rows="8" cols="80"></textarea>
                   </div>
                   <div class="form-group">
                       <label for="posts-content-en">Content (English)</label>
                       <textarea id="posts-content-en" class="form-control" rows="8" cols="80"></textarea>
                   </div>
                   <div class="form-group">
                     <label for="posts-tags">Tags</label>
                     <div id="posts-tags-result-selected">

                     </div>
                     <div id="posts-tags-result-selected-hid" class="d-none">

                     </div>
                     <input id="posts-tags" class="form-control" type="text">
                     <div id="posts-tags-result"></div>
                   </div>
                   <div class="form-group">
                     <input type="hidden" class="form-control" id="posts-id" name="posts-id">
                     <input type="hidden" class="form-control" id="posts-status" val="">
                   </div>
                   <div class="form-group">
                     <label for="posts-pages">Posting Untuk</label>
                     <select id="posts-pages" class="form-control">
                       <option value="2">News</option>
                       <option value="3">Lessons</option>
                     </select>
                   </div>
                   <div class="form-group sel-cat">
                         <div class="row">
                           <div class="col-md-4">
                             <div class="position-relative">
                               <label for="posts-cat">Categories</label>
                               <input id="posts-cat" class="form-control" type="text" val="">
                               <div id="posts-cat-result"></div>
                             </div>
                           </div>
                           <div class="col-md-4">
                             <div class="position-relative">
                               <label for="posts-sub-cat">Sub Categories</label>
                               <input id="posts-sub-cat" class="form-control" type="text" val="" disabled>
                               <div id="posts-sub-cat-result"></div>
                             </div>
                           </div>
                           <div class="col-md-4">
                             <div class="position-relative">
                               <label for="posts-sub-sub-cat">Sub Sub Categories</label>
                               <input id="posts-sub-sub-cat" class="form-control" type="text" val="" disabled>
                               <div id="posts-sub-sub-cat-result"></div>
                             </div>
                           </div>
                         </div>
                   </div>
                 </form>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-warning posts-save-to-draft-btn" act="2">Save to Draft</button>
                 <button type="button" class="btn btn-primary posts-publish-btn" act="1">Publish Now</button>
               </div>
             </div>
           </div>
          </div>
         <!-- End of Modal -->
 </section>
 <meta name="page" content="posts">
 <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
 @section('js')

 @endsection
@endsection
