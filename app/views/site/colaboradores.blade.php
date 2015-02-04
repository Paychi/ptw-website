@extends('layouts.home')

@section('titulo')
Waslala
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('img/colaboradores.png','colaboradores',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		<ul class="nav nav-pills nav-stacked">									
			<li><a href='#section1'><span> Claro</span></a></li>
			<li><a href='#section2'><span>Villanova</span></a></li>
			<li><a href='#section3'><span>UNI</span></a> </li>	
			<li><a href='#section4'><span>Minsa</span></a> </li>	
			<li><a href='#'><span>otro</span></a> </li>	
		</ul>
	</div>
@stop

@section('content')
<!--<h1>Colaboradores.....</h1>-->
<section style="margin:10px">

	<section id="section1" class ="row post_colaboradores">
		<div class="col-md-5">
			{{HTML::image('img/logo_claro.jpg','logo_claro',array("class"=>"img-colaborador"))}}
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="https://www.claro.com.ni">Claro Nicaragua</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						Claro Nicaragua apoya al proyecto de telemedicina en Waslala para la comunicaci&oacute;n entre promotores
						de salud y notificaciones al sistema RapidSMS con equipos nuevos.
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section2" class ="row post_colaboradores">
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://novamobilehealth.org/">Villanova University</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						Villnova University realiza brigadas de salud para los habitantes de 
						waslala.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			{{HTML::image('img/logo_villanova.png','logo_Villanova',array("class"=>"img-colaborador fondoLV"))}}
		</div>	
	</section>
	
	<section id="section3" class ="row post_colaboradores">
		<div class="col-md-5">
			{{HTML::image('img/logo_uni.png','logo_uni',array("class"=>"img-colaborador"))}}
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://uni.edu.ni/">Universidad Nacional de Ingenieria</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						La UNI apoya por medio de estudiantes dedicados al proyecto.
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section4" class ="row post_colaboradores">
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://www.minsa.gob.ni/">Minsa Nicaragua</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						El MINSA proporciona promotores de salud el las zonas rurales 
						de waslala.
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			{{HTML::image('img/minsa.png','logo_Villanova',array("class"=>"img-colaborador"))}}
		</div>	
	</section>
	
</section>
@stop

@section('content-der')
@stop
