@extends('layouts.layout_adis')

@section('titulo')
Adis-Colaboradores
@stop

@section('content_adis')

	{{Form::open(array('url'=>'adis/colaboradores', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro Nombre &oacute; Descripci&oacute;n'))}}
		{{Form::input('submit', null, 'Filtrar', array('class'=>'btn btn-default'))}}
		{{Form::input('button', null, 'Mostrar Todos', array('class'=>'btn btn-default', 'onclick'=>'MT()'))}}
	{{Form::close()}}

	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif
	 
	<table class="table table-hover">
		<a href="{{URL::to('/')}}/adis/addcolaborador" class="btn btn-success" style="margin-top:5px;">Nuevo</a>
		<thead>			
			<th>Logo</th>
			<th>Nombre</th>
			<th>Descripci&oacute;n</th>
			<th>Sitio Web</th>
			<th>Fecha de Afiliaci&oacute;n</th>
		</thead>
		<tbody>
			@if($datos->count() == 0)
				<tr>
					<td colspan="5"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
				</tr>
			@else
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
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>
 	
 	<script>
		function MT()
		{
			window.location.href='{{URL::to('/')}}/adis/colaboradores';
		}
	</script>
@endsection
	
