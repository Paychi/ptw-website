@extends('layouts.layout_adis')

@section('titulo')
Ad-Comunidades
@stop

@section('content_adis')
	{{ Form::open(array('url' => '/adis/editcomunidad','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform')) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/adis/comunidades' class="btn btn-danger"> X </a>
		</div>

		@if(Session::has('mensajeError'))
			<div class="error" style="font-size: 1.1em;">
				<Label>{{Session::get('mensajeError')}}</Label>
			</div>
		@endif

		{{ Form::hidden('id', $datos->id_comunidad) }}
		
		<div class="row">	
			<div class="col-md-6">			
				<label class="control-label col-md-12">Nombre</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombreComunidad',$datos->nombreComunidad, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("nombreComunidad")}}</label>
				</div>
			</div>
			<div class="col-md-6">			
				<label class="control-label col-md-12">Código de la Comunidad</label>					
				<div class="col-md-12"> 
					{{ Form::text('codigo_comunidad',$datos->codigo_comunidad, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("codigo_comunidad")}}</label>
				</div>
			</div>
		</div> 			


		<div class="row">	
			<div class="col-md-6">			
				<label class="control-label col-md-12">Descripción</label>					
				<div class="col-md-12"> 
					{{ Form::text('descripcion',$datos->descripcion, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("descripcion")}}</label>
				</div>
			</div>
		</div> 	
		
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
@stop