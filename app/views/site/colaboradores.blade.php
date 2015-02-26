@extends('layouts.home')

@section('titulo')
Colaboradores
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('img/colaboradores.png','colaboradores',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		<ul class="nav nav-pills nav-stacked">									
			<li><a href='#section1'><span>ADIS</span></a></li>
			<li><a href='#section2'><span>VILLANOVA</span></a></li>
			<li><a href='#section3'><span>UNI</span></a> </li>	
			<li><a href='#section4'><span>UNAN</span></a> </li>	
			<li><a href='#section5'><span>CLARO</span></a> </li>	
			<li><a href='#section6'><span>MINSA</span></a> </li>	
		</ul>
	</div>
@stop

@section('content')
<h1>Instituciones involucradas</h1>
<p>
	Las instituciones involucradas en el desarrollo de este proyecto de Telesalud son: 
	ADIS, Villanova University, Universidad Nacional de Ingeniería (UNI), 
	Universidad Autónoma de Nicaragua (UNAN), Claro y MINSA.
</p>

<p>
	Te invitamos a que colabores con el proyecto para seguir ejarciendo la buena labor, que hasta este 
	momento ha sido de gran ayuda para pobladores de las zonas rurales de Waslala Nicaragua.
</p>

<section style="margin:10px">

	<section id="section1" class ="row post_colaboradores">
		<div class="col-md-5">
			<center>{{HTML::image('img/logo_adis.jpg','logo_adis',array("class"=>"img-colaborador"))}}</center>
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="#">Asociación de  Desarrollo  Integral y Sostenible</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						ADIS, Asociación de Desarrollo Integral y Sostenible como actor local 
						encargado de la organización y relación con los agentes comunitarios integrante 
						de la red comunitaria de salud activa en las comunidades rurales del Municipio.
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section2" class ="row post_colaboradores">
		<div class="col-md-5">
			<center>{{HTML::image('img/logo_villanova.png','logo_Villanova',array("class"=>"img-colaborador fondoLV"))}}</center>
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://novamobilehealth.org/">Villanova University</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						Universidad de Villanova, centro universitario con sede en EEUU, que ideó el 
						sistema computarizado y trazó las líneas del proyecto piloto en Waslala  y  es  
						quien se ha responsabilizado de encontrar los recursos económicos para que se pudiera 
						desarrollar el proyecto.
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section3" class ="row post_colaboradores">
		<div class="col-md-5">
			<center>{{HTML::image('img/logo_uni.png','logo_uni',array("class"=>"img-colaborador"))}}</center>
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://www.uni.edu.ni/">Universidad Nacional de Ingenieria</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						Universidad Nacional de Ingeniería (UNI) con sede en Managua, quien 
						colabora desde el inicio en la parte de desarrollo de los instrumentos 
						tecnológicos utilizados en el proyecto y responsable de la coordinación a 
						nivel nacional con la empresa de Telecomunicaciones CLARO a través 
						de su convenio.<br/> UNI-CLARO
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section4" class ="row post_colaboradores">
		<div class="col-md-5">
			<center>{{HTML::image('img/logo_unan.png','logo_unan',array("class"=>"img-colaborador"))}}</center>
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://www.unan.edu.ni/">Universidad Autónoma de Nicaragua</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						Facultad Regional Multidisciplinaria (FAREM) Matagalpa de la Universidad 
						Autónoma de Nicaragua (UNAN) Managua, carrera de Enfermería, quien ha colaborado 
						desde el inicio  en la  docencia y capacitación de los agentes comunitarios junto 
						con el equipo de enfermeras  de ADIS.
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section5" class ="row post_colaboradores">
		<div class="col-md-5">
			<center>{{HTML::image('img/logo_claro.jpg','logo_claro',array("class"=>"img-colaborador"))}}</center>
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
						CLARO Nicaragua, empresa de Telecomunicaciones que está colaborando con  la donación de recarga mensual a 70 
						líderes  para la activación de paquetes de mensajes. Ademas de donar telefonos celulares para lideres de la
						zona.
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="section6" class ="row post_colaboradores">
		<div class="col-md-5">
			<center>{{HTML::image('img/minsa.png','logo_minsa',array("class"=>"img-colaborador"))}}</center>
		</div>
		<div class="col-md-7">
			<div class="row">
				<h2 class="entry-title">
					<a href="http://www.minsa.gob.ni/">Ministerio de Salud Nicaragua</a>
				</h2>
			</div>
			<div class= "row">
				<div class="entry-summary">
					<p>
						MINSA local del Municipio de Waslala, que ha puesto a disposición un 
						recurso humano para atender llamadas telefónicas  y mensajes  para emergencias  
						de pacientes  y/o consultas de los agentes comunitarios de salud, como también 
						en la facilitación de capacitaciones.
					</p>
				</div>
			</div>
		</div>
	</section>
	
</section>
@stop

@section('content-der')
@stop
