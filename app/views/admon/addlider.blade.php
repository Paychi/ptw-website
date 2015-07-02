@extends('layouts.layout_admon')

@section('titulo')
Ad-Lideres
@stop

@section('content_admon')
	{{ Form::open(array('url' => '/admin/addlideres','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform')) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/admin/lideres' class="btn btn-danger"> X </a>
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
		</div> 	
		
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
@stop
	
