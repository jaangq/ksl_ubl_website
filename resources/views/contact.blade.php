@extends('layouts.app')
@section('js-head')
@endsection

@section('css')
<link href="{{ asset('css/pages/contact.css') }}" rel="stylesheet">
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('content')
<div class="contact">
  <div class="cover">
    Contact Us
  </div>
  <section class="m-2">
    <div class="row p-5 m-0 border">
      <div class="col-md-6 left">
        <p class="h2 text-left">Do Not Hesitate To Contact Us, We Are Happy To Receive Messages From You</p>
        <hr>
        <div class="my-4">
          <div class="form-group">
            <label for="name">Your Name (Required)</label>
            <input id="name" class="form-control" type="text" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="email">Your Email (Required)</label>
            <input id="email" class="form-control" type="email" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="nohp">Your Name Phone Number</label>
            <input id="nohp" class="form-control" type="text" placeholder="">
          </div>
          <div class="form-group">
            <label for="message">Your Message (Required)</label>
            <textarea id="message" class="form-control" cols="30" rows="10" placeholder="" required></textarea>
          </div>
          <button class="btn btn-primary" type="button">Send Message</button>
          <button class="btn btn-secondary" type="reset">Reset Form</button>
        </div>
      </div>
      <div class="col-md-6 right">
        <p class="h2 text-right">And If You Need Something, Just Contact Us Through The Contact Information Below</p>
        <div class="contact-info p-3 mt-4 border">
          <div class="email-info">
            <p class="m-0">Email</p>
            <p>admin@ksl-ubl.com</p>
          </div>
          <div class="phone-info">
            <p class="m-0">Phone Number</p>
            <p>+6281299922231</p>
          </div>
          <div class="address-info">
            <p class="m-0">Address</p>
            <p>Jl. Ciledug Raya, Petukangan Utara, Jakarta Selatan, 12260. DKI Jakarta, Indonesia.</p>
          </div>
        </div>
        <div class="map-cont">
          <div id='map'></div>
          <div id='menu'>
            <span>
              <input id='basic' type='radio' name='rtoggle' value='basic' checked='checked'>
              <label for='basic'>Basic</label>
            </span>
            <span>
              <input id='streets' type='radio' name='rtoggle' value='streets'>
              <label for='streets'>Streets</label>
            </span>
            <span>
              <input id='bright' type='radio' name='rtoggle' value='bright'>
              <label for='bright'>Bright</label>
            </span>
            <span>
              <input id='light' type='radio' name='rtoggle' value='light'>
              <label for='light'>Light</label>
            </span>
            <span>
              <input id='dark' type='radio' name='rtoggle' value='dark'>
              <label for='dark'>Dark</label>
            </span>
            <span>
              <input id='satellite' type='radio' name='rtoggle' value='satellite'>
              <label for='satellite'>Satellite</label>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('js')
<script src="{{ asset('js/pages/contact.js') }}" charset="utf-8" defer></script>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
<script src='https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js'></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
@endsection
