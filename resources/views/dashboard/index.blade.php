@extends('layouts.main')

@section('container')

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom bg-success rounded">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name}}</h1>
    </div>  

    @if (session('success'))
    <div class="alert alert-success col-lg-9" role="alert">
      {{ session('success') }}
    </div>    
  @endif
  
  @include('dashboard.partials.sidebar')

  {{-- <div class="table-responsive col-lg-9">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      
    </table> --}}
  </div>
    
@endsection


