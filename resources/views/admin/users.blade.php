@extends('admin.layouts.app', ['pages' => $data['pages']])

@section('content')
<div class="flash-message"></div>
<div class="container-narrow">
        <div class="content-head p-4">
          <p class="h2">
            <span class="prime-col">Users</span> <span class="second-col">Data</span>
          </p>
        </div>

         <div class="card m-4">
             <!-- <div class="card-header text-center"><strong>Users</strong></div> -->
             <div class="card-body table-responsive-md users-table card-body-table">
               <!-- Table-to-load-the-data Part -->
               <div class="row">
                 <div class="col-md-4">
                   {{ $data['users']->links() }}
                 </div>
                 <div class="col-md-4 text-center">
                   <button type="button" data-toggle="modal" data-target="#formModal" class="btn btn-primary btn-xs add-btn-modal">Add New User</button>
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
                           <th scope="col">Username</th>
                           <th scope="col">Email</th>
                           <th scope="col">password</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Updated At</th>
                           <th scope="col">Role</th>
                           <th scope="col">Action</th>
                       </tr>
                   </thead>
                   <tbody id="users-list" name="users-list">
                       @foreach ($data['users'] as $user)
                       <tr id="user{{$user->id}}">
                           <td>{{$user->id}}</td>
                           <td class="td-name">{{$user->name}}</td>
                           <td class="td-username">{{$user->username}}</td>
                           <td class="td-email">{!!KSLLessMore::showLessMore($user->email, 15)!!}</td>
                           <!-- <td>{{str_limit($user->password, 10)}}</td> -->
                           <td>{!!KSLLessMore::showLessMore($user->password, 15)!!}</td>
                           <td>{{$user->created_at}}</td>
                           <td>{{$user->updated_at}}</td>
                           <td class="td-role" val="{{$user->user_roles->id}}">{{$user->user_roles->name}}</td>
                           <td>
                               <button class="btn btn-warning btn-xs btn-detail open-modal upd-data-btn" value="{{$user->id}}">Edit</button>
                               <button class="btn btn-danger btn-xs btn-delete delete-task del-data-btn" value="{{$user->id}}">Delete</button>
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
                       <h5 class="modal-title" id="formModalLabel">Add New User</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form>
                         <div class="form-group">
                             <label for="user-name" class="col-form-label">Name:</label>
                           <input type="text" class="form-control" id="user-name">
                         </div>
                         <div class="form-group">
                           <label for="user-username" class="col-form-label">Username:</label>
                           <input type="text" class="form-control" id="user-username">
                         </div>
                         <div class="form-group">
                             <label for="user-email" class="col-form-label">Email:</label>
                           <input type="email" class="form-control" id="user-email">
                         </div>
                         <div class="form-group">
                           <label for="user-password" class="col-form-label">Password:</label>
                           <input type="password" class="form-control" id="user-password">
                         </div>
                         <div class="form-group">
                           <label for="user-roles" class="col-form-label">Role:</label>
                           <select class="user-roles" id="user-roles" name="user-roles">
                             @foreach($data['roles'] as $role)
                             <option value="{{$role->id}}">{{$role->name}}</option>
                             @endforeach
                             <!--
                             <option value="admin">Admin</option>
                             <option value="user">User</option> -->
                           </select>
                         </div>
                         <div class="form-group">
                           <input type="hidden" class="form-control" id="user-id" name="user-id">
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
       <meta name="page" content="users">
@endsection
