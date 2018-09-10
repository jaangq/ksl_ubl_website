@extends('admin.layouts.app', ['pages' => $data['pages']])

@section('content')
<div class="flash-message"></div>
<a href="#app"></a>
<div class="container-narrow pages">
        <div class="content-head p-4">
          <p class="h2">
            <span class="prime-col">Pages</span> <span class="second-col">{{ ucwords($data['page']) }}</span>
          </p>
        </div>
         <div class="card m-4 p-4">
           <div class="lang-div">
             <ul>
               <li class="border active" val="in">In</li>
               <li class="border" val="en">En</li>
             </ul>
           </div>
           <div id="card-body" class="card-body table-responsive-md card-body-table mb-5 p-4 border" val="in">
               <div id="el-in">
                 @foreach($data['home']->website_text as $website_text)
                   @if($website_text->prefix === 'editable')
                     <div class="form-group">
                       <label for="{{ str_slug($website_text->label) }}-in">{{ $website_text->label }}</label>
                       <textarea id="{{ str_slug($website_text->label) }}-in" val="{{ $website_text->id }}" colm="content" name="{{ str_slug($website_text->label) }}-in" >{{ $website_text->content }}</textarea>
                     </div>
                   @elseif($website_text->prefix === '')
                   <div class="form-group mb-5">
                     <label for="{{ str_slug($website_text->label) }}-in">{{ $website_text->label }}</label>
                     <input id="{{ str_slug($website_text->label) }}-in" val="{{ $website_text->id }}" colm="content" name="{{ str_slug($website_text->label) }}-in" class="form-control" type="text" value="{{ $website_text->content }}">
                   </div>
                   @endif
                 @endforeach
               </div>

               <div id="el-en">
                 @foreach($data['home']->website_text as $website_text)
                   @if($website_text->prefix === 'editable')
                     <div class="form-group">
                       <label for="{{ str_slug($website_text->label_en) }}-en">{{ $website_text->label_en }}</label>
                       <textarea id="{{ str_slug($website_text->label_en) }}-en" val="{{ $website_text->id }}" colm="content_en"  name="{{ str_slug($website_text->label_en) }}-en" >{{ $website_text->content_en }}</textarea>
                     </div>
                   @elseif($website_text->prefix === '')
                   <div class="form-group mb-5">
                     <label for="{{ str_slug($website_text->label_en) }}-en">{{ $website_text->label_en }}</label>
                     <input id="{{ str_slug($website_text->label_en) }}-en" val="{{ $website_text->id }}" colm="content_en" name="{{ str_slug($website_text->label_en) }}-en" class="form-control" type="text" value="{{ $website_text->content_en }}">
                   </div>
                   @endif
                 @endforeach
               </div>

               <div class="form-group text-right">
                 <button class="btn btn-primary mr-2 save" type="button"><i class="fas fa-save"></i>Save</button>
                 <button class="btn btn-secondary reset" type="button"><i class="fas fa-undo"></i>Reset</button>
               </div>
           </div>
         </div>
         <meta name="page" content="pages">
 </div>
 <script src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>
 <script src="{{ asset('js/admin/pages.js') }}" defer></script>
 @section('js')

 @endsection
@endsection
