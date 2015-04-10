@extends('layouts.home')

@section('titulo')
Waslala
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_waslala.png','waslala',array("class"=>"img-header"))}}
	</div>
@stop

@section('javascript')
	<script src="{{URL::to('/')}}/js/hidden_menu_left.js"></script>
@stop

@section('content')
	<section>
		<a href="https://www.google.com.ni/maps/place/Waslala/@13.3302454,-85.3740692,16z/data=!3m1!4b1!4m2!3m1!1s0x8f729a12e926b0af:0x5cb509babeb02a8c">
			{{HTML::image('img/mapawaslala.png','infowaslala',array("class"=>"img-header"))}}
		</a>
		<h1>Waslala</h1>
		<h4>Munucipio de Nicaragua</h4>
		<p>Waslala es una municipalidad de la Región Autónoma del Atlántico Norte, en la República de Nicaragua; 
		el término waslala es una palabra indígena que significa "río de plata".
		{{HTML::Link('http://es.wikipedia.org/wiki/Waslala','Wikipedia')}}</p>
		<p><strong>Superficie:</strong>  1.330 km²</p>
		<p><strong>Altitud:</strong>  329 msnm</p>
		<p><strong>Coordenadas:</strong>  <a href="http://tools.wmflabs.org/geohack/geohack.php?language=es&pagename=Waslala&params=13.233333333333_N_-85.383333333333_E_type:city">13°14′00″N 85°23′00″O</a></p>
	</section>
@stop

@section('content-der')
@stop
