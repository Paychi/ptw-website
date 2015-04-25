@extends('layouts.layout_admon')

@section('titulo')
Ad-Noticias
@stop

@section('content_admon')

	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif
	 
	<table class="table table-hover">
		<thead>
			<th>Titulo</th>
			<th>Estracto</th>
			<th>Fecha de la Noticia</th>
			<th>Fecha Registro</th>
			<th colspan="2"><center><a href="{{URL::to('/')}}/admin/addnoticia" class="btn btn-success">Nuevo</a></center></th>
		</thead>
		<tbody>
			@foreach($datos as $item)
				<?php 
					$fecha = $item->fecha_noticia;
					$oldfecha = strtotime($fecha);
					$newfecha = date("d/m/Y",$oldfecha);

					$fecha2 = $item->created_at;
					$oldfecha2 = strtotime($fecha2);
					$newfecha2 = date("d/m/Y H:i:s",$oldfecha2);
				?>
				<tr>
					<td>{{$item->titulo}}</td>
					<td>{{$item->estracto}}</td>
					<td>{{$newfecha}}</td>
					<td>{{$newfecha2}}</td>
					<td><a onclick="editar('{{$item->id_noticia}}')" class="btn btn-primary">Editar</a></td>
					<td><a onclick="eliminar('{{$item->id_noticia}}')" class="btn btn-danger">Eliminar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<center><?php echo $datos->links(); ?></center>
 	
 	<script>
		function editar(id_new)
		{
			window.location.href='{{URL::to('/')}}/admin/editnoticia/'+id_new;
		}
		function eliminar(id_new)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/admin/delatenoticia/'+id_new;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
	</script>
@endsection
	
