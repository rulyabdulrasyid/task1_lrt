@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Posts</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/posts" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>    
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                        @endif
                        
                    @endforeach
                </select>
            </div>

            {{-- User --}}
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select class="form-select" name="user_id">
                    @foreach ($users as $user)
                        @if (old('user_id') == $user->id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>    
                        @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>    
                        @endif
                        
                    @endforeach
                </select>
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>

                <img class="img-preview img-fluid mb-3 col-sm-5">

                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Deskripsi--}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi') }}">
                <trix-editor input="deskripsi"></trix-editor>   
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault()
        })

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection