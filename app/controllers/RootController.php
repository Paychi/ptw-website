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
		try
		{
			$datos = Noticias::paginate(3);
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			return $this->layout->content = View::make('site.inicio',compact("datos","perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getWaslala()
	{
		try
		{
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			return $this->layout->content = View::make('site.waslala',compact("perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getAbout()
	{
		try
		{
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			return $this->layout->content = View::make('site.about',compact("perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getColaboradores()
	{
		try
		{
			$datos = Colaboradores::all();
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			return $this->layout->content = View::make('site.colaboradores',compact("perfil", "datos"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function postSearch()
	{
		try
		{
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			$valores = Input::All();
			$noticiapost = $valores["itemsearch"];
			$datos=Noticias::where('titulo','LIKE','%'.$noticiapost.'%')->get();
			return $this->layout->content = View::make('site.search',compact("noticiapost","datos","perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
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
		try
		{
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			return $this->layout->content = View::make('site.creditos',compact("perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getAdmon()
	{
		try
		{
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			return $this->layout->content = View::make('admon.index_admon',compact("perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	
	public function getDetalle($dato=null)
	{
		try
		{
			$user_login = Usuarios::whereRaw('nombre_usuario=?', [Session::get('usuario')])->get();
			$perfil = 0;
			if (count($user_login)>0)
			{
				if($user_login[0]->perfil->id_perfil == 1)
					$perfil = 1;
					
				if($user_login[0]->perfil->id_perfil == 2)
					$perfil = 2;
			}
			else
			{
				$perfil = 0;
			}
			
			$datos=Noticias::where('titulo','=',$dato)->firstOrFail();
			return $this->layout->content = View::make('site.detallenoticia',compact("datos","perfil"));
		}
		catch(Exception $e )
		{
			return Redirect::to('/error');
		}
	}
	public function getLogout()
	{
		//Auth::logout();
		Session::forget('usuario');
		return Redirect::to('/');
	}
}
