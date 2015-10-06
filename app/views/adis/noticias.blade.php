@extends('layouts.layout_adis')

@section('titulo')
Adis-Noticias
@stop

@section('content_adis')

	{{Form::open(array('url'=>'adis/noticias', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro Titulo &oacute; Estracto'))}}
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
				<th>Titulo</th>
				<th>Estracto</th>
				<th>Fecha de la Noticia</th>
				<th>Fecha Registro</th>
				<th><center><a href="{{URL::to('/')}}/adis/addnoticia" class="btn btn-success">Nuevo</a></center></th>
			</thead>
			<tbody>
				@if($datos->count() == 0)
					<tr>
						<td colspan="5"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
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
			window.location.href='{{URL::to('/')}}/adis/editnoticia/'+id_new;
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/adis/noticias';
		}
	</script>
@endsection
	
