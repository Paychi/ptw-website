@extends('layouts.layout_admon')

@section('titulo')
Ad-Contactos
@stop

@section('content_admon')

	<?php 
		$lista_filtro = array(0 => "Nombres &oacute; Apellidos", 1 => "Correo", 2 => "Telefono");
		$selected = array();
	?>

	{{Form::open(array('url'=>'sisadm/contactos', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
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
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th data-toggle="tooltip" title="Agregar Contacto" colspan="2"><center><a href="{{URL::to('/')}}/sisadm/addcontacto" class="text-center"><span class="glyphicon glyphicon-plus"></span></a></center></th>
			</thead>
			<tbody>
				@if($datos->count() == 0)
					<tr>
						<td colspan="5" class="text-center"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
					</tr>
				@else
					@foreach($datos as $item)
						<tr>
							<td>{{$item->nombre}}</td>
							<td>{{$item->apellido}}</td>
							<td>{{$item->correo}}</td>
							<td>{{$item->telefono}}</td>
							<td class="text-center"><a data-toggle="tooltip" title="Editar Contacto" onclick="editar('{{$item->id_contacto}}')" class="hid"><span class='glyphicon glyphicon-edit'></span></a></td>											
							<td class="text-center"><a data-toggle="tooltip" title="Eliminar Contacto" onclick="eliminar('{{$item->id_contacto}}')" class="hid"><span class='glyphicon glyphicon-trash'></span></a></td>
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
			window.location.href='{{URL::to('/')}}/sisadm/editcontacto/'+id_user;
		}
		function eliminar(id_user)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/sisadm/delatecontacto/'+id_user;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/sisadm/contactos';
		}
	</script>

@stop