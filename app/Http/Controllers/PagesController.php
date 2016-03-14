<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //

    public function about(){

        //1
        /*$name = 'Sadaf Waziry';
       return view('pages.about')->with('name', $name); */

        //2
       // return view('pages.about')->with(['first'=> 'Sadaf', 'last'=>'Waziry']);

        //3
        /*
        $data=[];
        $data['first'] ='Bheshta';
        $data['last'] = 'Yousufzai';

        return view('pages.about', $data);
        */

        //4

        $first = 'Nooria';
        $last  = 'Ahmadi';

      //  return view('pages.about', compact('first', 'last'));


        //$people = ['Nooria', 'Bheshta'];
        $people = [];
        return view('pages.about', compact('people', 'first', 'last'));



    }

    public function contact(){
        return view('pages.contact');
    }
}
