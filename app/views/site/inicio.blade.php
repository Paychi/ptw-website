@extends('layouts.home')

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('img/inicio.png','inicio',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		<ul class="nav nav-pills nav-stacked">			
			@for($i=0;$i<5;$i++)
				<li><a href='#noticia{{$i+1}}'><span>Titulo {{$i+1}}</span></a></li>
			@endfor
		</ul>
	</div>
@stop

@section('content')
@for($i=0;$i<5;$i++)
	<div class="contenedor_post">	
		<section id="noticia{{$i+1}}" class = "col-lg-12">
			<center>
				<div class="post">	
					<figure class="miniatura">
						<a href="{{URL::to('/')}}/es/detalle/Titulo {{$i+1}}">{{HTML::image('img/test.png','noticia',array("class"=>"wp-post-image"))}}</a>
					</figure>
					<div class="extracto">
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="{{URL::to('/')}}/es/detalle/Titulo {{$i+1}}">Titulo {{$i+1}}</a>
							</h2>
						</header>
						<div class="entry-summary">
							<p>
								Esta es el estracto de la descripcion de la noticia No. {{$i+1}}
							</p>
						</div>
					</div>
				</div>
			</center/>
		</section>
	</div>
@endfor
@stop

@section('content-der')
@stop
