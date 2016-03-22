@extends('layouts.layout_admon')

@section('titulo')
Ad-Contacto
@stop

@section('content_admon')
	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<h2>{{Session::get('mensaje')}}</h2>
		</div>
	@endif

	{{ Form::open(array('url' => '/sisadm/addcontacto','method'=>'post','class'=>'', 'name'=>'form_contacto','id'=>'msform')) }}
		<div class="row text-right">
			<div style="float:left; margin-left:2%;">
				<label style="color:#337AB7; font-size:2em;" class="control-label">Nuevo Contacto</label>			
			</div>
			<div>	
				<a href='{{URL::to('/')}}/sisadm/contactos' class="btn btn-danger"> X </a>
			</div>
		</div>
		
		<div class="row">	
			<div class="col-lg-6">
				<label class="control-label col-md-12">Nombres</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre',null, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("nombre")}}</label>
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Apellidos</label>					
				<div class="col-md-12"> 
					{{ Form::text('apellido',null, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("apellido")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">		
			<div class="col-lg-6">
				<label class="control-label col-md-12">Correo</label>					
				<div class="col-md-12"> 
					{{ Form::email('correo',null, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("correo")}}</label>
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Telefono</label>					
				<div class="col-md-12"> 
					{{ Form::text('telefono',null, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("telefono")}}</label>
				</div>
			</div>
		</div> 	
			
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
@stop