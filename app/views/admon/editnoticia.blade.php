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
	
	{{ Form::open(array('url' => '/admin/editnoticia','method'=>'post','class'=>'', 'name'=>'formnoticias','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/admin/noticias' class="btn btn-danger"> X </a>
		</div>
		
		<input type="hidden" name="id" value="{{$datos->id_noticia}}">
		
		<div class="row">				
			<label class="control-label col-md-12">Titulo</label>					
			<div class="col-md-12"> 
				{{ Form::text('titulo',$datos->titulo, array('class' => 'form-control') ) }}
				<label class="error">{{$errors->first("titulo")}}</label>
			</div>
		</div> 	
		
		<div class="row">				
			<label class="control-label col-md-12">Estracto</label>					
			<div class="col-md-12"> 
				{{Form::textarea('estracto',$datos->estracto, array('class' => 'form-control', 'rows' => '2'))}}
				<label class="error">{{$errors->first("estracto")}}</label>
			</div>
		</div> 	
		
		<div class="row">				
			<label class="control-label col-md-12">Contenido</label>					
			<div class="col-md-12"> 
				{{Form::textarea('contenido',$datos->descripcion, array('class' => 'form-control', 'rows' => '8'))}}
				<label class="error">{{$errors->first("contenido")}}</label>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-6">			
				<label class="control-label col-md-12">Imagen</label>					
				<div class="col-md-12"> 
					{{HTML::image('uploads/noticias/'.$datos->imagen,'img_noticia',array("class"=>"img-thumbnail"))}}
					{{$errors->first("archivo")}}
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Fecha de la Noticia</label>					
				<div class="col-md-12"> 
					<!--{{ Form::text('fecha','9999-99-99', array('class' => 'form-control') ) }}-->
					<input type="date" name ="fecha" class="form-control" value="{{$datos->fecha_noticia}}">
					<label class="error">{{$errors->first("fecha")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
