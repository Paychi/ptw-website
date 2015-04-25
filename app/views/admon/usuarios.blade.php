@extends('layouts.layout_admon')

@section('titulo')
Ad-Usuarios
@stop

@section('content_admon')

	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif

	<table class="table table-hover">
		<thead>
			<th>Nombre Completo</th>
			<th>Nombre de Usuario</th>
			<th>Perfil de Usuario</th>
			<th>Fecha Registro</th>
			<th colspan="2"><center><a href="{{URL::to('/')}}/admin/addusuario" class="btn btn-success">Nuevo</a></center></th>
		</thead>
		<tbody>
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
					<td><a onclick="editar('{{$item->id_usuario}}')" class="btn btn-primary">Editar</a></td>
					<td><a onclick="eliminar('{{$item->id_usuario}}')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<center><?php echo $datos->links(); ?></center>
	
	<script>
		function editar(id_user)
		{
			window.location.href='{{URL::to('/')}}/admin/editusuario/'+id_user;
		}
		function eliminar(id_user)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/admin/delateusuario/'+id_user;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
	</script>
 	
@stop
	
