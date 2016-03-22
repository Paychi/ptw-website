@extends('layouts.layout_admon')

@section('titulo')
Ad-Noticias
@stop

@section('content_admon')

	{{Form::open(array('url'=>'sisadm/noticias', 'method'=>'GET', 'role'=>'form', 'class'=>'form-inline text-center'))}}
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
				<th data-toggle="tooltip" title="Agregar Noticia" colspan="4"><center><a href="{{URL::to('/')}}/sisadm/addnoticia" class=""><span class="glyphicon glyphicon-plus"></span></a></center></th>
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
							<td><a data-toggle="tooltip" title="Editar Noticia" onclick="editar('{{$item->id_noticia}}')" class="hid"><span class='glyphicon glyphicon-edit'></span></a></td>
							<td><a data-toggle="tooltip" title="Deshabilitar Noticia" onclick="eliminar('{{$item->id_noticia}}')" class="hid"><span class='glyphicon glyphicon-trash'></span></a></td>
							@if($item->publicado == 0)
								<td><a onclick="confirm_publish('{{$item->id_noticia}}')" class="hid"><span class='glyphicon glyphicon-ok valid'></span></a></td>
							@else
								<td><a data-toggle="tooltip" title="Ocultar Noticia" onclick="confirm_unpublish('{{$item->id_noticia}}')" class="hid"><span class='glyphicon glyphicon-remove invalid'></span></a></td>
							@endif
							<td><a data-toggle="tooltip" title="Subir Imágenes" onclick="upload('{{$item->id_noticia}}')" class="hid"><span class='glyphicon glyphicon-open'></span></a></td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
	<center><?php echo $datos->appends(array("filtro"=>Input::get("filtro")))->links(); ?></center>

	<div class="modal fondomodal">
	    <div class="modal-content">
	        <div class="modal-header" style="margin-top:10px;">
	            <label>Confirmaci&oacute;n </label> 
	        </div>

	        <div class="modal-body">
	            Realmente usted quiere publicar la noticia?
	        </div>			

	        <div class="modal-footer">
	            <a class="btn invalid" onclick="cerrar()"><i class="glyphicon glyphicon-remove"></i></a>
	            <a class="btn valid" onclick="publish($('#id_new').val())"><i class="glyphicon glyphicon-ok"></i></a>
	        </div>
	    </div>
	    <input type='hidden' id='id_new' value="0">
	</div>

	<div class="modal fondomodal2">
	    <div class="modal-content">
	        <div class="modal-header" style="margin-top:10px;">
	            <label>Confirmaci&oacute;n </label> 
	        </div>

	        <div class="modal-body">
	            Realmente usted quiere ocultar la noticia?
	        </div>			

	        <div class="modal-footer">
	            <a class="btn invalid" onclick="cerrar2()"><i class="glyphicon glyphicon-remove"></i></a>
	            <a class="btn valid" onclick="unpublish($('#id_new2').val())"><i class="glyphicon glyphicon-ok"></i></a>
	        </div>
	    </div>
	    <input type='hidden' id='id_new2' value="0">
	</div>
 	
 	<script>
		function editar(id_new)
		{
			window.location.href='{{URL::to('/')}}/sisadm/editnoticia/'+id_new;
		}

		function upload(id_new)
		{
			window.location.href='{{URL::to('/')}}/sisadm/upload/'+id_new;
		}

		function eliminar(id_new)
		{
			if(confirm("Realmente usted quiere eliminar este registro?"))
			{
				window.location.href='{{URL::to('/')}}/sisadm/delatenoticia/'+id_new;
			}else
			{
				alert("La operación fue cancelada!");
			}			
		}

		function confirm_publish(id_new)
		{
			$('.fondomodal').show();			
        	$('#id_new').val(id_new);
		}

		function confirm_unpublish(id_new)
		{
			$('.fondomodal2').show();			
        	$('#id_new2').val(id_new);
		}

		function publish(id_new)
		{
			$.post("publishnoticia",
	        {paramidnew:id_new},
	        function(data) {
	        	var reponse = data.split("*");
	        	$('.fondomodal .modal-content .modal-body').addClass("text-center");
	        	if (reponse[2] == 'done')
	        		$('.fondomodal .modal-content .modal-body').html("<span class='alert alert-success'>"+reponse[1]+"</span>");
	        	if (reponse[2] == 'error')
	        		$('.fondomodal .modal-content .modal-body').html("<span class='alert alert-danger'>"+reponse[1]+"</span>");	        	
	        	$('.fondomodal .modal-content .modal-footer').html("<div class='preloader5 load-confirm'></div>");

	        	setTimeout(function() {window.location.href='{{URL::to('/')}}' + reponse[0];}, 5000);

	        });	
		}

		function unpublish(id_new)
		{
			$.post("unpublishnoticia",
	        {paramidnew:id_new},
	        function(data) {
	        	var reponse = data.split("*");
	        	$('.fondomodal2 .modal-content .modal-body').addClass("text-center");
	        	if (reponse[2] == 'done')
	        		$('.fondomodal2 .modal-content .modal-body').html("<span class='alert alert-success'>"+reponse[1]+"</span>");
	        	if (reponse[2] == 'error')
	        		$('.fondomodal2 .modal-content .modal-body').html("<span class='alert alert-danger'>"+reponse[1]+"</span>");
	        	$('.fondomodal2 .modal-content .modal-footer').html("<div class='preloader5 load-confirm'></div>");

	        	setTimeout(function() {window.location.href='{{URL::to('/')}}' + reponse[0];}, 5000);

	        });	
		}

		function cerrar(){
	        $('.fondomodal').hide();		
        	$('#id_new').val("0");
	    }

	    function cerrar2(){
	        $('.fondomodal2').hide();		
        	$('#id_new2').val("0");
	    }

		function MT()
		{
			window.location.href='{{URL::to('/')}}/sisadm/noticias';
		}
	</script>
@endsection
	
