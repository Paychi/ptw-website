@extends('layouts.layout_admon')

@section('titulo')
Adis-Upload
@stop

@section('css')
	<link href="{{URL::to('/')}}/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('javascript')
	<script type="text/javascript" src="{{URL::to('/')}}/js/fileinput.js"></script>
@stop

@section('content_admon')
	 
	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<h2>{{Session::get('mensaje')}}</h2>
		</div>
	@endif
	
	{{ Form::open(array('url' => '/adis/uploads','method'=>'post','class'=>'', 'name'=>'formnoticias','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/admin/noticias' class="btn btn-danger"> X </a>
		</div>
		
		<input type="hidden" name="id" value="{{$id_noticia}}">

		@if(Session::has('mensajeError'))
			<div class="row">
				<br/>
				<div class="alert alert-danger text-center">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>{{Session::get('mensajeError')}}</strong>
				</div>
			</div>
		@endif

		<div class="row">
			<div class="col-md-12 text-center">
				<p class="help-block">Puede cargar ambos (imagen/video) ó puedé cargar solamente uno por individual y dejer el otro vacio</p>
			</div>
		</div>
		
		<div class="row panel panel-primary">				
			<div class="panel-heading"><b>Imagen</b></div>			
			<div class="panel-body">
				<div class="row">						
					<div class="col-lg-12">
						<div class="form-group"> 
		                    {{Form::file('imagen',['class' => 'file','id' => 'file-1', 'data-preview-file-type' => 'any', 'accept' => 'image/*', 'multiple'])}}
		                </div>  
		                <label>Descripción corta de la imagen</label>
		                {{Form::textarea('descriptionimagen',null, array('class' => 'form-control', 'rows' => '2'))}}
					</div>				
				</div>
			</div>
			<div class="panel-footer">Solo puede subir una imagen a la vez. Maximo 20MB. Formatos validos: png y jpg.</div>
		</div> 	
		
		<div class="row panel panel-primary">				
			<div class="panel-heading"><b>Video</b></div>				
			<div class="panel-body">
				<div class="row">						
					<div class="col-lg-12">
						<div class="form-group"> 
		                    {{Form::file('video',['class' => 'file','id' => 'file-2', 'data-preview-file-type' => 'any', 'accept' => 'video/*'])}}
		                </div>  
		                <label>Descripción corta del video</label>
		                {{Form::textarea('descriptionvideo',null, array('class' => 'form-control', 'rows' => '2'))}}
					</div>				
				</div>
			</div>
			<div class="panel-footer">Solo puede subir un video a la vez. Maximo 50MB. Formatos validos: mp4 y avi.</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
