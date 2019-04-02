<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest',['except'=>'destroy']);
    }
    //login form
   public function create() {
        return view('sessions.create');
    }
    public function store(){

        //not successful authentication - redirect back
       if (!auth()->attempt(request(['email','password']))){
           return back()->withErrors(
                   [
               'message'=>"Please check your credentials and try again"
           ]
                   );
       }
             
        //if suucessful - redirect to home page
//       return redirect()->home();
       return redirect('/posts');
        
        
    }
    public function destroy() {
        auth()->logout();
        return redirect('/posts');
//        return redirect()->home();
    }
}
