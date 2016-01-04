@extends('layouts.layout_login')

@section('titulo')
Primer Cambio de Contraseña
@endsection

@section('javascript')
<script type="text/javascript">

	var flagpw=false, flagcpw=false;

	$('#select_ask').change(function(e){
		if($(this).val() == 4)
		{
			$('.ask_seg').show();
		}else{
			$('.ask_seg').hide();
		}
	});

	$('#newpassw').keyup(function() {
		flagcpw = false;
        var pswd = $(this).val();
        var a=0,s=0,d=0,f=0;
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
            $('#length i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
            $('#length i').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
            a = 1;
        }

        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
            $('#letter i').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
            s = 1;
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
            $('#letter i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
        }

        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
            $('#capital i').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
            d = 1;
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
            $('#capital i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');
        }

        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
            $('#number i').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
            f = 1;
        } else {
            $('#number').removeClass('valid').addClass('invalid');
            $('#number i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove');            
        }
        if(a === 1 && s === 1 && d === 1 && f === 1)
            flagpw = true;
        else
            flagpw = false;

    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

    $('#conpassw').keyup(function() {
        var cpswd = $(this).val();
        var pswd = $('#newpassw').val();
        var g=0,h=0;
        if(pswd === '')
        {
            $('#intopwd').removeClass('valid').addClass('invalid');
            $('#confirm').removeClass('valid').addClass('invalid');            
            $('#intopwd i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove'); 
            $('#confirm i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove'); 
        }else{
            $('#intopwd').removeClass('invalid').addClass('valid');
            $('#intopwd i').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
            g = 1;
            if ( cpswd !== pswd ) {
                $('#confirm').removeClass('valid').addClass('invalid');
                $('#confirm i').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove'); 
            } else {
                $('#confirm').removeClass('invalid').addClass('valid');
                $('#confirm i').removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok');
                h = 1;
            }
        }
        
        if(g === 1 && h === 1)
            flagcpw = true;
        else
            flagcpw = false;

    }).focus(function() {
        $('#cpswd_info').show();
    }).blur(function() {
        $('#cpswd_info').hide();
    });

    $('#formfirstchange').submit(function(){  
        if (flagpw && flagcpw) {
            return true;
        }
        else {
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
		<label class='text-center'>Debe cambiar su contraseña al ingresar por primera vez</label>
		{{ Form::open(array('url' => '/login/firstchange','method'=>'post', 'id' => 'formfirstchange')) }}
			
			@if (Session::has('error_cambio'))
			  <div class="error"> {{Session::get('error_cambio')}}</div>
			@endif
	 	 
	        {{ Form::text('username', $usuario_temp, array('class' => 'form-control margin-campos', 'placeholder' => 'Nombre de Usuario', 'required', 'disabled' , 'autofocus')) }}
			<label class="error">{{$errors->first("username")}}</label>

			<label class="margin-campos">Pregunta de seguridad</label>
			{{Form::select('select_answer', $lista, $selected, array('class' => 'form-control', 'id' => 'select_ask'))}}
			<label class="error"></label>

			{{ Form::text('ask', null, array('class' => 'form-control ask_seg', 'placeholder' => 'Pregunta de seguridad')) }}
			<label class="error">{{$errors->first("ask")}}</label>

			{{ Form::text('answer', null, array('class' => 'form-control', 'placeholder' => 'Respuesta a la pregunta de seguridad', 'required')) }}
			<label class="error">{{$errors->first("answer")}}</label>

			{{ Form::password('new_password', array('class' => 'form-control ', 'id' => 'newpassw', 'placeholder' => 'Contrase&ntilde;a Nueva', 'required')) }}
			<label class="error">{{$errors->first("new_password")}}</label>
			<div id="pswd_info" class="arrow-up">
                <h4>Requerimientos para la contraseña:</h4>
                <ul>
                   <li id="letter"><i></i>Debe tener al menos <strong>una letra</strong></li>
                   <li id="capital"><i></i>Debe tener al menos <strong>una letra mayúscula</strong></li>
                   <li id="number"><i></i>Debe tener al menos <strong>un número</strong></li>
                   <li id="length"><i></i>Debe tener al menos <strong>8 caracteres</strong></li>
                </ul>
            </div>
			
	        {{ Form::password('con_password', array('class' => 'form-control ', 'id' => 'conpassw', 'placeholder' => 'Confirmar Contrase&ntilde;a Nueva', 'required')) }}
			<label class="error">{{$errors->first("con_password")}}</label>
			<div id="cpswd_info" class="arrow-up">
                <h4>Requerimientos para confirmar la contraseña:</h4>
                <ul>
                    <li id="intopwd"><i></i>Ingresar Contraseña</li>
                   <li id="confirm"><i></i>Las contraseñas deben coincidir</li>
                </ul>
            </div>
	 
	        {{ Form::submit('Iniciar Sesión', ['class' => 'btn btn-lg btn-primary btn-block margin-campos']) }}		
	        {{ HTML::link('/login', '< Regresar al inicio de sesión') }}
 
	    {{ Form::close() }}
	    
	    @if(Session::has('mensaje')) 
            <div class="flash_notice">{{ Session::get('mensaje') }}</div>                     
        @endif

	</div>

@endsection