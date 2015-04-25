@extends('layouts.layout_admon')

@section('titulo')
Ad-Colaboradores
@stop

@section('content_admon')

	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif
	 
	<table class="table table-hover">
		<thead>			
			<th>Logo</th>
			<th>Nombre</th>
			<th>Descripci&oacute;n</th>
			<th>Sitio Web</th>
			<th>Fecha de Afiliaci&oacute;n</th>
			<th colspan="2"><center><a href="{{URL::to('/')}}/admin/addcolaborador" class="btn btn-success">Nuevo</a></center></th>
		</thead>
		<tbody>
			@foreach($datos as $item)
				<?php 
					$fecha = $item->fecha_colaborador;
					$oldfecha = strtotime($fecha);
					$newfecha = date("d/m/Y",$oldfecha);
				?>

				<tr>
					<td>{{HTML::image('uploads/logo_colaboradores/'.$item->logo,'logo',array("class"=>"img_admonColaboradores"))}}</td>
					<td>{{$item->nombre}}</td>
					<td>{{$item->descripcion}}</td>
					<td>{{$item->sitio_web}}</td>
					<td>{{$newfecha}}</td>
					<td><a onclick="editar('{{$item->id_colaborador}}')" class="btn btn-primary">Editar</a></td>
					<td><a onclick="eliminar('{{$item->id_colaborador}}')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<center><?php echo $datos->links(); ?></center>
 	
 	<script>
		function editar(id_new)
		{
			window.location.href='{{URL::to('/')}}/admin/editcolaborador/'+id_new;
		}
		function eliminar(id_new)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/admin/delatecolaborador/'+id_new;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
	</script>
@endsection
	
