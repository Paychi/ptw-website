@extends('layouts.layout_adis')

@section('titulo')
Ad-Lideres
@stop

@section('content_adis')
	{{ Form::open(array('url' => '/adis/addlideres','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform')) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/adis/lideres' class="btn btn-danger"> X </a>
		</div>

		@if(Session::has('mensajeError'))
			<div class="error" style="font-size: 1.1em;">
				<Label>{{Session::get('mensajeError')}}</Label>
			</div>
		@endif
		
		<div class="row">	
			<div class="col-md-6">			
				<label class="control-label col-md-12">Nombre</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre',null, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("nombre")}}</label>
				</div>
			</div>
			<div class="col-md-6" id="selected_comunidad">	
				<label class="control-label col-md-12">Comunidad que labora</label>					
				<div class="col-md-12"> 
					{{Form::select('comunidad', $lista_comunidad, $selected, array('class' => 'form-control', 'id' => 'lista_comunidades'))}}
					<label class="error">{{$errors->first("comunidad")}}</label>
				</div>
			</div>
		</div> 	
		
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
@stop
	
