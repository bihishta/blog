@extends('app')

@section('content')
    <h1>Articles</h1>
    <hr>

    @foreach($articles as $article)
        <article>
            <!-- <a href="/articles/{{$article->id}}"> <h3>{{$article->title}}</h3> </a> -->
            <!--   <a href="{{action('ArticlesController@show', [$article->id])}}"> <h3>{{$article->title}}</h3> </a> -->
            <a href="{{url('/articles', $article->id)}}"> <h3>{{$article->title}}</h3> </a>
        </article>

        <div class="body">{{$article->body }}</div>
    @endforeach

@stop