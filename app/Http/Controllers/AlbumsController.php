<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use App\Images;
use App\User;
use App\Share;
use DB;

use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class AlbumsController extends Controller
{


  public function doShare(){
    $input = Input::all();
    $album_id = $input['sel_album'];

    $user = Auth::user()->id; 

        $rules = array(
          'user' => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){

          return Redirect::route('index')
          ->withErrors($validator)
          ->withInput();
        }

        $selected_users = Input::get('user');

        foreach ($selected_users as $to_user) {

        $share = Share::create(array(
          'from_user' => $user,
          'to_user' => $to_user,
          'album_id' => $album_id
        ));
    }
    
        return Redirect::route('index')->with('succ_share', 'Album Shared Successfully');

    // return view('gallery.share');
  }

  public function sharePage(){

      $id = Auth::user()->id; 
      $albums = DB::table('shared')->where('shared.to_user', '=', $id)->join('albums', 'albums.id', '=', 'shared.album_id')->get();  
      return View::make('gallery.share')->with('albums', $albums);
  }


    public function getList(){
        $albums = Album::self()->with('Photos')->orderBy('created_at', 'desc')->paginate(4); 
        $my_user = Auth::user()->id;
        $users = User::where('id','!=',$my_user)->get();
        return View::make('gallery.index')->with('albums', $albums)->with('users', $users);
    }

    public function getAlbum($id)
      {
        $albums = Album::find($id);
        $photos = $albums->Photos()->orderBy('created_at', 'desc')->paginate(4);
        return View::make('gallery.album')->with('albums',$albums)->with('photos', $photos);
      
        //without pagination
        // $albums = Album::with('Photos')->find($id);
        // return View::make('gallery.album')->with('albums',$albums);
      }

      public function slideShow($id){
        $albums = Album::with('Photos')->find($id);
         return View::make('gallery.slideshow')->with('albums',$albums);

      }

      public function postCreate()
      {

        $user = Auth::user()->id; 

        $rules = array(

          'name' => 'required',
          'cover_image'=>'required|image'

        );
        
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){

          return Redirect::route('index')
          ->withErrors($validator)
          ->withInput();
        }

        $file = Input::file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = Input::file('cover_image')
        ->move($destinationPath, $filename);
        $album = Album::create(array(
          'user_id' => $user,
          'name' => Input::get('name'),
          'description' => Input::get('description'),
          'cover_image' => $filename,
        ));


        return Redirect::route('show_album',array('id'=>$album->id))->with('succ_msj', 'Album Created Successfully');
      }


      public function getDelete($id)
      {
        $album = Album::find($id);

        $album->delete();

        return Redirect::route('index');
      }



}
