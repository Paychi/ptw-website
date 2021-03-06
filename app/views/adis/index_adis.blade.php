@extends('layouts.layout_adis')

@section('content_adis')

<div class="col-lg-12">
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/addnoticia"> <img src="{{ asset('/img/icon/addnoticia.svg') }}" alt="addnoticia" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/adis/addnoticia" class="entry-title title-admon"><h2 class="title-admon">Agregar Noticia</h2></a>
		<span class="spline bColor"></span>
		<p>Agregar nuevas Noticas que suceden en el Proyecto para dar a conocer los logros y actividades.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/noticias"> <img src="{{ asset('/img/icon/editnoticia.svg') }}" alt="editnoticia" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/adis/noticias" class="entry-title title-admon"><h2 class="title-admon">Editar Noticia</h2></a>
		<span class="spline bColor"></span>
		<p>Editar las Noticias para cuando haya un dato erroneo y corregirlos.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/confbanners"> <img src="{{ asset('/img/icon/banners.svg') }}" alt="banners" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/adis/confbanners" class="entry-title"><h2 class="title-admon">Configuraci&oacute;n Banners</h2></a>
		<span class="spline bColor"></span>
		<p>Actualizaci&oacute;n de las im&aacute;genes de cabecera de las p&aacute;ginas.</p>
	</div>	
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/lideres"> <img src="{{ asset('/img/icon/lideres.svg') }}" alt="lideres" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/adis/lideres" class="entry-title title-admon"><h2 class="title-admon">Lideres</h2></a>
		<span class="spline bColor"></span>
		<p>Lideres de las comunidades del Proyecto.</p>
	</div>
</div>
<div class="col-lg-12">	
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/comunidades"> <img src="{{ asset('/img/icon/comunidades.svg') }}" alt="comunidades" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/adis/comunidades" class="entry-title title-admon"><h2 class="title-admon">Comunidades</h2></a>
		<span class="spline bColor"></span>
		<p>Comunidades del municipio de Waslala.</p>
	</div>
	<!--<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/colaboradores"> <img src="{{ asset('/img/icono_colaboradores.png') }}" alt="colaboradores" class=""> </a>
		<a href="{{URL::to('/')}}/adis/colaboradores" class="entry-title title-admon"><h2 class="title-admon">Colaboradores</h2></a>
		<span class="spline bColor"></span>
		<p>Gestionar los Colaboradores para el Proyecto.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/usuarios"> <img src="{{ asset('/img/icono_usuarios.png') }}" alt="usuarios" class=""> </a>
		<a href="{{URL::to('/')}}/adis/usuarios" class="entry-title title-admon"><h2 class="title-admon">Usuarios</h2></a>
		<span class="spline bColor"></span>
		<p>Administrar los Usuarios del Sistema.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/adis/confbanners"> <img src="{{ asset('/img/icono_banners.png') }}" alt="banners" class=""> </a>
		<a href="{{URL::to('/')}}/adis/confbanners" class="entry-title"><h2 class="title-admon">Configuraci&oacute;n Banners</h2></a>
		<span class="spline bColor"></span>
		<p>Actualizaci&oacute;n de las im&aacute;genes de cabecera de las p&aacute;ginas.</p>
	</div>-->
</div>
 	
@endsection
	
