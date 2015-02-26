<?php

class AdisController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Adis Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/adis', 'AdisController');
	|
	*/
	
	public $restful = true;
	protected $layout = 'layouts.layout_adis';
	
	public function construct()
	{
		parent::construct();		
		$this->filter('before', 'auth');
	}
	
	public function getIndex()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 2)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('adis.index_adis');
	}
	
	public function getLogout()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 2)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		//Auth::logout();
		Session::forget('usuario');
		return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
	}
		
	public function getEventos()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 2)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('adis.eventos');
	}
}
