@extends('layouts.home')

@section('titulo')
{{$dato}}
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('img/waslala.png','waslala',array("class"=>"img-header"))}}
	</div>
@stop

@section('javascript')
	<script src="{{URL::to('/')}}/js/hidden_menu_left.js"></script>
@stop

@section('css')
	{{ HTML::style('css/style-detalle_notocia.css'); }}
@stop

@section('content')
	<h1>Descripcion de: {{$dato}}</h1>
	<div class="contenedor_post">	
		<section class = "col-lg-12">
			<center>
				<div class="post">	
					<figure class="miniatura">
						{{HTML::image('img/test.png','noticia',array("class"=>"wp-post-image"))}}
					</figure>
					<div class="extracto">
						<header class="entry-header">
							<h2 class="entry-title">
								{{$dato}}
							</h2>
						</header>
						<div class="entry-summary">
							<p>
								Esta es el contenido de la descripcion de la noticia: {{$dato}}
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
