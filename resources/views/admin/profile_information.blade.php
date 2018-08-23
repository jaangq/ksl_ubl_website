@extends('admin.layouts.app', ['pages' => $data['pages']])

@section('content')
<div class="flash-message"></div>
<a href="#app"></a>
<div class="container-narrow profile_information_container">
        <div class="content-head p-4">
          <p class="h2">
            <span class="prime-col">Profile</span> <span class="second-col">Information</span>
          </p>
        </div>

         <div class="card m-4">
           <div class="card-body table-responsive-md card-body-table">
             <nav>
               <ul>
                 @foreach($data['prefix'] as $prefix)
                 <li val="{{ $prefix->prefix }}">{{ ucwords($prefix->prefix) }}</li>
                 @endforeach
               </ul>
             </nav>
             <div id="container-form" class="container">
               <!-- di container bawah append inner nya -->

             </div>
             <div class="form-group mt-4 text-center">
               <button id="btn-reset" class="btn btn-secondary mx-2" type="button" name="button"><i class="fas fa-undo"></i> Reset</button>
               <button id="btn-save" class="btn btn-primary" type="button" name="button"><i class="fas fa-save"></i> Save</button>
             </div>
           </div>
         </div>

         <div class="res-profile-info">
           <div class="d-none" id="contact-res">
             @foreach($data['contact'] as $contact)
             <div class="form-group">
               <label for="pi-{{ $contact->id }}">{{ ucwords($contact->label_en) }}</label>
               <input class="form-control" type="text" id="pi-{{ $contact->id }}" value="{{ $contact->content_en }}">
             </div>
             @endforeach
           </div>
           <div class="d-none" id="address-res">
             @foreach($data['address'] as $address)
             <div class="form-group">
               <label for="pi-{{ $address->id }}">{{ ucwords($address->label_en) }}</label>
               <textarea class="form-control" type="text" id="pi-{{ $address->id }}" rows="8">{{ $address->content_en }}</textarea>
             </div>
             @endforeach
           </div>
           <div class="d-none" id="sosmed-res">
             @foreach($data['sosmed'] as $sosmed)
             <div class="form-group">
               <label for="pi-{{ $sosmed->id }}">{{ ucwords($sosmed->label_en) }}</label>
               <input class="form-control" type="text" id="pi-{{ $sosmed->id }}" value="{{ $sosmed->content_en }}">
             </div>
             @endforeach
           </div>
         </div>
 </div>
 <meta name="page" content="profile-information">
 <script src="{{ asset('js/admin/profile_information.js') }}" defer></script>
@endsection
