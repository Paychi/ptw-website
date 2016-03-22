@extends('layouts.layout_admon')

@section('titulo')
Ad-Usuarios
@stop

@section('content_admon')

	<?php 
		$lista_filtro = array(0 => "Nombres &oacute; Apellidos", 1 => "Nombre de Usuario", 2 => "Perfil de Usuario");
		$selected = array();
	?>

	{{Form::open(array('url'=>'sisadm/usuarios', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::select('tipo', $lista_filtro, $selected, array('class' => 'form-control'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro'))}}
		{{Form::input('submit', null, 'Filtrar', array('class'=>'btn btn-default'))}}
		{{Form::input('button', null, 'Mostrar Todos', array('class'=>'btn btn-default', 'onclick'=>'MT()'))}}
	{{Form::close()}}

	@if(Session::has('mensaje'))
		<br/>
		<div class="alert alert-success text-center">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>{{Session::get('mensaje')}}</strong>
		</div>
	@endif

	@if(Session::has('mensajeError'))
		<br/>
		<div class="alert alert-danger text-center">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>{{Session::get('mensajeError')}}</strong>
		</div>
	@endif

	<div class="table-responsive" style="padding:10px; margin: 5px;">	
		<table class="table table-hover">
			<thead>
				<th>Nombre Completo</th>
				<th>Nombre de Usuario</th>
				<th>Perfil de Usuario</th>
				<th>Fecha Registro</th>
				<th colspan="2"><center><a data-toggle="tooltip" title="Agregar Usuario" href="{{URL::to('/')}}/sisadm/addusuario" class=""><span class='glyphicon glyphicon-plus'></span></a></center></th>
			</thead>
			<tbody>
				@if($datos->count() == 0)
					<tr>
						<td colspan="6"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
					</tr>
				@else
					@foreach($datos as $item)
						<?php
							$fecha = $item->created_at;
							$oldfecha = strtotime($fecha);
							$newfecha = date("d/m/Y H:i:s",$oldfecha);
						?>

						<tr>
							<td>{{$item->nombres.' '.$item->apellidos}}</td>
							<td>{{$item->nombre_usuario}}</td>
							<td>{{$item->perfil->nombre}}</td>
							<td>{{$newfecha}}</td>
							<td><a data-toggle="tooltip" title="Editar Usuario" onclick="editar('{{$item->id_usuario}}')" class="hid"><span class='glyphicon glyphicon-edit'></span></a></td>
							<td><a data-toggle="tooltip" title="Deshabilitar Usuario" onclick="eliminar('{{$item->id_usuario}}')" class="hid"><span class='glyphicon glyphicon-trash'></span></a></td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>	
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>
	
	<script>
		function editar(id_user)
		{
			window.location.href='{{URL::to('/')}}/sisadm/editusuario/'+id_user;
		}
		function eliminar(id_user)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/sisadm/delateusuario/'+id_user;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/sisadm/usuarios';
		}
	</script>
 	
@stop
	
