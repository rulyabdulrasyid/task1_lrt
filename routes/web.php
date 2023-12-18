<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home',[
        'title' => 'Home',
        'active'=> 'home'
    ]);
});


// Route::get("/posts", [PostController::class,'index']);
// Route::get("posts/{post:id}", [PostController::class, 'show']);
Route::resource('/posts', PostController::class);
