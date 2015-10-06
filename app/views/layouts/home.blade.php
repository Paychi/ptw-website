<!DOCTYPE html>
<!--[if IE 8]>         
	<html class="no-js lt-ie9" lang="en"> 
<![endif]-->
<!--[if gt IE 8]><!--> 
	<html class="no-js" lang="es"> 
<!--<![endif]-->

	<head>
		<meta charset="utf-8" />
	  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	  	<title>
			Telemedicina | @section('titulo')Inicio
			@show
		</title>
		
		<!-- LOGO -->
		<link rel="icon shortcut" type="image/png" href="{{URL::to('/')}}/img/logo/logo.png" />

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
	
	<body id="cuerpo">
		<input type="hidden" id="perf" value="public" />
		<div id="BackColor" style=" display:none; position:fixed; width:100%; height:100%; top:0; bottom:0; background: rgba(0, 0, 0, 0.4); overflow:hidden;">		
			
			<div id="BackGroundVisor" style = "position:absolute; top:0; bottom:0; left:0; right:0; z-index:5; width:75%; margin-left:13%; margin-top:0%; height:auto">
				</br>
				</br>
				</br>
				</br>							
				<div id="ModalImage" style="height:100%; width:60%; margin-left:15.05%; margin-top:1%;">
					<div id="cuadro_imagen" style="width:100%; height:100%; margin-left:10%;"> 
				</div>


				</div>
			</div>
			<div id="CloseXD" style="position:absolute; top:0; bottom:0; left:0; right:0; margin-left:13%; z-index:5; height:100%; width:75%;">
				
					<a class="visorControls" id="FotoAnterior" style="font-size:3vw; margin-top:30%; float:left; border-style:none; color:white; border-radius:5px; width:20px; margin-right:10%;"><span class="glyphicon glyphicon-chevron-left"></span></a>					
					<a class="visorControls" id="SiguienteFoto" style="font-size:3vw; margin-top:30%; float:right; border-style:none; color:white; border-radius:5px; width:20px;"><span class="glyphicon glyphicon-chevron-right"></span></a>										
					
				
			</div>
			
		</div>

		<header>
			<section class="banner">
				<div>					
					@yield('imagenes')					
				</div>
			</section>
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					  <span class="sr-only">Desplegar navegación</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="display: table-cell;" href="{{URL::to('/')}}">{{HTML::image('img/logo/logo.svg','img',array("width"=>"40px", "height"=>"60px", "style"=>"vertical-align: middle; margin-top: -8px; display: inline;"))}}<div class="divinicio">Inicio</div></a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">									
						<li id="tag_waslala"><a href='{{URL::to('/')}}/es/waslala'><span> Waslala</span></a></li>
						<li id="tag_about"><a href='{{URL::to('/')}}/es/about'><span>Lo que somos</span></a></li>
						<li id="tag_colaboradores"><a href='{{URL::to('/')}}/es/colaboradores'><span>Colaboradores</span></a> </li>	
						<li id="tag_simsiv"><a href='{{URL::to('/')}}/es/simsiv'><span>SIMSIV</span></a> </li>
						<!--<li><a href='{{URL::to('/')}}/es/creditos'><span>Creditos</span></a> </li>-->
					</ul>
					
					
					
					{{ Form::open(array('url' => '/es/search','method'=>'post','class'=>'navbar-form navbar-right', 'role'=>'search')) }}						
						<div class="form-group">
							{{Form::text('itemsearch',null,array('class'=>'form-control','placeholder'=>'Noticia'))}}
							<!--<input type="search" name="itemsearch" class = "form-control" placeholder = "Noticia" />-->
						</div>
						{{Form::submit('Buscar',['class' => 'btn btn-default'])}}    
					{{ Form::close() }}

					<ul class="nav navbar-nav navbar-right">	
						@if(Session::has('usuario'))
							<li class="dropdown"><a href='#' class="dropdown-toggle" data-toggle="dropdown"><span>{{Session::get('usuario')}} <b class="caret"></b></span></a>
								<ul class="dropdown-menu nav nav-pills nav-stacked">									
									@if($perfil == 1)
										<li><a href='{{URL::to('/')}}/admin'><span>Administraci&oacute;n</span></a></li>
									@endif
									@if($perfil == 2)
										<li><a href='{{URL::to('/')}}/adis'><span>Adis</span></a></li>
									@endif
									@if($perfil == 3)
										<li><a href='{{URL::to('/')}}/colaborador'><span>Colaborador</span></a></li>
									@endif
									<li><a href='{{URL::to('/')}}/login/usuario'><span>Cambiar Usuario</span></a></li>
									<li><a href='{{URL::to('/')}}/login/clave'><span>Cambiar Contrase&ntilde;a</span></a></li>
									<li><a href='{{URL::to('/')}}/es/logout'><span>Cerrar Sesion</span></a></li>
								</ul>
							</li>
						@endif
						@if(!Session::has('usuario'))
							<li><a href='{{URL::to('/')}}/login'><span>Login</span></a></li>
						@endif
					</ul>				
				</div>				
			</nav>	
			<div class="texto_header">
			  {{date("d-m-Y")}} | {{HTML::link("#","EN")}} |
			</div> 
		</header>

		<section class="container">
			<div class="col-lg-2 st" id="content-left">
				<aside>
					@yield('content-izq')
				</aside>
			</div>
			
			<div class="col-lg-8" id="content-center">
				<div id="div_promotor" class="text-center">
					<label class="promotor_mes">Promotor del Mes: 
						<b>
							Nombre Apellido
						</b>
					</label>
					<div id="contDefPromotorHidden" class="text-center"> 
						<p>
							{{$defnhidden}}
						</p>
					</div>
				</div>
				@yield('content')
			</div>
			
			<div class="col-lg-2 st" id="content-right">
				<aside>
					<!--{{HTML::image('img/ptw.png','ptw',array("class"=>"","style"=>""))}}-->
					<a href="http://www76.homepage.villanova.edu/kelly.modrick/index.html">{{HTML::image('img/nova.png','nova',array("class"=>"","style"=>""))}}</a>
					<label class="promotor_mes">Promotor del Mes: 
						<b>
							Nombre Apellido
						</b>
					</label>
					<div id="contDefPromotor" class="text-center"> 
						<p>
							{{$defnhidden}}
						</p>
					</div>
					<br />
					@yield('content-der')
				</aside>
			</div>		
			
		</section>
		
		<footer>
			
			<div class="footer-header">
				<div class="container">
					<div class="row">
						<div class="contenedor-footer">
							<p class="texto-callado creditos">Sitio Web del Proyecto Telemedicina en Waslala-Nicaragua - Desarrollado por Alvin Baltodano y Fernando Montes</p>
							{{HTML::image('img/uni.svg','logo_uni',array("style"=>"height:64px;"))}} 					
							{{HTML::image('img/nova.svg','logo_villanova',array("style"=>"height:64px;"))}}
						</div>
					</div>
				</div>
			</div>

			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<p>© Copyright 2015 by Telehealth Project - All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		<script src="{{URL::to('/')}}/js/jquery.js"></script>
		<script src="{{URL::to('/')}}/js/app.js"></script>
		<script src="{{URL::to('/')}}/js/bootstrap.js"></script>
		@yield('javascript')
	</body>
</html> 
