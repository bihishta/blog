<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{

    public function signup(){
        return view('gallery.signup');
    }

    public function doSignup(){
         $rules = [
            'name' => 'required|alpha_num|min:3|max:32',
            'lastname' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'password' =>  'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];

        $input = Input::all();
        $validator = Validator::make($input, $rules);
        $error_msg = $validator->errors();

        if(count($error_msg) != 0){
            return redirect()->back()->withErrors($error_msg)->withInput(Input::except('password'));
        }

        else{

        $user = new User;

        $user->name = $input['name'];
        $user->lastname = $input['lastname'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save(); //dd($user);

    }

     return redirect::to('login')->with('succ_msj', 'Your Account created successfully.');

        }


        public function login(){
            return view('gallery.login');
        }

        public function doLogin(){
            $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $input = Input::all();
        $validator = Validator::make($input, $rules);

        $error_msg = $validator->errors();

        if(count($error_msg) != 0){
            return redirect()->back()->withErrors($error_msg)->withInput(Input::except('password'));
        }
        else{
            $email = Input::get('email');
            $password = Input::get('password');

            $user = User::where('email', '=', $email)->first(); //dd($user);

            if(Auth::attempt(['email' => $email, 'password' => $password])){ //dd('hi');
                return redirect()->intended('index');
            }
            else{
                return redirect::to('login')->with('wrong_details', 'Wrong Username/password. Please try again!');
            }
        }
    }


    public function logout(){
        Auth::logout();
        return redirect::to('login');
    }







}
