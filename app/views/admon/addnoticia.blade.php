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
	  	
	    /*$( "#datepicker" ).datepicker({
	    	changeMonth: true,
	    	changeYear: true,
	       	showOn: "button",
	      	buttonImage: "{{URL::to('/')}}/img/calendar.png",
	      	buttonImageOnly: true,
	      	buttonText: "Select date",
	      	keyboardNavigation: false,
	        forceParse: false,
	        todayHighlight: true
	    });*/
        $('#sandbox-container input').datepicker({
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
	
	{{ Form::open(array('url' => '/sisadm/addnoticia','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform', 'files' => true)) }}
		<div class="row text-right">
			<div style="float:left; margin-left:2%;">
				<label style="color:#337AB7; font-size:2em;" class="control-label">Nueva Noticia</label>			
			</div>
			<div>			
				<a href='{{URL::to('/')}}/sisadm/noticias' class="btn btn-danger"> X </a>  <!--&times;-->
			</div>
		</div>
		
		<div class="row">				
			<label class="control-label col-md-12">Titulo</label>					
			<div class="col-md-12"> 
				{{ Form::text('titulo',null, array('class' => 'form-control', 'required', 'autofocus') ) }}
				<label class="error">{{$errors->first("titulo")}}</label>
			</div>
		</div> 	
		
		<div class="row">				
			<label class="control-label col-md-12">Estracto</label>					
			<div class="col-md-12"> 
				{{Form::textarea('estracto',null, array('class' => 'form-control', 'rows' => '2', 'required'))}}
				<label class="error">{{$errors->first("estracto")}}</label>
			</div>
		</div> 	
		
		<div class="row">				
			<label class="control-label col-md-12">Contenido</label>					
			<div class="col-md-12"> 
				{{Form::textarea('contenido',null, array('class' => 'form-control', 'rows' => '8', 'required'))}}
				<label class="error">{{$errors->first("contenido")}}</label>
			</div>
		</div> 	
		
		<div class="row">	
			<div class="col-lg-6">			
				<label class="control-label col-md-12">Imagen</label>					
				<div class="col-md-12">
					<div class="row">						
						<div class="col-lg-12">
							<div class="form-group"> 
								<!--{{Form::file('archivo',['class' => 'file','id' => 'file-1','multiple' => 'true', 'data-preview-file-type' => 'any', 'accept' => 'image/*'])}}-->
			                    {{Form::file('archivo',['class' => 'file','id' => 'file-1', 'data-preview-file-type' => 'any', 'accept' => 'image/*'])}}
			                </div>  
							<!--<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										+ {{Form::file('archivo')}}										
									</span>
								</span>
								<input type="text" class="form-control" readonly></input>						
							</div>-->
							<label class="error">{{$errors->first("archivo")}}</label>
						</div>				
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<label class="control-label col-md-12">Fecha de la Noticia</label>					
				<div class="col-md-12 dp-container" id ="sandbox-container"> 
					<!--{{ Form::text('fecha','9999-99-99', array('class' => 'form-control') ) }}-->
					<input type="text" name ="fecha" class="form-control" placeholder="dd/mm/aaaa" required autocomplete="off">
					<!--<input type="date" name ="fecha" class="form-control" placeholder="dd/mm/aaaa" required style="width: 85%;display: inline;margin-right: 5px;cursor: pointer;background: white;color: black;">
					<a href="" class="ui-datepicker-trigger"><span class="glyphicon glyphicon-calendar"></span></a>-->
					<label class="error">{{$errors->first("fecha")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}
 	
@endsection
	
