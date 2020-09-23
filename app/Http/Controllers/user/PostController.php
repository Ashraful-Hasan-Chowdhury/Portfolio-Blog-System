<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\Post;
use App\Model\user\Category;
class PostController extends Controller
{
    public function post(Post $post){
        $isHome = false;
        $categoryhome = Category::all();
        $COUNTER=Post::findorfail($post->id)->increment('counter');
        $mostRead = Post::where('status',1)->orderBy('counter','desc')->take(5)->get();
        return view('user.posts.show',compact('isHome','post','categoryhome','mostRead'));
    }
}
