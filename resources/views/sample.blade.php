@extends('layouts.master')

@section('content')
    <h1>Welcome to Blog</h1>
@endsection

@section('advertisement')
    <!-- for appending the below code to the previous, otherwise it will overwrite the text-->
    @parent
    <p>don't bye anything</p>
@endsection