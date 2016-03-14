<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

    public function index(){
      //  dd(env('APP_DEBUG'));
        return view('welcomePage');
    }

}
/**
 * Created by PhpStorm.
 * User: netlinks
 * Date: 2/3/16
 * Time: 10:35 AM
 */