<?php 
class LoginController extends BaseController
{

	public $restful = true;
	
	protected $layout = 'layouts.layout_login';
	

	public function getIndex()
	{
		/*if(Auth::user())
		{
			return Redirect::to('admin');
		}*/

		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil == 1)
				return Redirect::to('/admin');
			if($session_user[0]->perfil->id_perfil == 2)
				return Redirect::to('/adis');
		}
		
		return $this->layout->content = View::make('login.index');
	}

	public function postIndex()
	{
		DB::beginTransaction();
		$valores = Input::All();
		$usernamepost = $valores["username"];
		$passwordpost = $valores["password"];
		$userdata = array(

			'username' => 'alvin',
			'password'=> 'paychi'

		); 
		
		$us = Usuarios::whereRaw('nombre_usuario=?', [Input::get('username')])->get();
		if (count($us)>0)
		{
			if(Crypt::decrypt($us[0]->contrasena)==Input::get('password'))
			{
				
				
				//if($us[0]->usuario_perfil->perfil->id_perfil== 0)

				if ($us[0]->perfil->estado == 1) {
					Session::put('usuario',$us[0]->nombre_usuario);
					switch ($us[0]->perfil->id_perfil) {
						case 1:
							return Redirect::to('admin');
							break;

						case 2:
							return Redirect::to('adis');
							break;
						
						default:
							
							break;
					}
				} else {
					return Redirect::to('perfil');
				}
					
			}
			else
			{
				return Redirect::to('login')->with('error_login', true);
			}
		}
		else
		{
			return Redirect::to('login')->with('error_login', true);
		}

		/*if(Auth::attempt($userdata, true))
		{

			return Redirect::to('admin');

		}else{
			return Redirect::to('login')->with('error_login', true);

		}*/
		/*if ($usernamepost == "admon" && $passwordpost == "perfil01")
			return Redirect::to('admin');
			
		if ($usernamepost == "adis" && $passwordpost == "perfil02")
			return Redirect::to('adis');
			
		return Redirect::to('login')->with('error_login', true);*/
	}
	
	public function getClave()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			/*$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');*/
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('login.clave');
	}
	
	public function postClave()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			/*$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');*/
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try{
			//DB::beginTransaction();
			$inputs = Input::All();
			
			$validaciones = array
			(
				'old_password' => 'required',
				'new_password' => 'required',
				'con_password' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{
				$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();				
				$pass_actualform = $inputs["old_password"];
				$pass_actualbd = Crypt::decrypt($session_user[0]->contrasena);
				
				if($pass_actualform != $pass_actualbd)
				{
					return Redirect::to('/login/clave')->with('error_cambio','¡Contrase&ntilde;a actual invalida!');
				}
				else
				{
					$new_pass = $inputs["new_password"];
					$con_pass = $inputs["con_password"];
					
					if($new_pass != $con_pass)
					{
						return Redirect::to('/login/clave')->with('error_cambio','¡Las contrase&ntilde;as no coenciden!');
					}
					else 
					{
						$usuario_bd = Usuarios::find($session_user[0]->id_usuario);
						$usuario_bd->contrasena = Crypt::encrypt($new_pass);
						$usuario_bd->save();
						
						return Redirect::to('/');
					}
				}
			}
			
		}catch(Exception $e)
		{
			DB::rollback();
			return Redirect::to('/login/clave')->with('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.<br />'.$e);
		}				
	}

	public function getUsuario()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			/*$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');*/
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('login.usuario');
	}

	public function postUsuario()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			/*$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');*/
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try{
			//DB::beginTransaction();
			$inputs = Input::All();
			
			$validaciones = array
			(
				'nombre_usuario' => 'required|unique:usuario',
				'con_pass_user' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"unique" => "Usuario ya existe"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{
				$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();				
				$pass_form = $inputs["con_pass_user"];
				$pass_bd = Crypt::decrypt($session_user[0]->contrasena);
				
				if($pass_form != $pass_bd)
				{
					return Redirect::to('/login/usuario')->with('error_cambio','¡Contrase&ntilde;a invalida!');
				}
				else
				{				
					$usuario_bd = Usuarios::find($session_user[0]->id_usuario);
					$usuario_bd->nombre_usuario = $inputs["nombre_usuario"];
					$usuario_bd->save();

					Session::put('usuario',$inputs["nombre_usuario"]);					
					return Redirect::to('/');
				}
			}
			
		}catch(Exception $e)
		{
			DB::rollback();
			return Redirect::to('/login/usuario')->with('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.<br />'.$e);
		}				
	}
}
