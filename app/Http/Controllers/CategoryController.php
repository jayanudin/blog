<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category  = Category::all();

        return view('category.category', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
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
                'title' => 'required'
            ]);

            $title  = $request['title'];

            $category = new Category;
            $category->title = $title;
            $category->save();

            return redirect('category')->with('message', 'success create category');

        } catch (Exception $e) {

            echo 'Fail: ',  $e->getMessage(), "\n";
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
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
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
                'title' => 'required'
            ]);

            $title  = $request['title'];

            $category = Category::find($id);

            $category->title = $title;
            $category->save();

            return redirect('category')->with('message', 'success update category');

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

            $category  = Category::find($id);
            $category->delete();

            return redirect('category')->with('message', 'success delete category');

        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('category')->with('error', 'filed delete category');
        }
    }
}
