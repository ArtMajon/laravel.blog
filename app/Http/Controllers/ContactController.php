<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request){

        if ($request->method() == 'POST') {
            $body = "<p><b>Name:</b>  {$request->input('name')}</p>";
            $body .= "<p><b>Email:</b>{$request->input('email')} </p>";
            $body .= "<p><b>Text:</b><br>" . nl2br($request->input('text')) . "</p>";
            Mail::to('artmajon@gmail.com')->send(new ContactMail($body));
            session()->flash('success', 'Сообщение отправлено');
            return redirect('/contact');
        }
        return view('posts.contact');
    }
//    Mail::to('artmajon@gmail.com')->send(new ContactMail());
//
//    return view('posts.contact');
}
