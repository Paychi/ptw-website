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
		<link rel="icon" href="{{URL::to('/')}}/img/nova.png" />

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
					<a class="navbar-brand" href="{{URL::to('/')}}">{{HTML::image('img/globe.svg','img',array("width"=>"10px", "height"=>"40px"))}} Inicio</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">									
						<li><a href='{{URL::to('/')}}/es/waslala'><span> Waslala</span></a></li>
						<li><a href='{{URL::to('/')}}/es/about'><span>Lo que somos</span></a></li>
						<li><a href='{{URL::to('/')}}/es/colaboradores'><span>Colaboradores</span></a> </li>	
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
								<ul class="dropdown-menu">									
									@if($perfil == 1)
										<li><a href='{{URL::to('/')}}/admin'><span>Administraci&oacute;n</span></a></li>
									@endif
									@if($perfil == 2)
										<li><a href='{{URL::to('/')}}/adis'><span>Adis</span></a></li>
									@endif
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
							<dfn title="{{$defn}}" onClick="MostrarContPromotorHidden()">
								Nombre Apellido
							</dfn>
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
							<dfn title="{{$defn}}" onClick="MostrarContPromotor()">
								Nombre Apellido
							</dfn>
						</b>
					</label>
					<div id="contDefPromotor" class="text-center"> 
						<p>
							{{$defnhidden}}
						</p>
					</div>
					@yield('content-der')
				</aside>
			</div>		
			
		</section>
		
		<footer>
			<section class="footer">
				<div class="contenedor-footer">
					<p class="texto-callado creditos">Proyecto de Telemedicina Waslala-Nicaragua - Sitio Web Desarrollado por Alvin Baltodano y Fernando Montes</p>
					{{HTML::image('img/logo_uni.png','logo_uni',array("style"=>"height:64px;width:114px;"))}} 					
					{{HTML::image('img/logo_villanova.png','logo_villanova',array("style"=>"height:64px;width:254px;background:blue;padding:10px;"))}}
				</div>
			</section>
		</footer>
		
		<script src="{{URL::to('/')}}/js/jquery.js"></script>
		<script src="{{URL::to('/')}}/js/app.js"></script>
		<script src="{{URL::to('/')}}/js/bootstrap.js"></script>
		@yield('javascript')
	</body>
</html> 

