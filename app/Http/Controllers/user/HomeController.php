<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\Post;
use App\Model\user\Category;
use App\Model\user\Tag;
class HomeController extends Controller
{
    public function index(){
        $posts = Post::where('status',1)->orderBy('created_at','desc')->paginate(3);
        $slider = Post::where('status',1)->orderBy('created_at','desc')->take(2)->get();
        $mostRead = Post::where('status',1)->orderBy('counter','desc')->take(5)->get();
        $categoryhome = Category::all();
        $isHome = true;
        return view('user.home',compact('isHome','posts','slider','categoryhome','mostRead'));
    }
    public function search(Request $request){
        $searchQuery=$request->searchQuery;
        $posts = Post::where('title', 'like', '%' . $searchQuery . '%')
                ->orWhere('subtitle', 'like', '%' . $searchQuery . '%')
                ->orWhere('body', 'like', '%' . $searchQuery . '%')
                ->paginate(3);
                $slider = Post::where('status',1)->orderBy('created_at','desc')->take(2)->get();
                $mostRead = Post::where('status',1)->orderBy('counter','desc')->take(5)->get();
                $categoryhome = Category::all();
                $isHome = true;
                return view('user.home',compact('isHome','posts','slider','categoryhome','mostRead'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts();
        $isHome = true;
        $categoryhome= Category::all();
        $mostRead = Post::where('status',1)->orderBy('counter','desc')->take(5)->get();
        return view('user.home',compact('isHome','posts','categoryhome','mostRead'));
    }

    public function category(Category $category){
        $posts = $category->posts();
        $isHome = true;
        $categoryhome = Category::all();
        $mostRead = Post::where('status',1)->orderBy('counter','desc')->take(5)->get();
        return view('user.home',compact('isHome','posts','categoryhome','mostRead'));
    }

    public function categoryhome(Category $categoryhome){
        $posts = $categoryhome->posts();
        $isHome = false;
        $slider = Post::where('status',1)->orderBy('created_at','desc')->take(2)->get();
        $categoryhome = Category::all();
        $isHome = true;
        $mostRead = Post::where('status',1)->orderBy('counter','asc')->take(5)->get();
        return view('user.home',compact('isHome','posts','slider','categoryhome','mostRead'));
    }
}
