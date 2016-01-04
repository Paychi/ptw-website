@extends('layouts.layout_login')

@section('titulo')
Usuario
@endsection

@section('content_login')
 
 	<div class="form">

		{{ Form::open(array('url' => '/login/usuario','method'=>'post')) }}
			
			@if (Session::has('error_cambio'))
			  <div class="error"> {{Session::get('error_cambio')}}</div>
			@endif
	 	 
	        {{ Form::text('nombre_usuario', null, array('class' => 'form-control margin-campos', 'placeholder' => 'Usuario Nuevo', 'required', 'autofocus')) }}
			<label class="error">{{$errors->first("nombre_usuario")}}</label>
			
	        {{ Form::password('con_pass_user', array('class' => 'form-control', 'placeholder' => 'Contrase&ntilde;a', 'required')) }}
			{{$errors->first("con_pass_user")}}
	 
	        {{ Form::submit('Cambiar', ['class' => 'btn btn-lg btn-primary btn-block margin-campos']) }}		
 
	    {{ Form::close() }}
	    
	    @if(Session::has('mensaje')) 
            <div class="flash_notice">{{ Session::get('mensaje') }}</div>                     
        @endif

	</div>

@endsection