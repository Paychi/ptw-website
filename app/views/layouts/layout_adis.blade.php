<!DOCTYPE html>

	<html class="no-js" lang="es"> 

	<head>
		<meta charset="utf-8" />
	  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	  	<title>
			Telemedicina | @section('titulo')Adis
			@show
		</title>
	  	<!-- FONT -->
	  	<link rel="stylesheet" href="{{URL::to('/')}}/css/font.css" /> 

	  	<!-- CSS -->
	  	<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.css"/>		
		<link rel="stylesheet" href="{{URL::to('/')}}/css/app.css"/>	
		<link rel="stylesheet" href="{{URL::to('/')}}/css/less.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/stylesMenu.css"/>
		@yield('css')
	</head>
	
	<body>
		<header>
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					  <span class="sr-only">Desplegar navegación</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" target="_blank" href="{{URL::to('/')}}">{{HTML::image('img/globe.svg','img',array("width"=>"10px", "height"=>"40px"))}} Inicio</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">									
						<!--<li><a href='{{URL::to('/')}}/es/creditos' target="_blank"><span>Creditos</span></a> </li>-->
						<li><a href='{{URL::to('/')}}/adis' ><span>Adis</span></a> </li>
					</ul>

					<ul class="nav navbar-nav navbar-right">	
						<li class="dropdown"><a href='#' class="dropdown-toggle" data-toggle="dropdown"><span>{{Session::get('usuario')}} <b class="caret"></b></span></a>
							<ul class="dropdown-menu">
								<li><a href='{{URL::to('/')}}/adis/logout'><span>Cerrar Sesion</span></a></li>
							</ul>
						</li>
					</ul>				
				</div>				
			</nav>
			<div class="texto_header">
			  {{date("d-m-Y")}} | {{HTML::link("#","EN")}} |
			</div> 
		</header>
	
		<section class="container">
			<div class="col-lg-2 st menu_perfil" id="content-left2">
				<aside>
					<ul class="nav nav-pills nav-stacked">			
						<li><a href='{{URL::to('/')}}/adis/eventos'><span>Eventos</span></a></li>
					</ul>
				</aside>
			</div>
			
			<div class="col-lg-10">
				@yield('content_adis')
			</div>			
		</section>
			
		<footer class = "alpie">
			<section class="footer">
				<div class="contenedor-footer">
					<p class="texto-callado creditos">Proyecto de Telemedicina Waslala-Nicaragua</p>
					{{HTML::image('img/logo_uni.png','logo_uni',array("style"=>"height:64px;width:114px;"))}} 					
					{{HTML::image('img/logo_villanova.png','logo_villanova',array("style"=>"height:64px;width:254px;background:blue;"))}} 										
				</div>
			</section>
		</footer>
		
		<script src="{{URL::to('/')}}/js/jquery.js"></script>
		<script src="{{URL::to('/')}}/js/bootstrap.js"></script>
		@yield('javascript')
		
	</body>
</html> 

