@extends('layouts.layout_login')

@section('titulo')
Contrase&ntilde;a
@endsection

@section('javascript')
<script type="text/javascript">

	var flagpw=false, flagcpw=false;

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

    $('#formchange').submit(function(){  
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
 
 	<div class="form">

		{{ Form::open(array('url' => '/login/clave','method'=>'post','id'=>'formchange')) }}
			
			@if (Session::has('error_cambio'))
			  <div class="error"> {{Session::get('error_cambio')}}</div>
			@endif
	 	 
	        {{ Form::password('old_password', array('class' => 'form-control margin-campos', 'placeholder' => 'Contrase&ntilde;a Actual', 'required')) }}
			<label class="error">{{$errors->first("old_password")}}</label>
			
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
			
	        {{ Form::password('con_password', array('class' => 'form-control', 'id' => 'conpassw', 'placeholder' => 'Confirmar Contrase&ntilde;a Nueva', 'required')) }}
			<label class="error">{{$errors->first("con_password")}}</label>
			<div id="cpswd_info" class="arrow-up">
                <h4>Requerimientos para confirmar la contraseña:</h4>
                <ul>
                    <li id="intopwd"><i></i>Ingresar Contraseña</li>
                   <li id="confirm"><i></i>Las contraseñas deben coincidir</li>
                </ul>
            </div>
	 
	        {{ Form::submit('Cambiar', ['class' => 'btn btn-lg btn-primary btn-block margin-campos']) }}		
 
	    {{ Form::close() }}
	    
	    @if(Session::has('mensaje')) 
            <div class="flash_notice">{{ Session::get('mensaje') }}</div>                     
        @endif

	</div>

@endsection
	
