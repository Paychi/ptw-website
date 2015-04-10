@extends('layouts.home')

@section('titulo')
Search
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_search.png','search',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		@if($datos->count() == null)
			<label> Sin Resultados!</label>
		@endif
		<ul class="nav nav-pills nav-stacked">		
			@foreach($datos as $dato)
				<li><a href='#noticia{{$dato->id_noticia}}'><span>{{$dato->titulo}}</span></a></li>
			@endforeach
		</ul>
	</div>
@stop

@section('content')
	<h1>Resultado de: <strong>{{$noticiapost}}</strong></h1>
	
	@if($datos->count() == null)
		<label> No se han encontrado resultados....</label>
	@endif
	
	@foreach($datos as $dato)
		<?php
			setlocale(LC_TIME,'spanish');
			$fecha=strtotime($dato->fecha_noticia);
			$mes=date("m",$fecha);
			$fecha_noticia= date("d",$fecha) ." de ". strftime("%B",mktime(0,0,0,$mes,1,2000)) ." del ". date("Y",$fecha);
		 ?>
		<div class="post search" id="noticia{{$dato->id_noticia}}">
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
	@endforeach
@stop

@section('content-der')
@stop
