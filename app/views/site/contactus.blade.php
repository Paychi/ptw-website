@extends('layouts.home')

@section('titulo')
Cont&aacute;ctanos
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_contactus.png','colaboradores',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
<label>Cont&aacute;ctanos a:</label>
<hr/>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach($datos as $dato)
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$dato->id_contacto}}" aria-expanded="true" aria-controls="collapseOne">
              {{$dato->nombre}} {{$dato->apellido}}
            </a>
          </h4>
        </div>
        <div id="collapse{{$dato->id_contacto}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <b>Correo:</b> {{$dato->correo}}<br/>
            <b>Telefono:</b> {{$dato->telefono}}<br/>
          </div>
        </div>
      </div>
    @endforeach
</div>
@stop

@section('content')

    @if(Session::has('mensajeContactus'))
        <br/>
        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('mensajeContactus')}}</strong>
        </div>
    @endif

    @if(Session::has('mensajeError'))
        <br/>
        <div class="alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('mensajeError')}}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                {{ Form::open(array('url' => '/es/contactus','method'=>'post','class'=>'form-horizontal', 'name'=>'form_contactus','id'=>'')) }}
            		<h3 class="text-center header">Llené el formulario y presione enviar para contáctarnos</h3>
            		<br/>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user"></i></span>
                        <div class="col-md-8">
                            {{ Form::text('fname',null, array('class' => 'form-control', 'required', 'placeholder' => 'Nombres') ) }}
                            <label class="error">{{$errors->first("fname")}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user"></i></span>
                        <div class="col-md-8">
                            {{ Form::text('lname',null, array('class' => 'form-control', 'required', 'placeholder' => 'Apellidos') ) }}
                            <label class="error">{{$errors->first("lname")}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-envelope"></i></span>
                        <div class="col-md-8">
                            {{ Form::email('email',null, array('class' => 'form-control', 'required', 'placeholder' => 'Correo') ) }}
                            <label class="error">{{$errors->first("email")}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-edit"></i></span>
                        <div class="col-md-8">
                            {{Form::textarea('message',null, array('class' => 'form-control', 'rows' => '7', 'required', 'placeholder' => 'Escriba su mensaje para nosotros aquí.'))}}
                            <label class="error">{{$errors->first("message")}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            {{Form::submit('Enviar',['class' => 'btn btn-primary'])}}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('content-der')
@stop