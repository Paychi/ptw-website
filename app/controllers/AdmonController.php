<?php

class AdmonController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Admon Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/admon', 'AdmonController');
	|
	*/
	
	public $restful = true;
	protected $layout = 'layouts.layout_admon';
	
	public function construct()
	{
		parent::construct();		
		$this->filter('before', 'auth');
	}
	
	public function getIndex()
	{
		return $this->layout->content = View::make('admon.index_admon');
	}
	
	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
	}
	
	public function getNoticias()
	{
		return $this->layout->content = View::make('admon.noticias');
	}
	
	public function getEventos()
	{
		return $this->layout->content = View::make('admon.eventos');
	}
	
	public function getUsuarios()
	{
		return $this->layout->content = View::make('admon.usuarios');
	}
}
