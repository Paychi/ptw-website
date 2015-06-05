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
			<div class="text-center" style="margin-bottom: 10px;">
				<label class="label label-danger"> Sin Resultados!</label>
			</div>			
		@endif
		<ul class="nav nav-pills nav-stacked">		
			@foreach($datos as $dato)
				<li><a href='#noticia{{$dato->id_noticia}}'><span>{{$dato->titulo}}</span></a></li>
			@endforeach
		</ul>
	</div>
@stop

@section('content')
	@if($noticiapost != '')
		<h1 class="tituloinfo text-center">Resultado de: <strong>{{$noticiapost}}</strong></h1>	
	@else
		<h1 class="tituloinfo text-center"><strong>Todos los Datos</strong></h1>
	@endif
	
	
	@if($datos->count() == null)
		<div class="text-center">
			<label class="label label-danger"> No se han encontrado resultados....</label>
		</div>
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
