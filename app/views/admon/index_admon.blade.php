@extends('layouts.layout_admon')


@section('content_admon')

<div class="col-lg-12">
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/noticias"> <img src="{{ asset('/img/icon/noticias.svg') }}" alt="noticias" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/noticias" class="entry-title title-admon"><h2 class="title-admon">Noticias</h2></a>
		<span class="spline bColor"></span>
		<p>Configuraci&oacute;n de las Noticas que suceden en el Proyecto.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/colaboradores"> <img src="{{ asset('/img/icon/colaboradores.svg') }}" alt="colaboradores" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/colaboradores" class="entry-title title-admon"><h2 class="title-admon">Colaboradores</h2></a>
		<span class="spline bColor"></span>
		<p>Gestionar los Colaboradores para el Proyecto.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/usuarios"> <img src="{{ asset('/img/icon/usuarios.svg') }}" alt="usuarios" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/usuarios" class="entry-title title-admon"><h2 class="title-admon">Usuarios</h2></a>
		<span class="spline bColor"></span>
		<p>Administrar los Usuarios del Sistema.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/perfiles"> <img src="{{ asset('/img/icon/perfil.svg') }}" alt="perfil" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/perfiles" class="entry-title title-admon"><h2 class="title-admon">Configuraci&oacute;n Perfil</h2></a>
		<span class="spline bColor"></span>
		<p>Mantenimientos de Perfil de Usuarios.</p>
	</div>
</div>
<div class="col-lg-12">	
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/confbanners"> <img src="{{ asset('/img/icon/banners.svg') }}" alt="banners" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/confbanners" class="entry-title"><h2 class="title-admon">Configuraci&oacute;n Banners</h2></a>
		<span class="spline bColor"></span>
		<p>Actualizaci&oacute;n de las im&aacute;genes de cabecera de las p&aacute;ginas.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/lideres"> <img src="{{ asset('/img/icon/lideres.svg') }}" alt="lideres" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/lideres" class="entry-title title-admon"><h2 class="title-admon">Lideres</h2></a>
		<span class="spline bColor"></span>
		<p>Lideres de las comunidades del Proyecto.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/comunidades"> <img src="{{ asset('/img/icon/comunidades.svg') }}" alt="comunidades" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/comunidades" class="entry-title title-admon"><h2 class="title-admon">Comunidades</h2></a>
		<span class="spline bColor"></span>
		<p>Comunidades del municipio de Waslala.</p>
	</div>
	<div class="col-lg-3 text-center">
		<a href="{{URL::to('/')}}/sisadm/contactos"> <img src="{{ asset('/img/icon/contactos.svg') }}" alt="contactos" class="icon-item"> </a>
		<a href="{{URL::to('/')}}/sisadm/contactos" class="entry-title"><h2 class="title-admon">Contactos</h2></a>
		<span class="spline bColor"></span>
		<p>Informaci&oacute;n para contactarnos con los principales responsables del proyecto.</p>
	</div>
</div>
@endsection
	
