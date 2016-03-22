@extends('layouts.layout_admon')

@section('titulo')
Ad-Colaboradores
@stop

@section('css')
	<link href="{{URL::to('/')}}/css/bootstrap-datepicker.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('javascript')
	<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-datepicker.js"></script>
  	<script>
	  $(function() {
        $('#sandbox-container2edit input').datepicker({
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
	
	{{ Form::open(array('url' => '/sisadm/editcolaborador','method'=>'post','class'=>'', 'name'=>'formcolaborador','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<div style="float:left; margin-left:2%;">
				<label style="color:#337AB7; font-size:2em;" class="control-label">Editar Colaborador</label>			
			</div>
			<div>	
				<a href='{{URL::to('/')}}/sisadm/colaboradores' class="btn btn-danger"> X </a>
			</div>
		</div>
		
		<input type="hidden" name="id" value="{{$datos->id_colaborador}}">
		
		<div class="row">	
			<div class="col-lg-9">
				<label class="control-label col-md-12">Nombre</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre',$datos->nombre, array('class' => 'form-control') ) }}
					<label class="error">{{$errors->first("nombre")}}</label>
				</div>
			</div>
			<div class="col-lg-3">
				<label class="control-label col-md-12">Abreviatura</label>					
				<div class="col-md-12"> 
					{{ Form::text('abreviatura',$datos->abreviatura, array('class' => 'form-control') ) }}
					<label class="error">{{$errors->first("abreviatura")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-12">
				<label class="control-label col-md-12">Descripci&oacute;n</label>					
				<div class="col-md-12"> 
					{{Form::textarea('descripcion',$datos->descripcion, array('class' => 'form-control', 'rows' => '2'))}}
					<label class="error">{{$errors->first("descripcion")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-12">
				<label class="control-label col-md-12">Sitio Web</label>					
				<div class="col-md-12"> 
					{{Form::text('website',$datos->sitio_web, array('class' => 'form-control'))}}
					<label class="error">{{$errors->first("website")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-6">			
				<label class="control-label col-md-12">Logo</label>					
				<div class="col-md-12"> 
					{{HTML::image('uploads/logo_colaboradores/'.$datos->logo,'logo_colaborador',array("class"=>"img-thumbnail"))}}
					{{$errors->first("logo")}}
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Fecha de Afiliaci&oacute;n</label>					
				<div class="col-md-12" id = "sandbox-container2edit"> 
					<!--{{ Form::text('fecha','9999-99-99', array('class' => 'form-control') ) }}-->
					<?php
						setlocale(LC_TIME,'spanish');
						$fecha=strtotime($datos->fecha_colaborador);
						$fecha_colaborador= date("d",$fecha) ."/". date("m",$fecha) ."/". date("Y",$fecha);
					 ?>
					<input type="text" name ="fecha" class="form-control" value="{{$fecha_colaborador}}" required autocomplete="off">
					<label class="error">{{$errors->first("fecha")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
