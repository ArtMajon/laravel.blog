<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::with('category','tags')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags= Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required',
           'description'=>'required',
           'content'=>'required',
           'category_id'=>'required|integer',
           'thumbnail'=>'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/$folder", 'public');
        }
        $post = Post::create($data);
        $post->tags()->sync($request->tags);
//        Post::create($request->all());
//        $request->session()->flash('success', 'CATEGORY ADDED');
        return redirect()->route('posts.index')->with('success','Post ADDED');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $tags= Tag::pluck('title', 'id')->all();



        return view('admin.posts.edit', compact('categories', 'tags', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'content'=>'required',
            'category_id'=>'required|integer',
            'thumbnail'=>'image|nullable',
        ]);

        $posts = Post::find($id);
        $data = $request->all();

        if ($request->hasFile('thumbnail')){
            Storage::disk('public')->delete($posts->thumbnail);
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/$folder", 'public');
        }

        $posts->update($data);
        $posts->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'POST UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->tags()->sync([]);
        Storage::disk('public')->delete($posts->thumbnail);
        $posts->delete();
        return redirect()->route('posts.index')->with('success', 'Удалено');
    }
}
