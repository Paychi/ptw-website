@extends('layouts.home')

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_inicio.png','inicio',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		<ul class="nav nav-pills nav-stacked">		
			@foreach($datos as $dato)
				<li><a href='#noticia{{$dato->id_noticia}}'><span>{{$dato->titulo}}</span></a></li>
			@endforeach
		</ul>
	</div>
@stop

@section('content')
	@foreach($datos as $dato)
		<?php
			setlocale(LC_TIME,'spanish');
			$fecha=strtotime($dato->fecha_noticia);
			$mes=date("m",$fecha);
			$fecha_noticia= date("d",$fecha) ." de ". strftime("%B",mktime(0,0,0,$mes,1,2000)) ." del ". date("Y",$fecha);
		 ?>
		<div class="contenedor_post">	
			<section id="noticia{{$dato->id_noticia}}" class = "col-lg-12">
				<center>
					<div class="post">	
						<figure class="miniatura">
							<a href="{{URL::to('/')}}/es/detalle/{{$dato->titulo}}">{{HTML::image("uploads/noticias/$dato->imagen",'noticia',array("class"=>"wp-post-image img-thumbnail"))}}</a>
						</figure>
						<div class="extracto">
							<p class="fecha_post">{{$fecha_noticia}}</p>
							<header class="entry-header">
								<h2 class="entry-title">
									<a href="{{URL::to('/')}}/es/detalle/{{$dato->titulo}}">{{$dato->titulo}}</a>
								</h2>
							</header>
							<div class="entry-summary">
								<p>
									{{$dato->estracto}}
								</p>
							</div>
						</div>
					</div>
				</center/>
			</section>
		</div>
	@endforeach 
	<center><?php echo $datos->links(); ?></center>
@stop

@section('content-der')
@stop
