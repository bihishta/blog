<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;


class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('test.home');
    }

    public function register($role){
        return view('test.register')->with('role', $role);
    }

    public function doregister(){
        $input = Input::all();// dd($input);

        $rules = [
            'name'=>'required|min:3',
            'lastname'=>'required|min:3',
            'email'=>'required|email',
//          'password'=>'required|confirmed',
            'password'=>'required',
            'confirm_password'=>'required'
        ];

        $validator = Validator::make($input, $rules);
        $error_msg = $validator->errors();

        if(count($error_msg) != 0){
            return redirect()->back()->withErrors($error_msg)->withInput(Input::except('password'));
        }

        else {
            $user = new User();

            $user->name = $input['name'];
            $user->lastname = $input['lastname'];
            $user->email = $input['email'];
            $user->password = Hash::make($input['password']);
            $token = md5(uniqid(rand(), true));
            $user->email_confirm_token = $token;
            $user->role = $input['role'];

            $user->save();

            if($user->role == 'student'){
                $student = new Student();
                $student->user_id = $user->id;
                $user->studnet()->save($student);
            }

            elseif($user->role =='teacher'){
                $teacher = new Teacher();
                $teacher->user_id = $user->id;
                $user->teacher()->save($teacher);
            }

            return Redirect::to('testlogin')->with('msj',"Your account created successfully, please check your email to confirm.");

        }


    }


    public function confirm($token){
        $user = User::where('email_confirm_token', '=', $token);
        if(count($user) == 1){
            return redirect::to('testlogin')->with('confirm_succ', 'Your account confirmed successfully.');
        }
        else{
            return redirect::to('testlogin')->with('confirm_fail', 'Confirmation failed');
        }
    }


    public function login(){
        return view('test.login');
    }

    public function dologin(Request $request){
        $input = Input::all();

        $rules = [
            'email'=>'required|email',
            'password'=>'required'
        ];

        $validator = Validator::make($input, $rules);
        $error_msj = $validator->errors();

        if(count($error_msj) != 0){
            return redirect()->back()->withErrors($error_msj)->withInput(Input::except('password'));
        }
        else{
            $email = $input['email'];
            $password = $input['password'];

//            $email = Input::get('email');
//            $password = Input::get('password');

            $user = User::where('email', '=', $email)->first();

            if(Auth::attempt(['email' => $email, 'password' => $password])){ //dd('hi');
                return redirect()->intended('dashboard');
            }
            else{
                return redirect::to('testlogin')->with('err_msj', 'Wrong Username/password. Please try again!');
            }

        }

    }

    public function dashboard(){
        return view('test.dashboard')->with('username', Auth::user()->name);
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('testlogin');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
