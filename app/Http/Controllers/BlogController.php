<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() 
    {
    	$post  = Post::all();

        return view('frontend.blog', ['post' => $post]);
    }

    public function detail($slug)
    {
    	$post = Post::whereSlug($slug)->first();
        return view('frontend.detail', compact('post'));
    }
}
