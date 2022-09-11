<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts',['posts' => Post::latest()->get()]);
});

Route::get('post/{post:slug}',function(Post $post){ // Post::where('slug',$post)->findOrFail()

    return view('post',
    ['post' => $post ]
);
});

// To load view of categories without creating categories file
// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('category',['category'=> $category]);
// });
// Or
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts',['posts' => $category->posts]);
});

Route::get('/authors/{author:username}',function(User $author){
    return view('posts',['posts' => $author->posts]);
});

Route::get('/category/{category:slug}',function(Category $category){
    return view('category',['category'=> $category]);
});