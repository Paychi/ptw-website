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
						<li><a href='{{URL::to('/')}}/waslala'><span> Waslala</span></a></li>
						<li><a href='{{URL::to('/')}}/about'><span>Acerca de</span></a></li>
						<li><a href='{{URL::to('/')}}/colaboradores'><span>Colaboradores</span></a> </li>	
						<li><a href='{{URL::to('/')}}/creditos'><span>Creditos</span></a> </li>
					</ul>
					
					
					
					{{ Form::open(array('url' => '/search','method'=>'post','class'=>'navbar-form navbar-right', 'role'=>'search')) }}						
						<div class="form-group">
							{{Form::text('itemsearch',null,array('class'=>'form-control','placeholder'=>'Noticia'))}}
						</div>
						{{Form::submit('Buscar',['class' => 'btn btn-default'])}}    
					{{ Form::close() }}

					<ul class="nav navbar-nav navbar-right">	
						<li><a href='{{URL::to('/')}}/login'><span>Login</span></a></li>
					</ul>				
				</div>				
			</nav>			
		</header>

		<section class="container">
			<div class="col-lg-2 st" id="content-left">
				@yield('content-izq')
			</div>
			
			<div class="col-lg-8" id="content-center">
				@yield('content')
			</div>
			
			<div class="col-lg-2 st" id="content-right">
				{{HTML::image('img/ptw.png','ptw',array("class"=>"","style"=>""))}}
				<a href="http://www76.homepage.villanova.edu/kelly.modrick/index.html">{{HTML::image('img/nova.png','nova',array("class"=>"","style"=>""))}}</a>
				@yield('content-der')
			</div>		
			
		</section>
		
		<footer>
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

