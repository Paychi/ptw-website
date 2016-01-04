@extends('layouts.layout_colaborador')

@section('content_colaborador')

<div class="col-lg-12">
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/colaborador/ajustes"> <img src="{{ asset('/img/icon/ajustecolaborador.svg') }}" alt="noticias" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/colaborador/ajustes" class="entry-title title-admon"><h2 class="title-admon">Ajustes</h2></a>
		<span class="spline bColor"></span>
		<p>Configuraci&oacute;n de la informaci&oacute;n correspondiente al colaborador.</p>
	</div>
	<!--<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/colaboradores"> <img src="{{ asset('/img/icon/colaboradores.svg') }}" alt="colaboradores" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/admin/colaboradores" class="entry-title title-admon"><h2 class="title-admon">Colaboradores</h2></a>
		<span class="spline bColor"></span>
		<p>Gestionar los Colaboradores para el Proyecto.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/usuarios"> <img src="{{ asset('/img/icon/usuarios.svg') }}" alt="usuarios" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/admin/usuarios" class="entry-title title-admon"><h2 class="title-admon">Usuarios</h2></a>
		<span class="spline bColor"></span>
		<p>Administrar los Usuarios del Sistema.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/perfiles"> <img src="{{ asset('/img/icon/perfil.svg') }}" alt="perfil" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/admin/perfiles" class="entry-title title-admon"><h2 class="title-admon">Configuraci&oacute;n Perfil</h2></a>
		<span class="spline bColor"></span>
		<p>Mantenimientos de Perfil de Usuarios.</p>
	</div>-->
</div>
<!--<div class="col-lg-12">	
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/confbanners"> <img src="{{ asset('/img/icon/banners.svg') }}" alt="banners" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/admin/confbanners" class="entry-title"><h2 class="title-admon">Configuraci&oacute;n Banners</h2></a>
		<span class="spline bColor"></span>
		<p>Actualizaci&oacute;n de las im&aacute;genes de cabecera de las p&aacute;ginas.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/colaboradores"> <img src="{{ asset('/img/icono_colaboradores.png') }}" alt="colaboradores" class=""> </a>
		<a href="{{URL::to('/')}}/admin/colaboradores" class="entry-title title-admon"><h2 class="title-admon">Colaboradores</h2></a>
		<span class="spline bColor"></span>
		<p>Gestionar los Colaboradores para el Proyecto.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/usuarios"> <img src="{{ asset('/img/icono_usuarios.png') }}" alt="usuarios" class=""> </a>
		<a href="{{URL::to('/')}}/admin/usuarios" class="entry-title title-admon"><h2 class="title-admon">Usuarios</h2></a>
		<span class="spline bColor"></span>
		<p>Administrar los Usuarios del Sistema.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/admin/confbanners"> <img src="{{ asset('/img/icono_banners.png') }}" alt="banners" class=""> </a>
		<a href="{{URL::to('/')}}/admin/confbanners" class="entry-title"><h2 class="title-admon">Configuraci&oacute;n Banners</h2></a>
		<span class="spline bColor"></span>
		<p>Actualizaci&oacute;n de las im&aacute;genes de cabecera de las p&aacute;ginas.</p>
	</div>
</div>-->
@endsection
	
