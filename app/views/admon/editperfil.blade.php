@extends('layouts.layout_admon')

@section('titulo')
Ad-Perfil
@stop

@section('css')
@stop

@section('content_admon')
 	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif

	{{ Form::open(array('url' => '/admin/editperfil','method'=>'post','class'=>'', 'name'=>'form_perfil','id'=>'msform')) }}
		<div class="row text-right">
			<a href='{{URL::to('/')}}/admin/perfiles' class="btn btn-danger"> X </a>
		</div>
		
		<input type="hidden" name="id" value="{{$datos->id_perfil}}">

		<div class="row">	
			<div class="col-md-6">			
				<label class="control-label col-md-12">Nombre</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre', $datos->nombre, array('class' => 'form-control', 'required', 'autofocus') ) }}
					<label class="error">{{$errors->first("nombre")}}</label>
				</div>
			</div>
			<div class="col-md-6">
				<label class="control-label col-md-12">Descripci&oacute;n</label>					
				<div class="col-md-12"> 
					{{Form::textarea('descripcion',$datos->descripcion, array('class' => 'form-control', 'rows' => '3'))}}
					<label class="error">{{$errors->first("descripcion")}}</label>
				</div>
			</div>
		</div> 	
		
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}

@stop