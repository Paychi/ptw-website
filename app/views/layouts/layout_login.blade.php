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
		<link rel="icon" href="{{URL::to('/')}}/img/logo/logo_login.png" />

	  	<!-- FONT -->
	  	<link rel="stylesheet" href="{{URL::to('/')}}/css/font.css" /> 

	  	<!-- CSS -->
	  	<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.css"/>		
		<link rel="stylesheet" href="{{URL::to('/')}}/css/app.css"/>	
		<link rel="stylesheet" href="{{URL::to('/')}}/css/less.css"/>
		<link rel="stylesheet" href="{{URL::to('/')}}/css/stylesMenu.css"/>
		
		<link rel="stylesheet" href="{{URL::to('/')}}/css/estilos_login.css"/>
		@yield('css')
	</head>
	
	<body>
	
		<section class="login">
			<div class="">
				@yield('content_login')
			</div>			
		</section>
			
		<script src="{{URL::to('/')}}/js/jquery.js"></script>
		<script src="{{URL::to('/')}}/js/bootstrap.js"></script>
		@yield('javascript')
		
	</body>
</html> 

