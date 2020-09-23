<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.show',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'cname' => 'required|max:255|unique:categories',
        'cslug' => 'required|max:255',
        ]);
        $category = new Category;
        $category->cname = $request->cname;
        $category->cslug = $request->cslug;
        $category->save();
        $notification = array(
        	'message' => 'Category Saved Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
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
        $category = Category::findorfail($id);
        return view('admin.categories.edit',compact('category'));
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
        $validatedData = $request->validate([
        'cname' => 'required|max:255',
        'cslug' => 'required|max:255',
        ]);
        $category = Category::findorfail($id);
        $category->cname = $request->cname;
        $category->cslug = $request->cslug;
        $category->save();
        $notification = array(
        	'message' => 'Category Updated Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findorfail($id)->delete();
        $notification = array(
        	'message' => 'Category Deleted!',
        	'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
