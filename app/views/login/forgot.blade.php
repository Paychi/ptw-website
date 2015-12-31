@extends('layouts.layout_login')

@section('titulo')
Recuperar Contraseña
@endsection

@section('javascript')
<script type="text/javascript">
	var ctx = document.querySelector('canvas').getContext('2d');
	ctx.font="90px Roboto";
	ctx.fillText({{$r1}} + ' + ' + {{$r2}}, 30, 90);

	$('.box-is-human div a').click(function(e){
		if ($('#solutionec').val() == '') {
			$('#solutionec').focus();
			return;
		} else{
			$.post("compsum",
			{param:$('#solutionec').val()},
			function(data) {
				if (data == 'true') {
					$('.box-is-human div span').empty();
					$('.box-is-human div span').addClass('glyphicon glyphicon-ok-sign margin-campos are-human');
					$('.are-human').parent().append('<br/><span class = "success-human">Correcto</span>');
					$('#solutionec').attr('disabled','true');
				} else{
					location.reload();
				}
			});
		}		
	});

	$("#formretrypw").submit(function() {
		if ($('.box-is-human div:first span').length > 1) {		
			$('#solutionec').removeAttr('disabled');
			return true;
		} else 
		{
			$(".alertmsj").show('slow');
			setTimeout(function() {$(".alertmsj").fadeOut(1500); }, 5000);
			return false;
		}
    });

</script>
@endsection

@section('content_login')

	<?php 
		$lista = array(
			0 => "¿Primer apellido?", 
			1 => "¿Luguar de nacimiento?", 
			2 => "¿Nombre de tu primer mascota?",
			3 => "¿Comida favorita?",
			4 => "otra");
		$selected = array();
	?>
 
 	<div class="form">

		{{ Form::open(array('url' => '/login/retrypw','method'=>'post', 'id' => 'formretrypw')) }}
			
			@if (Session::has('error_cambio'))
			  <div class="error"> {{Session::get('error_cambio')}}</div>
			@endif
	 	 
	        {{ Form::text('username', null, array('class' => 'form-control margin-campos', 'placeholder' => 'Nombre de Usuario', 'required', 'autofocus')) }}
			<label class="error">{{$errors->first("username")}}</label>

			<label class="margin-campos">Pregunta de seguridad</label>
			{{Form::select('select_answer', $lista, $selected, array('class' => 'form-control'))}}

			{{ Form::text('answer', null, array('class' => 'form-control margin-campos', 'placeholder' => 'Respuesta a la pregunta de seguridad', 'required')) }}
			<label class="error">{{$errors->first("answer")}}</label>

			<div class = "row box-is-human">
				<div class="col-lg-6">
					<span>Favor verifique si usted es humano resolviendo la ecuación</span>
				</div>
				<div class="col-lg-6">
					<canvas class=""></canvas>
					{{ Form::text('solution', null, array('class' => 'form-control text-center', 'id' => 'solutionec', 'placeholder' => '¿Solución?', 'required')) }}
					<a class = "btn" data-toggle="tooltip" title="Verificar"><i class="glyphicon glyphicon-check"></i></a>
				</div>
				<div class="col-lg-12 alertmsj" style="display: none;">
					<div class="alert alert-warning text-center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Verifique su solución</strong>
					</div>
				</div>
			</div>
	 
	        {{ Form::submit('Enviar', ['class' => 'btn btn-lg btn-primary btn-block margin-campos']) }}		
	        {{ HTML::link('/login', '< Regresar al inicio de sesión') }}
 
	    {{ Form::close() }}
	    
	    @if(Session::has('mensaje')) 
            <div class="flash_notice">{{ Session::get('mensaje') }}</div>                     
        @endif

	</div>

@endsection