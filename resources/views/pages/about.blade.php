@extends('app')

@section('content')

    <h1>About</h1>

    @if(count($people))

    <h3>People I Like: </h3>
    <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
    @endif






   @if($first =='Nooria')
        <h1>About Us: {{$first}} {{$last}}</h1>
    @else
        <h1>Hello</h1>
    @endif

    <p>Some text here, Some text here, Some text here, Some text here, Some text here, Some text here, Some text here,
        Some text here, Some text here, Some text here, Some text here, Some text here, Some text here, Some text here,
        Some text here, Some text here,Some text here, Some text here, Some text here, Some text here, Some text here,
        Some text here, Some text here, Some text here,</p>



@stop
