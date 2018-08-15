@extends('admin.layouts.app')

@section('content')
<div class="flash-message"></div>
<div class="container-narrow">
       <h2>Create Manual Tags</h2>
       <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary btn-xs add-btn-modal">Add New Tags</button>

         <div class="card my-4">
             <div class="card-header"></div>
             <div class="card-body table-responsive-md tags-table card-body-table">
               <!-- Table-to-load-the-data Part -->
               <div class="row">
                 <div class="col-md-8">
                   {{ $data['tags']->links() }}
                 </div>
                 <div class="col-md-4 text-right pr-5">
                   <div class="row search-box-container position-relative">
                     <div class="col-md-10 p-0">
                       <div class="form-group">
                         <input class="form-control search-box" type="text" name="search-box" placeholder="Search Here..."><!--
                        --></div><!--
                     --></div><!--
                     --><div class="col-md-2 p-0"><!--
                     --><div class="form-group"><!--
                     --><button class="btn btn-primary search-box-btn m-0" type="button" name="button"><i class="fas fa-search"></i></button>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <table class="table">
                   <thead>
                       <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Name</th>
                           <th scope="col">Desc</th>
                           <th scope="col">Name EN</th>
                           <th scope="col">Desc EN</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Updated At</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody id="tags-list" name="tags-list">
                       @foreach ($data['tags'] as $tag)
                       <tr id="tags{{$tag->id}}">
                           <td>{{$tag->id}}</td>
                           <td class="td-name">{{$tag->name}}</td>
                           <td class="td-desc">{{$tag->desc}}</td>
                           <td class="td-name_en">{{$tag->name_en}}</td>
                           <td class="td-desc_en">{{$tag->desc_en}}</td>
                           <td>{{$tag->created_at}}</td>
                           <td>{{$tag->updated_at}}</td>
                           <td>
                               <button class="btn btn-warning btn-xs btn-detail open-modal upd-data-btn" value="{{$tag->id}}">Edit</button>
                               <button class="btn btn-danger btn-xs btn-delete delete-task del-data-btn" value="{{$tag->id}}">Delete</button>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
               <!-- End of Table-to-load-the-data Part -->
               <!-- Modal -->
               <div class="modal fade formModal" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="formModalLabel">Add New Tags</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form>
                         <div class="form-group">
                             <label for="tag-name" class="col-form-label">Name:</label>
                           <input type="text" class="form-control" id="tag-name">
                         </div>
                         <div class="form-group">
                           <label for="tag-desc" class="col-form-label">Desc:</label>
                           <textarea class="form-control" id="tag-desc" rows="4">
                           </textarea>
                         </div>
                         <div class="form-group">
                           <label for="tag-name_en" class="col-form-label">Name EN:</label>
                           <input type="text" class="form-control" id="tag-name_en">
                         </div>
                         <div class="form-group">
                           <label for="tag-desc_en" class="col-form-label">Desc EN:</label>
                           <textarea class="form-control" id="tag-desc_en" rows="4">
                             </textarea>
                         </div>
                         <div class="form-group">
                           <input type="hidden" class="form-control" id="tag-id" name="tag-id">
                         </div>
                       </form>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary add-data-btn btn-gg">Add Now</button>
                     </div>
                   </div>
                 </div>
                </div>
               <!-- End of Modal -->
             </div>
         </div>
       </div>
       <meta name="page" content="tags">
@endsection
