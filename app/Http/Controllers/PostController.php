<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Category;
use App\Tag;
use App\PostTag;
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

    public function loadTags()
    {
        $tag  = Tag::all();

        $json = json_encode($tag);

        echo $json;
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
            $user_id = $request['user_id'];

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = 'uploads/';
            $file = $file->move($path, $fileName);

            $userid = Auth::user()->id;
            
            $post = new Post;
            $post->title = $title;
            $post->image = $file;
            $post->content = $content;
            $post->slug = str_replace(' ', '-', strtolower($slug));
            $post->category_id = $category_id;
            $post->user_id = $userid;
            $post->save();

            $post->tags()->sync($request->tags, false);

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
        // $tags = Tag::all();
        // $tagslist = array();
        // foreach ($tags as $tag) {
        //     $tagslist[$tag->id] = $tag->name;
        // }
        // return view('post.edit', ['post' => $post, 'categories' => $categories, 'tagslist' => $tagslist]);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

          // return the view and pass in the var we previously created
        return view('post.edit')->withPost($post)->withCategories($categories)->withTags($tags2);
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
            $post->slug = str_replace(' ', '-', strtolower($slug));
            $post->category_id = $category_id;
            $post->save();

            $post->tags()->sync($request->tags, false);

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
            echo 'Fail Delete Article: ',  $e->getMessage(), "\n";
        }
    }
}
