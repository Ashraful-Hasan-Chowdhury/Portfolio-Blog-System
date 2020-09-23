<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\tag;
class TagController extends Controller
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
        $tags=Tag::all();
        return view('admin.tags.show',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.tag');
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
        'tname' => 'required|max:255|unique:tags',
        'tslug' => 'required|max:255',
        ]);
        $tag = new Tag;
        $tag->tname = $request->tname;
        $tag->tslug = $request->tslug;
        $tag->save();
        $notification = array(
        	'message' => 'Tag Saved Successfully!',
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
        $tag = Tag::findorfail($id);
        return view('admin.tags.edit',compact('tag'));
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
        'tname' => 'required|max:255',
        'tslug' => 'required|max:255',
        ]);
        $tag =Tag::findorfail($id);
        $tag->tname = $request->tname;
        $tag->tslug = $request->tslug;
        $tag->save();
        $notification = array(
        	'message' => 'Tag Saved Successfully!',
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
        Tag::findorfail($id)->delete();
        $notification = array(
        	'message' => 'Tag Deleted!',
        	'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
