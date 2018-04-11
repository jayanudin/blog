<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;

class DashboardController extends Controller
{
    public function index() {

    	$article = Post::count();
    	$category = Category::count();
    	$tag = Tag::count();
    	$comment = Comment::count();

    	return view('dashboard.dashboard', ['article' => $article, 'category' => $category, 'tag' => $tag, 'comment' => $comment]);
    }

    public function login()
    {
        return view('auth.login');
    }
}
