<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.posts',[
            'title'=> "All Posts",
            'active'=> 'posts',
            'posts'=> Post::latest()->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'active'=> 'posts',
            'categories'=> Category::all(),
            'users'=> User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image'=> 'image|file',
            'deskripsi'=> 'required',
            'user_id'=> 'required'
        ]);
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Post::create($validatedData);
        return redirect('/posts')->with('success', 'Post baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.post', [
            "title" => 'Single Post',
            'active'=> 'posts',
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/posts')->with('success', 'Post has been deleted.');
    }
}
