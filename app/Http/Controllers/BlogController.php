<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Comment;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() 
    {
    	$post  = Post::paginate(8);

        return view('frontend.blog', ['post' => $post]);
    }

    public function showAll()
    {
        $post = Post::all();
        return view('frontend.blog', ['post' => $post]);
    }

    public function detail($slug)
    {
        $post = Tag::find($slug);
    	$post = Post::whereSlug($slug)->first();
        return view('frontend.detail')->withPost($post);

    }

    public function postComment(Request $request)
    {
        try {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'content' => 'required'
            ]);

            $name = $request['name'];
            $email = $request['email'];
            $content = $request['content'];
            $post_id = $request['post_id'];

            $comment = new Comment;
            $comment->name = $name;
            $comment->email = $email;
            $comment->content = $content;
            $comment->approved = false;
            $comment->post_id = $post_id;
            $comment->save();

            return redirect()->back()->with('message', 'comment waiting for approved');
            
        } catch (Exception $e) {
            
        }
    }

}
