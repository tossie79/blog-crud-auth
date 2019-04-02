<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller {

    //Go to registration form
    public function create() {
        return view('registration.create');
    }

    //save new user
    public function store(RegistrationForm $form) {
        //validate the form
//        $this->validate(request(), [
//            'name' => 'required|min:2',
//            'email' => 'required|email',
//            'password' => 'required|confirmed|min:6'
//        ]);

        //if validated, create and save the user
     //With the RegistrationRequest Form request class, the validation is done there
////        $user=User::create(request(['name','email','password']));
//        $user = User::create([
//                    'name' => request('name'),
//                    'email' => request('email'),
//                    'password' => bcrypt(request('password')
//        ]);
//        //sign them in
//        auth()->login($user);
//        \Mail::to($user)->send(new Welcome($user));
        $form->persist();
        session()->flash('message','Thank you so much for signing up'); // exists for only one page load
        //redirect to homepage
        
        return redirect()->home();
    }

}
