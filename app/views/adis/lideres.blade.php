@extends('layouts.layout_adis')

@section('titulo')
Adis-Lideres
@stop

@section('content_adis')

	<?php 
		$lista_filtro = array(0 => "Nombre");
		$selected = array();
	?>

	{{Form::open(array('url'=>'adis/lideres', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Nombre'))}}
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
				<th>Comunidad que Labora</th>
				<th>Fecha Registro</th>
				<th colspan="2"><center><a data-toggle="tooltip" title="Agregar Líder" href="{{URL::to('/')}}/adis/addlider" class=""><span class="glyphicon glyphicon-plus"></span></a></center></th>
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
							<td>{{$item->nombre}}</td>
							<td>{{$item->comunidad->nombreComunidad}}</td>
							<td>{{$newfecha}}</td>
							<td><center><a data-toggle="tooltip" title="Editar Líder" onclick="editar('{{$item->id_lider}}')" class="hid"><span class="glyphicon glyphicon-edit"></span></a></center></td>
							<td><center><a data-toggle="tooltip" title="Deshabilitar Líder" onclick="eliminar('{{$item->id_lider}}')" class="hid"><span class="glyphicon glyphicon-trash"></span></a></center></td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>	
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>
	
	<script>
		function editar(id_lider)
		{
			window.location.href='{{URL::to('/')}}/adis/editlider/'+id_lider;
		}
		function eliminar(id_lider)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/adis/deletelider/'+ id_lider;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/adis/lideres';
		}
	</script>
 	
@stop
	
