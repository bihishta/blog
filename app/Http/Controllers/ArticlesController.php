<?php

namespace App\Http\Controllers;

use App\Article;
//use Request;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id){

        $article = Article::findOrFail($id);
     //   dd($article->published_at);
        return view('articles.show', compact('article'));
    }

    public function create(){
        return view('articles.create');
    }


    public function store(ArticleRequest $request){
        //$input = Request::all();
        //$input['published_at']=Carbon::now();
        //or
        //$input = Request::get('body');
        Article::create($request->all());
        return redirect('articles');
    }


    //or
    /*
    public function store(Request $request){

        $this->validate($request, ['title'=>'required', 'body'=>'required']);
        //$input = Request::all();
        //$input['published_at']=Carbon::now();
        //or
        //$input = Request::get('body');
        Article::create($request->all());
        return redirect('articles');
    }
    */



    public function edit($id){
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);

        $article->update($request->all());
        return redirect('articles');
    }

}
