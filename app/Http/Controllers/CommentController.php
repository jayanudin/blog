<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment  = Comment::all();

        return view('comment.comment', ['comment' => $comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $comment = Comment::find($id);
        return view('comment.edit', ['comment' => $comment]);
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
                'name' => 'required',
                'email' => 'required|email',
                'content' => 'required',
                'approved' => 'required'
            ]);

            $name  = $request['name'];
            $email = $request['email'];
            $content = $request['content'];
            $approved = $request['approved'];

            $comment = Comment::find($id);

            $comment->name = $name;
            $comment->email = $email;
            $comment->content = $content;
            $comment->approved = $approved;
            $comment->save();

            return redirect('comment')->with('message', 'success update comment');

        } catch (Exception $e) {

            echo 'Fail: ',  $e->getMessage(), "\n";
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
            $comment = Comment::find($id);
            $comment->delete();
            return redirect('comment')->with('message', 'success delete comment');

        } catch (Exception $e) {
            
        }
    }
}
