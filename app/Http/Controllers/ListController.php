<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{

    public function index(){

        $lists = ['Cofee', 'Black Tea', 'Water'];
        //$lists = [];
        $date = date('y-m-d');
       //return view('lists.index')->with('lists', $lists)->with('date', $date);
       return view('lists.index', compact('lists', 'date'));

    }


    public function create(){

    }

    public function store(){

    }

    public function show($id){

        return view('lists.show')->with('id', $id);

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }

}
