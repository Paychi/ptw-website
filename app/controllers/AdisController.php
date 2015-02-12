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
		return $this->layout->content = View::make('adis.index_adis');
	}
	
	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
	}
		
	public function getEventos()
	{
		return $this->layout->content = View::make('adis.eventos');
	}
}
