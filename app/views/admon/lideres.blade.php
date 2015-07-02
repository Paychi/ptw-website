@extends('layouts.layout_admon')

@section('titulo')
Ad-Lideres
@stop

@section('content_admon')

	<?php 
		$lista_filtro = array(0 => "Nombre");
		$selected = array();
	?>

	{{Form::open(array('url'=>'admin/lideres', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::select('tipo', $lista_filtro, $selected, array('class' => 'form-control'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro'))}}
		{{Form::input('submit', null, 'Filtrar', array('class'=>'btn btn-default'))}}
		{{Form::input('button', null, 'Mostrar Todos', array('class'=>'btn btn-default', 'onclick'=>'MT()'))}}
	{{Form::close()}}

	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif

	<div class="table-responsive" style="padding:10px; margin: 5px;">	
		<table class="table table-hover">
			<thead>
				<th>Nombre Completo</th>
				<th>Fecha Registro</th>
				<th colspan="2"><center><a href="{{URL::to('/')}}/admin/addlider" class="btn btn-success">Nuevo</a></center></th>
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
							<td>{{$newfecha}}</td>
							<td><a onclick="editar('{{$item->id_lider}}')" class="btn btn-primary">Editar</a></td>
							<td><a onclick="eliminar('{{$item->id_lider}}')" class="btn btn-danger">Eliminar</a></td>
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
			window.location.href='{{URL::to('/')}}/admin/editlider/'+id_lider;
		}
		function eliminar(id_lider)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/admin/deletelider/'+ id_lider;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/admin/lideres';
		}
	</script>
 	
@stop
	
