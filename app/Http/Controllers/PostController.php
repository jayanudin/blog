<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post  = Post::all();

        return view('post.post', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->all();
        return view('post.add')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'title' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'content' => 'required',
                'slug' => 'required',
                'category_id' => 'required'
            ]);

            $title  = $request['title'];
            $content = $request['content'];
            $slug = $request['slug'];
            $category_id = $request['category_id'];

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = 'uploads/';
            $file = $file->move($path, $fileName);

            
            
            $post = new Post;
            $post->title = $title;
            $post->image = $file;
            $post->content = $content;
            $post->slug = str_replace(' ', '-', $slug);
            $post->category_id = $category_id;
            $post->save();

            return redirect('post')->with('message', 'success create article');


        } catch (Exception $e) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        $categories = Category::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $this->validate($request, [
                'title' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'content' => 'required',
                'slug' => 'required',
                'category_id' => 'required'
            ]);

            $title  = $request['title'];
            $content = $request['content'];
            $slug = $request['slug'];
            $category_id = $request['category_id'];

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = 'uploads/';
            $file = $file->move($path, $fileName);

            
            
            $post = Post::find($id);
            $post->title = $title;
            $post->image = $file;
            $post->content = $content;
            $post->slug = str_replace(' ', '-', $slug);
            $post->category_id = $category_id;
            $post->save();

            return redirect('post')->with('message', 'success update article');


        } catch (Exception $e) {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();

            return redirect('post')->with('message', 'success delete article');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}
