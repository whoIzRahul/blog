<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(){
        // Without using scope filter
        // $posts = Post::latest();
        // if(null != request('search')){
        //     $posts = $posts->where("title","like","%".request('search')."%")
        //     ->orWhere("body","like","%".request('search')."%");
        // }
        // return view('posts',
        //  ['posts' => $posts->get(),
        //  'categories' => Category::all()]);

        // Search implemented using scope filter
        return view('posts.index',
        ['posts' => Post::latest()->filter(request(['search','category','author']))->simplePaginate(9)->withQueryString()]
    );
    }


    public function show(Post $post){
        return view('posts.show',
        ['post' => $post ]);
    }

}
