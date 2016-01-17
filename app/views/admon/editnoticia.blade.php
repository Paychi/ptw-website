@extends('layouts.layout_admon')

@section('titulo')
Ad-Noticias
@stop

@section('css')
	<link href="{{URL::to('/')}}/css/bootstrap-datepicker.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('javascript')
	<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-datepicker.js"></script>
  	<script>
	  $(function() {
        $('#sandbox-containeredit input').datepicker({
	        keyboardNavigation: false,
	        forceParse: false,
      		todayBtn: "linked",
			todayHighlight: true,
			autoclose: true,
			calendarWeeks: true,
			format: 'dd/mm/yyyy',
			calendarWeeks: true,
			titleFormat: "MM yyyy"
	    });
	  });
  </script>
@stop

@section('content_admon')
	 
	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<h2>{{Session::get('mensaje')}}</h2>
		</div>
	@endif
	
	{{ Form::open(array('url' => '/admin/editnoticia','method'=>'post','class'=>'', 'name'=>'formnoticias','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<div style="float:left; margin-left:2%;">
				<label style="color:#337AB7; font-size:2em;" class="control-label">Editar Noticia</label>			
			</div>
			<div>	
				<a href='{{URL::to('/')}}/admin/noticias' class="btn btn-danger"> X </a>
			</div>
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
				<div class="col-md-12" id="sandbox-containeredit"> 
					<!--{{ Form::text('fecha','9999-99-99', array('class' => 'form-control') ) }}-->
					<?php
						setlocale(LC_TIME,'spanish');
						$fecha=strtotime($datos->fecha_noticia);
						$fecha_noticia= date("d",$fecha) ."/". date("m",$fecha) ."/". date("Y",$fecha);
					 ?>
					<input type="text" name ="fecha" class="form-control" value="{{$fecha_noticia}}" autocomplete="off" required>
					<label class="error">{{$errors->first("fecha")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
