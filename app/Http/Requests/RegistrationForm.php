<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true; // anyone can make the registration request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ];
    }

    public function persist() {

//        $password = bcrypt($this->input("password"));
//        $user=User::create(request(['name','email','password']));
//        $user = User::create($this->only(['name' ,'email' ,'password'=>$password]));
        $user = User::create([
                    'name' => $this->input('name'),
                    'email' => $this->input('email'),
                    'password' => bcrypt($this->input("password"))
        ]);
        //sign them in
        auth()->login($user);
        \Mail::to($user)->send(new Welcome($user));
    }

}
