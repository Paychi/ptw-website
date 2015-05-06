@extends('layouts.layout_admon')

@section('titulo')
Ad-Perfil
@stop

@section('css')
@stop

@section('content_admon')

	{{Form::open(array('url'=>'admin/perfiles', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro Nombre'))}}
		{{Form::input('submit', null, 'Filtrar', array('class'=>'btn btn-default'))}}
		{{Form::input('button', null, 'Mostrar Todos', array('class'=>'btn btn-default', 'onclick'=>'MT()'))}}
	{{Form::close()}}

 	@if(Session::has('mensaje'))
		<div class="alert-box success">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif
	 
	<table class="table table-hover">
		<thead>			
			<th>Id</th>
			<th>Nombre</th>
			<th>Descripci&oacute;n</th>
			<th colspan="2"></th>
		</thead>
		<tbody>
			@if($datos->count() == 0)
				<tr>
					<td colspan="5"><center><label class="label label-danger" style="font-size: 0.9em;">No hay Registros</label></center></td>
				</tr>
			@else
				@foreach($datos as $item)
					<tr>
						<td>{{$item->id_perfil}}</td>
						<td>{{$item->nombre}}</td>
						<td>{{$item->descripcion}}</td>
						<td><a onclick="editar('{{$item->id_perfil}}')" class="btn btn-primary">Editar</a></td>
						@if($item->estado == 0)						
							<td><a onclick="habilitar('{{$item->id_perfil}}')" class="btn btn-success">Habilitar</a></td>
						@else
							<td><a onclick="deshabilitar('{{$item->id_perfil}}')" class="btn btn-danger">Deshabilitar</a></td>
						@endif
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>

	<script>
		function editar(id_perfil)
		{
			window.location.href='{{URL::to('/')}}/admin/editperfil/'+id_perfil;
		}
		function deshabilitar(id_perfil)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/admin/deshabilitarperfil/'+id_perfil;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
		function habilitar(id_perfil)
		{
			window.location.href='{{URL::to('/')}}/admin/habilitarperfil/'+id_perfil;
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/admin/perfiles';
		}
	</script>

@stop
	
