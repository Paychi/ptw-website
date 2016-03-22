@extends('layouts.layout_admon')

@section('titulo')
Ad-Usuarios
@stop

@section('content_admon')
	{{ Form::open(array('url' => '/sisadm/editusuario','method'=>'post','class'=>'', 'name'=>'form_noticias','id'=>'msform')) }}
		<div class="row text-right">
			<div style="float:left; margin-left:2%;">
				<label style="color:#337AB7; font-size:2em;" class="control-label">Editar Usuario</label>			
			</div>
			<div>
				<a href='{{URL::to('/')}}/sisadm/usuarios' class="btn btn-danger"> X </a>
			</div>
		</div>
		
		@if(Session::has('mensajeError'))
			<div class="error" style="font-size: 1.1em;">
				<Label>{{Session::get('mensajeError')}}</Label>
			</div>
		@endif
		
		{{ Form::hidden('id', $datos->id_usuario) }}
		
		<div class="row">		
			<div class="col-md-6">	
				<label class="control-label col-md-12">Nombres</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombres',$datos->nombres, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("nombres")}}</label>
				</div>
			</div>
			<div class="col-md-6">
				<label class="control-label col-md-12">Apellidos</label>					
				<div class="col-md-12"> 
					{{ Form::text('apellidos',$datos->apellidos, array('class' => 'form-control', 'required') ) }}
					<label class="error">{{$errors->first("apellidos")}}</label>
				</div>
			</div>			
			
		</div> 	
		
		<div class="row">	
			<div class="col-md-6" id="selected_perfil">	
				<label class="control-label col-md-12">Perfil</label>					
				<div class="col-md-12"> 
					{{Form::select('perfil', $lista_perfil, $selected, array('class' => 'form-control', 'id' => 'lista_perfiles'))}}
					<label class="error">{{$errors->first("nombre_user")}}</label>
				</div>
			</div>
			<div class="col-md-6">
				<label class="control-label col-md-12">Nombre de Usuario</label>					
				<div class="col-md-12"> 
					{{ Form::text('nombre_user',$datos->nombre_usuario, array('class' => 'form-control', 'disabled') ) }}
					<label class="error">{{$errors->first("nombre_user")}}</label>
				</div>
			</div>					
		</div> 		
		
		@if($datos->id_perfil == 3)
		<div class="row" id = "fieldhidden">				
			<div class="col-md-6">	
				<label class="control-label col-md-12">Colaborador</label>					
				<div class="col-md-12"> 
					{{Form::select('colaborador', $lista_colaboradores, $item_selected, array('class' => 'form-control', 'id' => 'list'))}}
					<label class="error">{{$errors->first("colaborador")}}</label>
				</div>
			</div>
		</div> 
		@else
		<div class="row" style="display: none;" id = "fieldhidden">				
			<div class="col-md-6">	
				<label class="control-label col-md-12">Colaborador</label>					
				<div class="col-md-12"> 
					{{Form::select('colaborador', $lista_colaboradores, $item_selected, array('class' => 'form-control', 'id' => 'list'))}}
					<label class="error">{{$errors->first("colaborador")}}</label>
				</div>
			</div>
		</div> 		
		@endif	
		@if($datos->id_perfil == 2)
		<div class="row" id = "fieldhidden2">				
			<div class="col-md-6">	
				<label class="control-label col-md-12">Admin</label>					
				<div class="col-md-12"> 
					@if($datos->id_colaborador == 1)
						{{Form::checkbox('isadmin', 'si', true, array('class' => 'form-control', 'id' => 'isadmin', 'style' => 'width: 20px;','onchange'=>'isadminuser()'))}}
					@else	
						{{Form::checkbox('isadmin', 'si', false, array('class' => 'form-control', 'id' => 'isadmin', 'style' => 'width: 20px;','onchange'=>'isadminuser()'))}}
					@endif
					{{ Form::hidden('isadminHide', $datos->id_colaborador,  array('id' => 'isadminHide')) }}
					<label class="error">{{$errors->first("isadmin")}}</label>
				</div>
			</div>
		</div> 
		@else
		<div class="row" style="display: none;" id = "fieldhidden2">				
			<div class="col-md-6">	
				<label class="control-label col-md-12">Admin</label>					
				<div class="col-md-12"> 
					{{Form::checkbox('isadmin', 'si', false, array('class' => 'form-control', 'id' => 'isadmin', 'style' => 'width: 20px;','onchange'=>'isadminuser()'))}}
					{{ Form::hidden('isadminHide', null,  array('id' => 'isadminHide')) }}
					<label class="error">{{$errors->first("isadmin")}}</label>
				</div>
			</div>
		</div> 		
		@endif	
		<br/>
		<center>{{Form::submit('Guardar',['class' => 'btn btn-success action-button'])}}</center>
	{{ Form::close() }}

	<script>
		function isadminuser(){    
	       if($('#isadmin:checked').length === 1)
	       {
	           $('#isadminHide').val('1');
	       }else{
	          $('#isadminHide').val('0');
	       }       
	   	}
	</script>
 	
@stop
	
