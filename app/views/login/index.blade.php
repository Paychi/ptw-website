@extends('layouts.layout_login')

@section('titulo')
Login
@endsection

@section('content_login')
 
 	<div class="form">

		{{ Form::open(array('url' => '/login','method'=>'post')) }}
			
			@if (Session::has('error_login'))
			  <div class="error">Usuario o contrase&ntilde;a incorrectos! <!--{{Session::get('error_login')}}--></div>
			@endif
	 	 
	        {{ Form::text('username', null, array('class' => 'form-control margin-campos', 'placeholder' => 'Nombre de Usuario', 'required', 'autofocus')) }}
			{{$errors->first("username")}}
	 	 
	        {{ Form::password('password', array('class' => 'form-control margin-campos', 'placeholder' => 'Contrase&ntilde;a', 'required')) }}
			{{$errors->first("password")}}
	 
	        {{ Form::submit('Iniciar sesión', ['class' => 'btn btn-lg btn-primary btn-block margin-campos']) }}		
 
	    {{ Form::close() }}

	    <div class="text-right">{{ HTML::link('/', 'P&aacute;gina Inicio') }}</div>
	    
	    {{ HTML::link('/login/forgotpw','¿Olvidó su contraseña?', array('class' => 'margin-campos')) }}
	    
	    @if(Session::has('mensaje')) 
            <div class="flash_notice">{{ Session::get('mensaje') }}</div>                     
        @endif

	</div>

@endsection
	
