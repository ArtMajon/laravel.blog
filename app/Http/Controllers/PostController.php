<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate('3');
        return view('posts.index', compact('posts'));
    }
    public function show($slug){
        $post = Post:: where('slug', $slug)->firstOrFail();
        $post->views++;
        $post->update();

    return view('posts.show', compact('post'));
    }
}
