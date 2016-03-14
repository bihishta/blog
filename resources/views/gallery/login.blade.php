@extends('galleryLayouts.layout')

<div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-top:150px; width:500px; margin-left:310px;">
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


                        @if(Session::has('succ_msj'))
                            <div class="alert alert-success">
                                <p><strong>{{ Session::get('succ_msj') }}</strong></p>
                            </div>
                        @endif

                        @if(Session::has('wrong_details'))
                            <div class="alert alert-danger">
                                <p><strong>{{ Session::get('wrong_details') }}</strong></p>
                            </div>
                        @endif


                       
                        {!! Form::open(['url' => 'login']) !!}
                        <div class="form-group">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                        </div>
                        {!! Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-block']) !!}
                        {!! Form::close() !!}

                        <a href="/signup">Create New Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>