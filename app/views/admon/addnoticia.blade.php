@extends('layouts.layout_admon')

@section('titulo')
Ad-Noticias
@stop

@section('content_admon')
	 
	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<h2>{{Session::get('mensaje')}}</h2>
		</div>
	@endif
	
	{{ Form::open(array('url' => '/admin/addnoticia','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/admin/noticias' class="btn btn-danger"> X </a>
		</div>
		
		<div class="row">				
			<label class="control-label col-md-12">Titulo</label>					
			<div class="col-md-12"> 
				{{ Form::text('titulo',null, array('class' => 'form-control') ) }}
				<label class="error">{{$errors->first("titulo")}}</label>
			</div>
		</div> 	
		
		<div class="row">				
			<label class="control-label col-md-12">Estracto</label>					
			<div class="col-md-12"> 
				{{Form::textarea('estracto',null, array('class' => 'form-control', 'rows' => '2'))}}
				<label class="error">{{$errors->first("estracto")}}</label>
			</div>
		</div> 	
		
		<div class="row">				
			<label class="control-label col-md-12">Contenido</label>					
			<div class="col-md-12"> 
				{{Form::textarea('contenido',null, array('class' => 'form-control', 'rows' => '8'))}}
				<label class="error">{{$errors->first("contenido")}}</label>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-6">			
				<label class="control-label col-md-12">Imagen</label>					
				<div class="col-md-12"> 
					{{Form::file('archivo')}}
					{{$errors->first("archivo")}}
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Fecha de la Noticia</label>					
				<div class="col-md-12"> 
					<!--{{ Form::text('fecha','9999-99-99', array('class' => 'form-control') ) }}-->
					<input type="date" name ="fecha" class="form-control">
					<label class="error">{{$errors->first("fecha")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
