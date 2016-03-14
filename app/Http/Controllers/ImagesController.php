<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;
use View;
use App\Images;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;



class ImagesController extends Controller
{

    public function getForm($id)
  {
    $album = Album::find($id);
    return View::make('gallery.addimage')
    ->with('album',$album);
  }

  public function postAdd(Request $request)
  {

    $input = $request->all();
    $rules = array(
      'album_id' => 'required|numeric|exists:albums,id'
    );
    
    $validator = Validator::make($input, $rules);

    if($validator->fails()){
      return Redirect::route('show_album',array('id' =>Input::get('album_id')))->withErrors($validator)->withInput();
    }

    foreach ($input['photo'] as $file) {
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name.'_album_image.'.$extension; 
      $uploadSuccess = $file->move($destinationPath, $filename);// dd($uploadSuccess);

      Images::create(array(
        'name' => $filename,
        'album_id'=> Input::get('album_id')
      ));
    }
    
    return Redirect::route('show_album',array('id' =>Input::get('album_id')))->with('succ_msj', 'Image Added Successfully!');
  }

  public function getDelete($id)
  {
    $image = Images::find($id);
    $image->delete();
    return Redirect::route('show_album',array('id'=>$image->album_id));
  }




  public function getDownload($id){

    $image = Images::find($id);
    $imagename = $image->name;
    $file = "./albums/$imagename";
    return Response::download($file);
    return Redirect::route('show_album',array('id'=>$image->album_id));

}




  public function postMove()
{

  $rules = array(

    'new_album' => 'required|numeric|exists:albums,id',
    'photo'=>'required|numeric|exists:images,id'

  );

  $validator = Validator::make(Input::all(), $rules);
  if($validator->fails()){

    return Redirect::route('index');
  }
  $image = Images::find(Input::get('photo'));
  $image->album_id = Input::get('new_album');
  $image->save();
  return Redirect::route('show_album',array('id'=>Input::get('new_album')));
}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
