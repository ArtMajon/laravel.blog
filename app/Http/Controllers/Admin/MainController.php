<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

class MainController extends Controller
{
    public function index(){

//        \App\Models\Tag::create([
//            'title'=>'HELLOOOOSSSA!',
//        ]);
//        $tag = new \App\Models\Tag();
//        $tag->title = 'HELOOOSASASASA';
//        $tag->save();
        return view('admin.index');
    }
}
