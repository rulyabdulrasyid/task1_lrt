@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <small >
                    {{$post->created_at}} {{$post->author->name}}
                    {{ $post->category->name }}
                </small>
                
                {{-- <div class="mb-3 mt-3">
                    <a href="/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all posts</a>
                    
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                    <form action="/posts/{{ $post->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                    </form>
                </div>        --}}

                

                @if ($post->image)
                    <div style="max-height:350px; overflow:hidden mt-3">
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid"/>         
                    </div>       
                @else
                   <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3"/>
                @endif

                <article class="my-3 fs-5">
                 {!! $post->deskripsi !!}
                </article>

            </div>
        </div>
    </div>
@endsection