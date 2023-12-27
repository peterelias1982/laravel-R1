<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ExampleController extends Controller
{
    use Common;
    public function test1(){
        return view("login");
    }

    public function login(){
        return view('login');
    }
    public function showUpload(){
        return view('upload');
    }

    public function place(){
        return view('place');
    }

    public function blog(){
        return view('blog');
    }

    public function blog1(){
        return view('blog1');
    }

    public function mySession(){
        session()->put('test', 'First Laravel session');
        //session()->flash('test', 'First Laravel session');
        return 'Session created successfully';
    }

    public function getSession(){
        $data = session('test');
        return view('session', compact('data'));
    }

    public function contact(){
        return view('contact');
    }

    public function receiveContact(Request $request){
        $content = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            ];
        Mail::to('recipient@email.com')->send( 
            new ContactMail($content),
        );
        
        return "mail sent!";
    }
    public function upload(Request $request){
        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_extension;
        // $path = 'assets/images';
        // $request->image->move($path, $file_name);
        $h = $this->uploadFile($request->image, 'assets/images');
        return $h;
    }

    public function received(Request $request){
        $msg = "Your email is: " . $request->email . "<br> and Password is: " . $request->pwd;
        return $msg;
    }
        
}
