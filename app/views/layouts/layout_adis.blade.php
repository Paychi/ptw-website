<!DOCTYPE html>

	<html class="no-js" lang="es"> 

	<head>
		<meta charset="utf-8" />
	  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	  	<meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
	  	<title>
			Telemedicina | @section('titulo')Adis
			@show
		</title>

		<!-- LOGO -->
		<link rel="icon" href="{{URL::to('/')}}/img/logo/logo_conf.png" />

	  	<!-- FONT -->
	  	<link rel="stylesheet" href="{{URL::to('/')}}/css/font.css" /> 

	  	<!-- CSS -->
	  	<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.css"/>		
		<link rel="stylesheet" href="{{URL::to('/')}}/css/app.css"/>	
		<link rel="stylesheet" href="{{URL::to('/')}}/css/less.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/stylesMenu.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/estilos_formulario.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/preloader.css"/>
		@yield('css')
	</head>
	
	<body id="cuerpo">
		<input type="hidden" id="perf" value="adis" />
		<header>
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					  <span class="sr-only">Desplegar navegación</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="display: table-cell;" href="{{URL::to('/')}}">{{HTML::image('img/logo/logo.svg','img',array("width"=>"40px", "height"=>"60px", "style"=>"vertical-align: middle; margin-top: -8px; display: inline;"))}} <div class="divinicio">Inicio</div></a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">									
						<!--<li><a href='{{URL::to('/')}}/es/creditos' target="_blank"><span>Creditos</span></a> </li>-->
						<li id="tag_adis"><a href='{{URL::to('/')}}/adis' ><span>Adis</span></a> </li>
						<li class="dropdown"><a href='#' class="dropdown-toggle" data-toggle="dropdown"><span>Men&uacute;<b class="caret"></b></span></a>
							<ul class="dropdown-menu nav nav-pills nav-stacked">
								<li class="menu-addnoticia"><a href="{{URL::to('/')}}/adis/addnoticia"><span>Agregar Noticia</span></a></li>
								<li class="menu-noticia"><a href="{{URL::to('/')}}/adis/noticias"><span>Editar Noticia</span></a></li>
								<li class="menu-confbanner"><a href='{{URL::to('/')}}/adis/confbanners'><span>Configarici&oacute;n Banners</span></a></li>
								<li class="menu-lider"><a href='{{URL::to('/')}}/adis/lideres'><span>Líderes</span></a></li>
								<li class="menu-comunidad"><a href='{{URL::to('/')}}/adis/comunidades'><span>Comunidades</span></a></li>
							</ul>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">	
						<li class="dropdown"><a href='#' class="dropdown-toggle" data-toggle="dropdown"><span>{{Session::get('usuario')}} <b class="caret"></b></span></a>
							<ul class="dropdown-menu nav nav-pills nav-stacked">
								<li><a href='{{URL::to('/')}}/login/usuario'><span>Cambiar Usuario</span></a></li>
								<li><a href='{{URL::to('/')}}/login/clave'><span>Cambiar Contrase&ntilde;a</span></a></li>
								<li><a href='{{URL::to('/')}}/adis/logout'><span>Cerrar Sesion</span></a></li>
							</ul>
						</li>
					</ul>				
				</div>				
			</nav>
			<div class="texto_header">
			  {{date("d-m-Y")}} | {{HTML::link("http://www.timeanddate.com/worldclock/nicaragua","Nicaragua (CTS-6)",array('target'=>'_black'))}} |
			</div> 
		</header>
	
		<section class="container">
			<div class="col-lg-2 st menu_perfil" id="content-left2">
				<aside>
					<img src="{{ asset('/img/logo/logo_conf.svg') }}" alt="telemedicina">
					<span class="splinemenu bColor2"></span>
					<ul class="nav nav-pills nav-stacked">						
						<li class="menu-addnoticia"><a href="{{URL::to('/')}}/adis/addnoticia"><span>Agregar Noticia</span></a></li>
						<li class="menu-noticia"><a href="{{URL::to('/')}}/adis/noticias"><span>Editar Noticia</span></a></li>
						<li class="menu-confbanner"><a href='{{URL::to('/')}}/adis/confbanners'><span>Configarici&oacute;n Banners</span></a></li>
						<li class="menu-lider"><a href='{{URL::to('/')}}/adis/lideres'><span>Líderes</span></a></li>
						<li class="menu-comunidad"><a href='{{URL::to('/')}}/adis/comunidades'><span>Comunidades</span></a></li>
					</ul>
				</aside>
			</div>
			
			<div class="col-lg-10">
				@yield('content_adis')
			</div>			
		</section>
			
		<footer class = "alpie">
			<!--<section class="footer">
				<div class="contenedor-footer">
					<p class="texto-callado creditos">Proyecto de Telemedicina Waslala-Nicaragua</p>
					{{HTML::image('img/logo_uni.png','logo_uni',array("style"=>"height:64px;width:114px;"))}} 					
					{{HTML::image('img/logo_villanova.png','logo_villanova',array("style"=>"height:64px;width:254px;background:blue;"))}} 										
				</div>
			</section>-->
		</footer>
		
		<script src="{{URL::to('/')}}/js/jquery.js"></script>
		<script src="{{URL::to('/')}}/js/bootstrap.js"></script>
		<script src="{{URL::to('/')}}/js/app.js"></script>
		@yield('javascript')
		
	</body>
</html> 

