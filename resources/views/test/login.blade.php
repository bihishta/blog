<!doctype html>

<html>
<head></head>

<body>
<h1>Login Form</h1>

@if(Session::has('msj'))
    <div>
        <p>{{Session::get('msj')}}</p>
    </div>
@endif

@if(Session::has('confirm_succ'))
    <div>
        <p>{{Session::get('confirm_succ')}}</p>
    </div>
@endif

@if(Session::has('confirm_fail'))
    <div>
        <p>{{Session::get('confirm_fail')}}</p>
    </div>
@endif

@if(Session::has('err_msj'))
    <div>
        <p>{{Session::get('err_msj')}}</p>
    </div>
@endif

<table>
    {!! Form::open(['url' => 'testlogin']) !!}

    <tr>
        <td>{!! Form::label('email', "Email: ") !!}</td>
        <td>{!! Form::email('email', null) !!}</td>
    </tr>

    <tr>
        <td>{!! Form::label('password', "Password: ") !!}</td>
        <td>{!! Form::password('password', null) !!}</td>
    </tr>

    <tr>
        <td>{!! Form::submit('Submit') !!}</td>
    </tr>

    {!! Form::close() !!}
</table>
</body>

</html>