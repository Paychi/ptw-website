@extends('layouts.layout_admon')

@section('titulo')
Ad-Colaboradores
@stop

@section('content_admon')

	{{Form::open(array('url'=>'admin/colaboradores', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro Nombre &oacute; Descripci&oacute;n'))}}
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
				<th>Logo</th>
				<th>Nombre</th>
				<th>Descripci&oacute;n</th>
				<th>Sitio Web</th>
				<th>Fecha de Afiliaci&oacute;n</th>
				<th colspan="2"><center><a href="{{URL::to('/')}}/admin/addcolaborador" class=""><span class="glyphicon glyphicon-plus"></span></a></center></th>
			</thead>
			<tbody>
				@if($datos->count() == 0)
					<tr>
						<td colspan="7"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
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
							<td><a onclick="editar('{{$item->id_colaborador}}')" class="hid"><span class='glyphicon glyphicon-edit'></span></a></td>
							<td><a onclick="eliminar('{{$item->id_colaborador}}')" class="hid"><span class='glyphicon glyphicon-trash'></span></a></td>
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
		function MT()
		{
			window.location.href='{{URL::to('/')}}/admin/colaboradores';
		}
	</script>
@endsection
	
