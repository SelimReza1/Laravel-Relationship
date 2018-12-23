<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->save();
        $post->tags()->sync($request->tags, false);
        return redirect('/home');
    }

    public function category($id){
        $categories = Category::find($id);
        return view('category', compact('categories'));
    }
    public function tag($id){
        $tag = Tag::find($id);
        return view('tag', compact('tag'));
    }
}
