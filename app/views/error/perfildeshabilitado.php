<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Perfil Deshabilitado</title>
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="img/logo/logo_login.png" />
	<style type="text/css">

		body
		{
			font-family:'Droid Sans', sans-serif;
			font-size:10pt;
			color:#555;
			line-height: 25px;
		}

		.wrapper
		{
			max-width:760px;
			margin:0 auto 5em auto;
		}

		.main
		{
			overflow:hidden;
			text-align: center;
		}

		.error-spacer
		{
			height:4em;
		}

		a, a:visited
		{
			color:#2972A3;
		}

		a:hover
		{
			color:#72ADD4;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="error-spacer"></div>
		<div role="main" class="main">

			<?php echo HTML::image('/img/perfil_deshabilitado.svg','perfil',array("class"=>"")); ?>

			<h1>Perfil Deshabilitado</h1>

			<hr>

			<h3>Su perfil de usuario est&aacute; deshabilitado temporalmente, notifique al administrador del sistema.</h3>			

			<p>
				<?php echo HTML::image('/img/logo/inicionomenu.svg','inicio',array("class"=>"", "style"=>"height:100px; ")); ?>
				<br />
				<?php echo HTML::link('/', 'P&aacute;gina Inicio', array("style" => "margin-top: -100px;" )); ?>
			</p>
		</div>
	</div>
</body>
</html>
