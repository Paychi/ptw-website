@extends('layouts.home')

@section('titulo')
Creditos
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('img/waslala.png','waslala',array("class"=>"img-header"))}}
	</div>
@stop

@section('javascript')
	<script src="{{URL::to('/')}}/js/hidden_menu_left.js"></script>
@stop

@section('content')
	<div class="row" id="credits">
		<hr/>
		<h1 class= "text-center">Desarrolladores</h1>
		<hr/>
		<div class="col-md-12 text-center">
		   {{HTML::image('img/desarrolloalvin.png','alvin',array("class"=>"img-circle"))}}
		   <h3>Ing. Alvin Baltodano</h3>
		   <p>alvinbal93@gmail.com</p>
		</div>
		<div class="col-md-12 text-center">
		   {{HTML::image('img/user.png','fernando',array("class"=>"img-circle"))}}
		   <h3>Ing. Fernando Montes</h3>
		   <p>josue@montes.cc</p>           
		</div>
    </div>
	<div class="row">
		<hr/>
		<h1 class= "text-center">Tutoria</h1>
		<hr/>
		<div class="col-md-12 text-center">
		   {{HTML::image('img/user.png','jose',array("class"=>"img-circle"))}}
		   <h3>Ing. Jos&eacute; Le&oacute;nidas D&iacute;az Chow</h3>
		   <p>jdiaz@snip.gob.ni</p>
		</div>
    </div>
	
@stop

@section('content-der')
@stop
