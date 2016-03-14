@extends('galleryLayouts.layout')

@section('content')
	    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-top:120px; width:500px; margin-left:310px;">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" >
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">

                    	@if ($errors->any())
						    <ul class="alert alert-danger" style="list-style:none;">
						        @foreach ($errors->all() as $error)
						            <li>{{ $error }}</li>
						        @endforeach
						    </ul>
						@endif

						@if(Session::has('user_dup'))
                            <div class="alert alert-danger">
                                <p><strong>{{ Session::get('user_dup') }}</strong></p>
                            </div>
                        @endif

                        
                        {!! Form::open(['url' => 'signup']) !!}

                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control']) !!}

                        {!! Form::label('lastname', 'Last Name') !!}
                        {!! Form::text('lastname', null, ['class'=> 'form-control']) !!}

                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class'=> 'form-control', 'placeholder' => 'e.g Example@mail.com']) !!}

                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}

                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                        {!! Form::submit('Submit', ['class' => 'btn btn-success', 'style' => 'margin-top:10px;']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop