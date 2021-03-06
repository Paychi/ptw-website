@extends('layouts.layout_admon')

@section('titulo')
Ad-Perfil
@stop

@section('css')
@stop

@section('content_admon')

	{{Form::open(array('url'=>'sisadm/perfiles', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
		{{Form::input('text', 'filtro', Input::get('filtro'), array('class'=>'form-control', 'placeholder'=>'Filtro Nombre'))}}
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
							<td><a data-toggle="tooltip" title="Editar Perfil" onclick="editar('{{$item->id_perfil}}')" class="hid"><span class='glyphicon glyphicon-edit'></span></a></td>
							@if($item->estado == 0)						
								<td><a data-toggle="tooltip" title="Deshabilitar Perfil"onclick="habilitar('{{$item->id_perfil}}')" class="hid valid"><span class='glyphicon glyphicon-ok-circle'></a></td>
							@else
								<td><a data-toggle="tooltip" title="Deshabilitar Perfil" onclick="deshabilitar('{{$item->id_perfil}}')" class="hid invalid"><span class='glyphicon glyphicon-ban-circle'></span></a></td>
							@endif
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>

	<script>
		function editar(id_perfil)
		{
			window.location.href='{{URL::to('/')}}/sisadm/editperfil/'+id_perfil;
		}
		function deshabilitar(id_perfil)
		{
			if(confirm("Realmente usted quiere deshabilitar este perfil?"))
			{
				window.location.href='{{URL::to('/')}}/sisadm/deshabilitarperfil/'+id_perfil;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}
		function habilitar(id_perfil)
		{
			window.location.href='{{URL::to('/')}}/sisadm/habilitarperfil/'+id_perfil;
		}
		function MT()
		{
			window.location.href='{{URL::to('/')}}/sisadm/perfiles';
		}
	</script>

@stop
	
