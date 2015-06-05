@extends('layouts.layout_admon')

@section('titulo')
Ad-Noticias
@stop

@section('content_admon')

	{{Form::open(array('url'=>'admin/noticias', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro Titulo &oacute; Estracto'))}}
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
				<th>Titulo</th>
				<th>Estracto</th>
				<th>Fecha de la Noticia</th>
				<th>Fecha Registro</th>
				<th colspan="2"><center><a href="{{URL::to('/')}}/admin/addnoticia" class="btn btn-success">Nuevo</a></center></th>
			</thead>
			<tbody>
				@if($datos->count() == 0)
					<tr>
						<td colspan="6"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
					</tr>
				@else
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
				@endif
			</tbody>
		</table>
	</div>
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>
 	
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
		function MT()
		{
			window.location.href='{{URL::to('/')}}/admin/noticias';
		}
	</script>
@endsection
	
