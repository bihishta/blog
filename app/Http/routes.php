<?php

Route::get('test', function() {
    phpinfo();
});


Route::group(['middleware' => ['web']], function () {

    Route::get('/signup', array('as' => 'sign_up','uses' => 'IndexController@signup'));
    Route::post('/signup', array('as' => 'do_sign_up','uses' => 'IndexController@doSignup'));
    Route::get('/login', array('as' => 'log_in','uses' => 'IndexController@login'));
    Route::post('/login', array('as' => 'do_log_in','uses' => 'IndexController@doLogin'));
    Route::get('/logout', array('as' => 'log_out','uses' => 'IndexController@logout'));


Route::group(['middleware' => 'auth'], function(){

    Route::get('index', array('as' => 'index','uses' => 'AlbumsController@getList'));
    Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
    Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
    Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));
    Route::get('/slideshow/{id}', array('as' => 'slide_show','uses' => 'AlbumsController@slideShow'));

    Route::get('sharepage', array('as' => 'share_page','uses' => 'AlbumsController@sharePage'));
    Route::post('share', array('as' => 'share','uses' => 'AlbumsController@doShare'));

    Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@getForm'));
    Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
    Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@getDelete'));
    Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImagesController@postMove'));
    Route::get('/downloadimage/{id}', array('as' => 'download_image','uses' => 'ImagesController@getDownload'));
});


});



/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('welcome', function(){
    return view('welcomePage');
});
*/

Route::get('welcome', 'WelcomeController@index');

//resource use for loading a full controller without calling the method, is restful controller.
Route::resource('lists', 'ListController');

Route::get('sample', function(){
    return view('sample');
});

Route::resource('contact', 'ContactController');

Route::get('about', 'PagesController@about');

Route::get('contact','PagesController@contact');

//Route::get('articles','ArticlesController@index');
//
//Route::get('articles/create', 'ArticlesController@create');
//
//Route::get('articles/{id}','ArticlesController@show');
//
//Route::post('articles', 'ArticlesController@store');
//
//Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('home', 'testController@index');
    Route::get('testregister/{role}', 'testController@register');
    Route::post('testregister', 'testController@doregister');
    Route::get('testlogin', 'testController@login');
    Route::post('testlogin', 'testController@dologin');
    Route::get('dashboard', 'testController@dashboard');
    Route::get('testlogout', 'testController@logout');
    Route::get('confirm/{token}', 'testController@confirm');
});
