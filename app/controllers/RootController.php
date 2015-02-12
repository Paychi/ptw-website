<?php

class RootController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Root Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/es', 'RootController');
	|
	*/
	public $restful = true;
	protected $layout = 'layouts.home';

	public function getIndex()
	{
		return $this->layout->content = View::make('site.inicio');
	}
	
	public function getWaslala()
	{
		return $this->layout->content = View::make('site.waslala');
	}
	
	public function getAbout()
	{
		return $this->layout->content = View::make('site.about');
	}
	
	public function getColaboradores()
	{
		return $this->layout->content = View::make('site.colaboradores');
	}
	
	public function postSearch()
	{
		$valores = Input::All();
		return $this->layout->content = View::make('site.search',compact("valores"));
	}
	
	/*public function getLogin()
	{
		return $this->layout->content = View::make('login.index');
	}
	public function postLogin()
	{
		$valores = Input::All();
		$usernamepost = $valores["username"];
		$passwordpost = $valores["password"];
				
		if($usernamepost != "alvin" || $passwordpost != "paychi")
		{
			if($usernamepost != "alvin")
			{
				$validaciones = array
				(
					'username' => 'Usuario no existe',
					'password' => ''
				);		
			}
			if($passwordpost != "paychi")
			{
				$validaciones = array
				(
					'username' => '',
					'password' => 'Contraseña no valida'
				);	
			}
			if($usernamepost != "alvin" && $passwordpost != "paychi")
			{
				$validaciones = array
				(
					'username' => 'Usuario no existe',
					'password' => 'Contraseña no valida'
				);	
			}
			return Redirect::back() -> withErrors($validaciones);
		}else
		{			
			return Redirect::to('admon');
		}
	}*/
	public function getCreditos()
	{
		return $this->layout->content = View::make('site.creditos');
	}
	
	public function getAdmon()
	{
		return $this->layout->content = View::make('admon.index_admon');
	}
	
	public function getDetalle($dato=null)
	{
		return $this->layout->content = View::make('site.detallenoticia',compact("dato"));
	}
	
}
