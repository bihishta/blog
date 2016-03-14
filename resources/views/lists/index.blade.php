<h1>Your Lists</h1>

<!-- Today's date is: {{date('y-m-d')}} -->

Today's date is: {{$date}}

<ul>

    @forelse($lists as $list)
            <li>{{$list}}</li>
    @empty
            <li>The array is empty.</li>
    @endforelse


    <!--
@foreach($lists as $list)
    <li>{{$list}}</li>
@endforeach
            -->


</ul>

