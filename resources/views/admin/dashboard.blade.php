@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
      <div class="col-md-4">
            <div class="card">
                <div class="card-header">Top Views Articles</div>

                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-header">Top Shared Articles</div>

            <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-header">Top Comments Articles</div>

            <div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
        </div>
      </div>
    </div>
</div>
<meta name="page" content="dashboard">
@endsection
