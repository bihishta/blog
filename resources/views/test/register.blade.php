<!doctype html>
<html>
<head></head>

<body>
<h1>Registratin Form</h1>
@foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
@endforeach

<table>
{!! Form::open(['url' => 'testregister']) !!}
<tr>
<td>{!! Form::label('name','Name: ') !!} </td>
<td>{!! Form::text('name', null) !!}</td>
</tr>

<tr>
<td>{!! Form::label('lastname', "Last Name: ") !!} </td>
<td>{!! Form::text('lastname', null) !!}</td>
</tr>

<tr>
<td>{!! Form::label('email', "Email: ") !!}</td>
<td>{!! Form::email('email', null) !!}</td>
</tr>

<tr>
<td>{!! Form::label('password', "Password: ") !!}</td>
<td>{!! Form::password('password', null) !!}</td>
</tr>

<tr>
<td>{!! Form::label('confirm_password', 'Confirm Password: ') !!}</td>
<td>{!! Form::password('confirm_password', null) !!}</td>
</tr>

<input type="hidden" name="role" value="{{ $role }}" />


<tr>
<td>{!! Form::submit('Submit') !!}</td>
</tr>

{!! Form::close() !!}
</table>

</body>
</html>