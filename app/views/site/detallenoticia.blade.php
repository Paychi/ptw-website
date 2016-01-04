@extends('layouts.home')

@section('titulo')
{{$datos->titulo}}
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_detalle.png','detalle',array("class"=>"img-header"))}}
	</div>
@stop

@section('javascript')
	<script src="{{URL::to('/')}}/js/hidden_menu_left.js"></script>
@stop

@section('css')
	{{ HTML::style('css/style-detalle_notocia.css'); }}
@stop

@section('content')
	
	<div class="contenedor_post">	
		<section class = "col-lg-12">
			<center>
				<div class="post">	
					<figure class="miniatura">
						{{HTML::image("uploads/noticias/$datos->imagen",'noticia',array("class"=>"wp-post-image img-rounded"))}}
					</figure>
					<div class="extracto">
						<header class="entry-header">
							<h2 class="entry-title">
								{{$datos->titulo}}
							</h2>
						</header>
						<div class="entry-summary">
							<p class="parrafos_noticias">
								{{ nl2br($datos->descripcion)}}
							</p>
						</div>
					</div>
				</div>
			</center/>
		</section>
	</div>
@stop

@section('content-der')
@stop
