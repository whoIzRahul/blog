<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('post/{post:slug}',[PostController::class,'show'])->name('post');

// To load view of categories without creating categories file
// Route::get('/categories/{category:slug}',function(Category $category){
//     return view('category',['category'=> $category]);
// });
// Or
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts',['posts' => $category->posts , 'categories'=> Category::all(), 'currentCategory' => $category]);
})->name('category');

Route::get('/authors/{author:username}',function(User $author){
    return view('posts',['posts' => $author->posts]);
})->name('author');

// Route::get('/category/{category:slug}',function(Category $category){
//     return view('category',['category'=> $category]);
// });