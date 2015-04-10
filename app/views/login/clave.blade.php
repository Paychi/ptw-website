@extends('layouts.layout_login')

@section('titulo')
Contrase&ntilde;a
@endsection

@section('content_login')
 
 	<div class="form">

		{{ Form::open(array('url' => '/login/clave','method'=>'post')) }}
			
			@if (Session::has('error_cambio'))
			  <div class="error"> {{Session::get('error_cambio')}}</div>
			@endif
	 	 
	        {{ Form::password('old_password', array('class' => 'form-control margin-campos', 'placeholder' => 'Contrase&ntilde;a Actual', 'required')) }}
			{{$errors->first("old_password")}}
			
	        {{ Form::password('new_password', array('class' => 'form-control margin-campos', 'placeholder' => 'Contrase&ntilde;a Nueva', 'required')) }}
			{{$errors->first("new_password")}}
			
	        {{ Form::password('con_password', array('class' => 'form-control margin-campos', 'placeholder' => 'Confirmar Contrase&ntilde;a Nueva', 'required')) }}
			{{$errors->first("con_password")}}
	 
	        {{ Form::submit('Cambiar', ['class' => 'btn btn-lg btn-primary btn-block margin-campos']) }}		
 
	    {{ Form::close() }}
	    
	    @if(Session::has('mensaje')) 
            <div class="flash_notice">{{ Session::get('mensaje') }}</div>                     
        @endif

	</div>

@endsection
	
