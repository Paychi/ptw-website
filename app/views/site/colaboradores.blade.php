@extends('layouts.home')

@section('titulo')
Colaboradores
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_colaboradores.png','colaboradores',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		<ul class="nav nav-pills nav-stacked">								
			@foreach($datos as $dato)
			<li><a href="#section{{$dato->id_colaborador}}"><span>{{$dato->abreviatura}}</span></a></li>
			@endforeach
		</ul>
	</div>
@stop

@section('content')
<h1 class="text-center tituloinfo">Instituciones involucradas</h1>
<hr />
<p>
	Las instituciones involucradas en el desarrollo de este proyecto de Telesalud son: 
	ADIS, Villanova University, Universidad Nacional de Ingeniería (UNI), 
	Universidad Autónoma de Nicaragua (UNAN), Claro y MINSA.
</p>

<p>
	Te invitamos a que colabores con el proyecto para seguir ejarciendo la buena labor, que hasta este 
	momento ha sido de gran ayuda para pobladores de las zonas rurales de Waslala Nicaragua.
</p>

<hr />

<section style="margin:10px">	
	@foreach($datos as $dato)
		<section id="section{{$dato->id_colaborador}}" class ="row post_colaboradores">
			<div class="col-md-5">
				<center>{{HTML::image('uploads/logo_colaboradores/'.$dato->logo,'logo_colaborador',array("class"=>"img-colaborador"))}}</center>
			</div>
			<div class="col-md-7">
				<div class="row">
					<h2 class="entry-title">
						@if($dato->sitio_web == '')
							<a href="#">{{$dato->nombre}}</a>
						@else 
							<a href="http://www.{{$dato->sitio_web or '#'}}" target="_black">{{$dato->nombre}}</a>
						@endif
					</h2>
				</div>
				<div class= "row">
					<div class="entry-summary">
						<p>
							{{nl2br($dato->descripcion)}}
						</p>
					</div>
				</div>
			</div>
		</section>
	@endforeach
</section>
@stop

@section('content-der')
@stop
