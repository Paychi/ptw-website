@extends('layouts.layout_admon')

@section('titulo')
Ad-Usuarios
@stop

@section('content_admon')
	{{ Form::open(array('url' => '/admin/addusuarios','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform')) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/admin/usuarios' class="btn btn-danger"> X </a>
		</div>

		@if(Session::has('mensajeError'))
			<div class="error" style="font-size: 1.1em;">
				<Label>{{Session::get('mensajeError')}}</Label>
			</div>
		@endif
		
		<div class="row">	
			<div class="col-md-6">			
				<label class="control-label col-md-12">Nombres</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombres',null, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("nombres")}}</label>
				</div>
			</div>
			<div class="col-md-6">
				<label class="control-label col-md-12">Apellidos</label>					
				<div class="col-md-12"> 
					{{ Form::text('apellidos',null, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("apellidos")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">		
			<div class="col-md-6">	
				<label class="control-label col-md-12">Perfil</label>					
				<div class="col-md-12"> 
					{{Form::select('perfil', $lista_perfil, $selected, array('class' => 'form-control'))}}
					<label class="error">{{$errors->first("perfil")}}</label>
				</div>
			</div>
			<div class="col-md-6">
				<label class="control-label col-md-12">Nombre de Usuario</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre_usuario',null, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("nombre_usuario")}}</label>
				</div>
			</div>					
		</div> 		
		
		<!--<div class="row">		
			<div class="col-md-6">	
				<label class="control-label col-md-12">Contraseña</label>					
				<div class="col-md-12"> 
					{{ Form::password('pass_user', array('class' => 'form-control', 'required')) }}
					<label class="error">{{$errors->first("pass_user")}}</label>
				</div>
			</div>
			<div class="col-md-6">	
				<label class="control-label col-md-12">Confirmar Contraseña</label>					
				<div class="col-md-12"> 
					{{ Form::password('conpass_user', array('class' => 'form-control', 'required')) }}
					<label class="error">{{$errors->first("conpass_user")}}</label>
				</div>
			</div>		
			
		</div> 	-->
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@stop
	
