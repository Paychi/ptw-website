@extends('layouts.layout_colaborador')

@section('titulo')
Col-Ajustes
@stop

@section('css')
<style type="text/css">
	.postcambio{
		margin: 10px;
	}
</style>
@stop

@section('javascript')
@stop

@section('content_colaborador')

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

	<div class="row">
		<div class="col-lg-12 text-center">
			<label class="label label-info" style="font-size: 0.9em;">{{$colaborador->nombre}}</label>
		</div>		
	</div>

	<div class="col-lg-12 modal-content postcambio">
		@if(Session::has('mensajeNombre'))
			<br/>
			<div class="alert alert-success text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeNombre')}}</strong>
			</div>
		@endif
		@if(Session::has('mensajeNombreError'))
			<br/>
			<div class="alert alert-danger text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeNombreError')}}</strong>
			</div>
		@endif
		<label class="error">{{$errors->first("nombre")}}</label>
		<div class="col-md-12 modal-header">
			<span>Nombre</span>
		</div>
		<div class="col-md-12 modal-body">
			<span>{{$colaborador->nombre}}</span>
		</div>
		<div class="col-md-12 modal-footer">
			<a onclick="cambiar(1)" class="btn btn-primary btnAct"><span>Cambiar</span></a>
		</div>
	</div>

	<div class="col-lg-12 modal-content postcambio">
		@if(Session::has('mensajeDescripcion'))
			<br/>
			<div class="alert alert-success text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeDescripcion')}}</strong>
			</div>
		@endif
		@if(Session::has('mensajeDescripcionError'))
			<br/>
			<div class="alert alert-danger text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeDescripcionError')}}</strong>
			</div>
		@endif
		<label class="error">{{$errors->first("descripcion")}}</label>
		<div class="col-md-12 modal-header">
			<span>Descripci&oacute;n</span>
		</div>
		<div class="col-md-12 modal-body">
			<span>{{$colaborador->descripcion}}</span>
		</div>
		<div class="col-md-12 modal-footer">
			<a onclick="cambiar(2)" class="btn btn-primary btnAct"><span>Cambiar</span></a>
		</div>
	</div>		

	<div class="col-lg-12 modal-content postcambio">
		@if(Session::has('mensajeLogo'))
			<br/>
			<div class="alert alert-success text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeLogo')}}</strong>
			</div>
		@endif
		@if(Session::has('mensajeLogoError'))
			<br/>
			<div class="alert alert-danger text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeLogoError')}}</strong>
			</div>
		@endif
		<label class="error">{{$errors->first("imagen_logo")}}</label>
		<div class="col-md-12 modal-header">
			<span>Logo</span>
		</div>
		<div class="col-md-12 modal-body">
			{{HTML::Image("uploads/logo_colaboradores/$colaborador->logo",'logo_colaborador',array("class"=>"img-thumbnail"))}}
		</div>
		<div class="col-md-12 modal-footer">
			<a onclick="cambiar(3)" class="btn btn-primary btnAct"><span>Cambiar</span></a>
		</div>
	</div>

	<div class="col-lg-12 modal-content postcambio">
		@if(Session::has('mensajeWebsite'))
			<br/>
			<div class="alert alert-success text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeWebsite')}}</strong>
			</div>
		@endif
		@if(Session::has('mensajeWebsiteError'))
			<br/>
			<div class="alert alert-danger text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeWebsiteError')}}</strong>
			</div>
		@endif
		<label class="error">{{$errors->first("website")}}</label>
		<div class="col-md-12 modal-header">
			<span>Sitio Web</span>
		</div>
		<div class="col-md-12 modal-body">
			<span>{{$colaborador->sitio_web}}</span>
		</div>
		<div class="col-md-12 modal-footer">
			<a onclick="cambiar(4)" class="btn btn-primary btnAct"><span>Cambiar</span></a>
		</div>
	</div>		

	<div class="col-lg-12 modal-content postcambio">
		@if(Session::has('mensajeAbreviatura'))
			<br/>
			<div class="alert alert-success text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeAbreviatura')}}</strong>
			</div>
		@endif
		@if(Session::has('mensajeAbreviaturaError'))
			<br/>
			<div class="alert alert-danger text-center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>{{Session::get('mensajeAbreviaturaError')}}</strong>
			</div>
		@endif
		<label class="error">{{$errors->first("abreviatura")}}</label>
		<div class="col-md-12 modal-header">
			<span>Abreviatura</span>
		</div>
		<div class="col-md-12 modal-body">
			<span>{{$colaborador->abreviatura}}</span>
		</div>
		<div class="col-md-12 modal-footer">
			<a onclick="cambiar(5)" class="btn btn-primary btnAct"><span>Cambiar</span></a>
		</div>
	</div>		
	
	<!--  Fondo   -->
	<div style="display:none;width:100%;height:100%;opacity:0.9;" class="modal-backdrop" id="div_loadfilefondo">
	</div>
	
	<!--  Formulario Actualizar Nombre   -->
	<div style="display:none;width:100%;height:100%;" class="modal container" id="div_nombre">
		<div class="container modal-content" style="margin-top:20px;">
			{{ Form::open(array('url' => '/colaborador/cambionombre','method'=>'post','class'=>'', 'name'=>'formajustenombre','id'=>'', 'files' => true)) }}
				<div class="modal-title" style="margin-top:10px;">
					<label>Actualizar</label> <label> | </label> <label> Nombre </label>
					<a onclick="cerrar(1)" class="close" id="cancelar">X</a>
				</div>
				
				<div class="modal-body">
					<label class="control-label">Nombre</label>
					{{ Form::text('nombre',$colaborador->nombre, array('class' => 'form-control', 'required') ) }}	
				</div>			
				
				<div class="modal-footer">
					{{Form::submit('Guardar',['class' => 'btn btn-success action-button', 'style' => 'float:left;'])}}
					<p class="help-block">Se actualizar&aacute; la informaci&oacute;n brindada.</p>
				</div>

			{{ Form::close() }}
		</div>
	</div>

	<!--  Formulario Actualizar Descripcion   -->
	<div style="display:none;width:100%;height:100%;" class="modal container" id="div_descripcion">
		<div class="container modal-content" style="margin-top:20px;">
			{{ Form::open(array('url' => '/colaborador/cambiodescripcion','method'=>'post','class'=>'', 'name'=>'formajustenombre','id'=>'', 'files' => true)) }}
				<div class="modal-title" style="margin-top:10px;">
					<label>Actualizar</label> <label> | </label> <label> Descripci&oacute;n </label>
					<a onclick="cerrar(2)" class="close" id="cancelar">X</a>
				</div>
				
				<div class="modal-body">
					<label class="control-label">Descripci&oacute;n</label>
					{{Form::textarea('descripcion',$colaborador->descripcion, array('class' => 'form-control', 'rows' => '3', 'required'))}}
				</div>			
				
				<div class="modal-footer">
					{{Form::submit('Guardar',['class' => 'btn btn-success action-button', 'style' => 'float:left;'])}}
					<p class="help-block">Se actualizar&aacute; la informaci&oacute;n brindada.</p>
				</div>

			{{ Form::close() }}
		</div>
	</div>

	<!--  Formulario Actualizar Logo   -->
	<div style="display:none;width:100%;height:100%;" class="modal container" id="div_logo">
		<div class="container modal-content" style="margin-top:20px;">
			{{ Form::open(array('url' => '/colaborador/cambiologo','method'=>'post','class'=>'', 'name'=>'formbanners','id'=>'', 'files' => true)) }}
				<div class="modal-title" style="margin-top:10px;">
					<label>Actualizar</label> <label> | </label> <label> Logo </label>
					<a onclick="cerrar(3)" class="close" id="cancelar">X</a>
				</div>
				
				<div class="modal-body">
					<div class="modal-header">
						{{HTML::Image("uploads/logo_colaboradores/$colaborador->logo",'logo',array("class"=>"", "id"=>"img_logo"))}}
					</div>
					Aqui subir archivo...
					<div class="row">						
						<div class="col-lg-12">
							<div class="input-group" id = "loadimg">
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										+ {{Form::file('imagen_logo',['id' => 'archivo', 'data-preview-file-type' => 'any', 'accept' => 'image/*'])}}
									</span>
								</span>
								<input type="text" class="form-control" id="text_file" readonly></input>						
							</div>
						</div>					
					</div>

					<span id="infoNombre"></span>
					<span id="infoTamaño"></span>

					Formato: png y jpg <br /> Dimenciones: 470 x 440 maximo y 64 x 64 minimo <br /> Tama&ntilde;o: maximo 2 MB
					
				</div>			
				
				<div class="modal-footer">
					{{Form::submit('Guardar',['class' => 'btn btn-success action-button', 'style' => 'float:left;'])}}
					<p class="help-block">Solo puede subir un archivo y reemplazar&aacute; al existente.</p>
				</div>

			{{ Form::close() }}
		</div>
	</div>

	<!--  Formulario Actualizar Sitio Web   -->
	<div style="display:none;width:100%;height:100%;" class="modal container" id="div_website">
		<div class="container modal-content" style="margin-top:20px;">
			{{ Form::open(array('url' => '/colaborador/cambiowebsite','method'=>'post','class'=>'', 'name'=>'formajustenombre','id'=>'', 'files' => true)) }}
				<div class="modal-title" style="margin-top:10px;">
					<label>Actualizar</label> <label> | </label> <label> Sitio Web </label>
					<a onclick="cerrar(4)" class="close" id="cancelar">X</a>
				</div>
				
				<div class="modal-body">
					<label class="control-label">Sitio Web</label>
					{{ Form::text('website',$colaborador->sitio_web, array('class' => 'form-control', 'required') ) }}
				</div>			
				
				<div class="modal-footer">
					{{Form::submit('Guardar',['class' => 'btn btn-success action-button', 'style' => 'float:left;'])}}
					<p class="help-block">Se actualizar&aacute; la informaci&oacute;n brindada.</p>
				</div>

			{{ Form::close() }}
		</div>
	</div>

	<!--  Formulario Actualizar Abreviatura   -->
	<div style="display:none;width:100%;height:100%;" class="modal container" id="div_abreviatura">
		<div class="container modal-content" style="margin-top:20px;">
			{{ Form::open(array('url' => '/colaborador/cambioabreviatura','method'=>'post','class'=>'', 'name'=>'formajustenombre','id'=>'', 'files' => true)) }}
				<div class="modal-title" style="margin-top:10px;">
					<label>Actualizar</label> <label> | </label> <label> Abreviatura </label>
					<a onclick="cerrar(5)" class="close" id="cancelar">X</a>
				</div>
				
				<div class="modal-body">
					<label class="control-label">Abreviatura</label>
					{{ Form::text('abreviatura',$colaborador->abreviatura, array('class' => 'form-control', 'required') ) }}
				</div>			
				
				<div class="modal-footer">
					{{Form::submit('Guardar',['class' => 'btn btn-success action-button', 'style' => 'float:left;'])}}
					<p class="help-block">Se actualizar&aacute; la informaci&oacute;n brindada.</p>
				</div>

			{{ Form::close() }}
		</div>
	</div>

	<script>	
		function cambiar(accion)
		{
			$("#div_loadfilefondo").toggle("slow");
			$("#cuerpo").addClass("remove_scroll");
			$("#div_loadfile").addClass("add_scroll");
			$(".btnAct").addClass("disabled");

			switch(accion)
			{
				case 1: 
					$("#div_nombre").toggle("slow");
				break;
				case 2: 
					$("#div_descripcion").toggle("slow");
				break;
				case 3: 
					$("#div_logo").toggle("slow");
				break;
				case 4: 
					$("#div_website").toggle("slow");
				break;
				case 5: 
					$("#div_abreviatura").toggle("slow");
				break;
				default: alert("Opci&oacite;n Incorrecta..");
				break;
			}
		}	
		
		function cerrar(accion)
		{
			$("#div_loadfilefondo").hide("fade");
			$("#div_loadfile").removeClass("add_scroll");
			$("#cuerpo").removeClass("remove_scroll");
			$(".btnAct").removeClass("disabled");

			switch(accion)
			{
				case 1: 
					$("#div_nombre").hide("fade");
				break;
				case 2: 
					$("#div_descripcion").hide("fade");
				break;
				case 3: 
					$("#div_logo").hide("fade");
					var objeto = $('#archivo');
			        objeto.replaceWith(objeto.val('').clone());
			        objeto.val(null);
			        $('#text_file').val(null);
				break;
				case 4: 
					$("#div_website").hide("fade");
				break;
				case 5: 
					$("#div_abreviatura").hide("fade");
				break;
				default: alert("Opci&oacite;n Incorrecta..");
				break;
			}

		}
	</script>
 	
@stop
	
