@extends('layouts.layout_admon')

@section('titulo')
Ad-Banners
@stop

@section('css')
@stop

@section('javascript')
@stop

@section('content_admon')

	@if(Session::has('mensaje'))
		<div class="text-info">
			<label>{{Session::get('mensaje')}}</label>
		</div>
	@endif

	<div class="table-responsive" style="padding:10px; margin: 5px;">	
		<table class="table table-hover">
			<thead>
				<th>Vista</th>
				<th>Banner</th>
				<th><center>Acci&oacute;n</center></th>
			</thead>
			<tbody>
				<tr>
					<td>Inicio</td>
					<td>{{HTML::Image('uploads/header_site/banner_inicio.png','inicio_banner',array("class"=>"img-header"))}}</td>
					<td><center><a onclick="actualizar(1)" class="btn btn-primary btnAct">Actualizar</a></center></td>
				</tr>
				<tr>
					<td>Waslala</td>
					<td>{{HTML::Image('uploads/header_site/banner_waslala.png','waslala_banner',array("class"=>"img-header"))}}</td>
					<td><center><a onclick="actualizar(2)" class="btn btn-primary btnAct">Actualizar</a></center></td>
				</tr>
				<tr>
					<td>Lo que somos</td>
					<td>{{HTML::Image('uploads/header_site/banner_about.png','about_banner',array("class"=>"img-header"))}}</td>
					<td><center><a onclick="actualizar(3)" class="btn btn-primary btnAct" >Actualizar</a></center></td>
				</tr>
				<tr>
					<td>Colaboradores</td>
					<td>{{HTML::Image('uploads/header_site/banner_colaboradores.png','colaboradores_banner',array("class"=>"img-header"))}}</td>
					<td><center><a onclick="actualizar(4)" class="btn btn-primary btnAct">Actualizar</a></center></td>
				</tr>
				<tr>
					<td>Detalle Noticia</td>
					<td>{{HTML::Image('uploads/header_site/banner_detalle.png','detalle_banner',array("class"=>"img-header"))}}</td>
					<td><center><a onclick="actualizar(5)" class="btn btn-primary btnAct" >Actualizar</a></center></td>
				</tr>
				<tr>
					<td>Resultado Busqueda Noticia</td>
					<td>{{HTML::Image('uploads/header_site/banner_search.png','search_banner',array("class"=>"img-header"))}}</td>
					<td><center><a onclick="actualizar(6)" class="btn btn-primary btnAct" >Actualizar</a></center></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div style="display:none;width:100%;height:100%;opacity:0.9;" class="modal-backdrop" id="div_loadfilefondo">
	</div>
	
	<div style="display:none;width:100%;height:100%;" class="modal container" id="div_loadfile">
		<div class="container modal-content" style="margin-top:20px;">
			{{ Form::open(array('url' => '/admin/confbanners','method'=>'post','class'=>'', 'name'=>'formbanners','id'=>'', 'files' => true)) }}
				<input type="hidden" name="nombre_banner" id="id_nombre_banner" />
				<div class="modal-title" style="margin-top:10px;">
					<label>Actualizar Banner</label> <label> | </label> <label id="cabecera"></label>
					<a onclick="cerrar()" class="close" id="cancelar">X</a>
				</div>
				
				<div class="modal-body">
					<div class="modal-header">
						{{HTML::Image('','banner',array("class"=>"img-header", "id"=>"img_banner"))}}
					</div>
					Aqui subir archivo...
					<div class="row">						
						<div class="col-lg-12">
							<div class="input-group" id = "load_img">
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										+ {{Form::file('imagen_banner',['id' => 'archivo', 'data-preview-file-type' => 'any', 'accept' => 'image/*'])}}
									</span>
								</span>
								<input type="text" class="form-control" id="text_file" readonly></input>						
							</div>
						</div>					
					</div>

					<span id="infoNombre"></span>
					<span id="infoTamaño"></span>

					Formato: png y jpg <br /> Dimenciones: 4500 x 600 maximo y 1300 x 250 minimo <br /> Tama&ntilde;o: maximo 2 MB
					
				</div>			
				
				<div class="modal-footer">
					{{Form::submit('Guardar',['class' => 'btn btn-success action-button', 'style' => 'float:left;'])}}
					<p class="help-block">Solo puede subir un archivo y reemplazar&aacute; al existente.</p>
				</div>

			{{ Form::close() }}
		</div>
	</div>
	<script>		
		function actualizar(id_banner)
		{
			$("#div_loadfile").toggle("slow");
			$("#div_loadfilefondo").toggle("slow");
			$("#cuerpo").addClass("remove_scroll");
			$("#div_loadfile").addClass("add_scroll");;
			$(".btnAct").addClass("disabled");
			switch(id_banner)
			{
				case 1: 
					$("#cabecera").text("Inicio"); 
					document.getElementById("img_banner").src = "{{URL::to('/')}}/uploads/header_site/banner_inicio.png";	
					$("#id_nombre_banner").val("banner_inicio.png");
				break;
				case 2: 
					$("#cabecera").text("Waslala");				
					document.getElementById("img_banner").src = "{{URL::to('/')}}/uploads/header_site/banner_waslala.png";
					$("#id_nombre_banner").val("banner_waslala.png");
				break;
				case 3: 
					$("#cabecera").text("Lo que somos");
					document.getElementById("img_banner").src = "{{URL::to('/')}}/uploads/header_site/banner_about.png";
					$("#id_nombre_banner").val("banner_about.png");
				break;
				case 4: 
					$("#cabecera").text("Colaboradores");
					document.getElementById("img_banner").src = "{{URL::to('/')}}/uploads/header_site/banner_colaboradores.png";
					$("#id_nombre_banner").val("banner_colaboradores.png");
				break;
				case 5: 
					$("#cabecera").text("Detalle Noticia");
					document.getElementById("img_banner").src = "{{URL::to('/')}}/uploads/header_site/banner_detalle.png";
					$("#id_nombre_banner").val("banner_detalle.png");
				break;
				case 6: 
					$("#cabecera").text("Resultado Busqueda Noticia");
					document.getElementById("img_banner").src = "{{URL::to('/')}}/uploads/header_site/banner_search.png";
					$("#id_nombre_banner").val("banner_search.png");
				break;
				default: alert("Opci&oacite;n Incorrecta..");
				break;
			}
			//window.location.href='{{URL::to('/')}}/admin/actbanner/'+id_Banner;
		}
		
		function cerrar()
		{
			var objeto = $('#archivo');
	        objeto.replaceWith(objeto.val('').clone());
	        objeto.val(null);
	        $('#text_file').val(null);

			$("#div_loadfile").hide("fade");
			$("#div_loadfilefondo").hide("fade");
			$("#div_loadfile").removeClass("add_scroll");
			$("#cuerpo").removeClass("remove_scroll");
			$(".btnAct").removeClass("disabled");
		}
	</script>
 	
@stop
	
