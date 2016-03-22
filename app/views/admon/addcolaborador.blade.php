@extends('layouts.layout_admon')

@section('titulo')
Ad-Noticias
@stop

@section('css')
	<link href="{{URL::to('/')}}/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
	<link href="{{URL::to('/')}}/css/bootstrap-datepicker.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('javascript')
	<script type="text/javascript" src="{{URL::to('/')}}/js/fileinput.js"></script>
	<script type="text/javascript" src="{{URL::to('/')}}/js/bootstrap-datepicker.js"></script>
  	<script>
	  $(function() {
        $('#sandbox-container2 input').datepicker({
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
	
	{{ Form::open(array('url' => '/sisadm/addcolaborador','method'=>'post','class'=>'', 'name'=>'form_colaborador','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<div style="float:left; margin-left:2%;">
				<label style="color:#337AB7; font-size:2em;" class="control-label">Nuevo Colaborador</label>			
			</div>
			<div>	
				<a href='{{URL::to('/')}}/sisadm/colaboradores' class="btn btn-danger"> X </a>
			</div>
		</div>
		
		<div class="row">	
			<div class="col-lg-9">
				<label class="control-label col-md-12">Nombre</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre',null, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("nombre")}}</label>
				</div>
			</div>
			<div class="col-lg-3">
				<label class="control-label col-md-12">Abreviatura</label>					
				<div class="col-md-12"> 
					{{ Form::text('abreviatura',null, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("abreviatura")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">		
			<div class="col-lg-12">		
				<label class="control-label col-md-12">Descripci&oacute;n</label>					
				<div class="col-md-12"> 
					{{Form::textarea('descripcion',null, array('class' => 'form-control', 'rows' => '2', 'required'))}}
					<label class="error">{{$errors->first("descripcion")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">		
			<div class="col-lg-12">			
				<label class="control-label col-md-12">Sitio Web</label>					
				<div class="col-md-12"> 
					{{Form::text('website',null, array('class' => 'form-control'))}}
					<p class="help-block">Escriba el sitio sin www y sin http:// o https:// </p>
					<p class="help-block">Ejemplo: ejemplo.com</p>
					<label class="error">{{$errors->first("website")}}</label>
				</div>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-6">			
				<label class="control-label col-md-12">Logo</label>					
				<div class="col-md-12"> 
					<div class="row">						
						<div class="col-lg-12">
							<div class="form-group"> 
								{{Form::file('logo',['class' => 'file','id' => 'file-1', 'data-preview-file-type' => 'any', 'accept' => 'image/*'])}}
			                </div>
							<label class="error">{{$errors->first("logo")}}</label>
						</div>					
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Fecha de Afiliaci&oacute;n</label>					
				<div class="col-md-12" id = "sandbox-container2"> 
					<!--{{ Form::text('fecha','9999-99-99', array('class' => 'form-control') ) }}-->
					<input type="text" name ="fecha" class="form-control" placeholder="dd/mm/aaaa" required autocomplete="off">
					<label class="error">{{$errors->first("fecha")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
