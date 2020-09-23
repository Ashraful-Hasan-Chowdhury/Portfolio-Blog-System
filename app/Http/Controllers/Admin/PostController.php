<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;


class PostController extends Controller
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
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts.show', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.posts.post', compact('posts', 'categories', 'tags'));
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
            'title' => 'required|max:255',
            'subtitle' => 'required|max:100',
            'slug' => 'required|max:100',
            'body' => 'required',
            'image' => 'required'
        ]); 
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/FrontEnd/Banners/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $post = new Post;
        $post->image = $image_url;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->counter = 0;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        $notification = array(
            'message' => 'Post Saved Successfully!',
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
        $tags = Tag::all();
        $categories = Category::all();
        $post = Post::with('tags', 'categories')->findorfail($id);
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
            'title' => 'required|max:255',
            'subtitle' => 'required|max:100',
            'slug' => 'required|max:100',
            'body' => 'required',

        ]);
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/FrontEnd/Banners/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            unlink($request->old_photo);
        } else {
            $image_url = $request->old_photo;
        }
        $post = Post::findorfail($id);
        $post->image = $image_url;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        $notification = array(
            'message' => 'Post Saved Successfully!',
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
        $post = Post::findorfail($id);
        $image = $post->image;
        if(!$image == null){
        unlink($image);
        }
        $post->delete();

        $notification = array(
            'message' => 'Post Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}
