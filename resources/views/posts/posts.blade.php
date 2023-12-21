@extends('layouts.main')

@section('container')
    {{-- <h1 class="mb-3 text-center">POSTS</h1> --}}

    @if (session('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>    
    @endif

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>


    @if($posts->count())
    <div class="card mb-3">

        @if ($posts[0]->image)
            <div style="max-height:350px; overflow:hidden">
                <img src="{{ asset('storage/'. $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid"/>         
            </div>       
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif

        
        <div class="card-body text-center">
           <h3 class="card-title"><a href="/posts/{{ $posts[0]->id }}" class="text-dark text-decoration-none">{{$posts[0]->title}}</a></h3>
            <p>
                <small class="text-muted">
                    {{$posts[0]->created_at}} {{$posts[0]->author->name}}
                </small>
            </p>
            
            <a href="/post"></a>
            <a href="/posts/{{ $posts[0]->id }}" class="text-decoration-none btn btn-primary">Read More..</a>
        </div>
    </div>
    

    <div class="container mb-5">
        <div class="row">
            @foreach($posts->skip(1) as $post)    
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">{{ $post->category->name }}</div>

                    @if ($post->image)
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid"/>            
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    @endif

                    
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                        <p>
                            <small class="text-muted">
                                {{$post->created_at}} {{$post->author->name}} 
                            </small>
                        </p>
                      
                      <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read more...</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
    <p class="text-center fs-4">No post found</p>
    @endif

    <div>
        {{ $posts->links() }}
    </div>
@endsection
    
