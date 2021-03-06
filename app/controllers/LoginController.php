<?php 
class LoginController extends BaseController
{

	public $restful = true;
	
	protected $layout = 'layouts.layout_login';
	private $rand1 = 0;
	private $rand2 = 0;	

	public function getIndex()
	{
		/*if(Auth::user())
		{
			return Redirect::to('admin');
		}*/

		if(Session::has('usuario_temp'))
		{
			Session::forget('usuario_temp');
		}

		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil == 1)
				return Redirect::to('/sisadm');
			if($session_user[0]->perfil->id_perfil == 2)
				return Redirect::to('/adis');
			if($session_user[0]->perfil->id_perfil == 3)
				return Redirect::to('/colaborador');
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
				if($us[0]->first_login == 0)
				{
					Session::put('usuario_temp',$us[0]->nombre_usuario);
					return Redirect::to('login/firstlogin');
				}else{
					if ($us[0]->perfil->estado == 1) {
						Session::put('usuario',$us[0]->nombre_usuario);
						switch ($us[0]->perfil->id_perfil) {
							case 1:
								return Redirect::to('sisadm');
								break;

							case 2:
								return Redirect::to('adis');
								break;

							case 3:
								return Redirect::to('colaborador');
								break;
							
							default:
								
								break;
						}
					} else {
						return Redirect::to('perfil');
					}
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

	public function getForgotpw()
	{
		if(Session::has('eq'))
		{
			Session::forget('eq');
		}
		$this->rand1 = rand(1,9);
		$this->rand2 = rand(1,9);
		$r1 = $this->rand1;
		$r2 = $this->rand2;
		Session::put('eq',$r1 + '+' + $r2);
		return $this->layout->content = View::make('login.forgot',compact("r1","r2"));
	}

	public function postCompsum()
	{
		if(Session::has('eq'))
		{
			$suma = Session::get('eq');
			$inputs = Input::All();
			$respuesta = $inputs["param"];
			if ($respuesta == $suma)
			{
				echo "true";
			}else{
				echo "false";
			}
		}		
		exit(0);
	}

	public function postRetrypw()
	{
		$inputs = Input::All();
		$validaciones = array
		(
			'username' => 'required',
			'answer' => 'required'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio."
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else{
			if(Session::has('eq'))
			{
				$suma = Session::get('eq');
				$respuesta = $inputs["solution"];
				if ($respuesta == $suma)
				{
					$user = Usuarios::whereRaw('nombre_usuario=?',[$inputs["username"]])->get();

					if($user != null)
					{
						if($user[0]->first_login == 0)
						{
							Session::put('usuario_temp',$user[0]->nombre_usuario);
							return Redirect::to('login/firstlogin');
						}else
						{
							$lista = array(
							0 => "Primer apellido", 
							1 => "Luguar de nacimiento", 
							2 => "Nombre de tu primer mascota",
							3 => "Comida favorita");

							$id_user = $user[0]->id_usuario;
							$p = Preguntas::whereRaw('id_usuario=?',[$id_user])->get();

							if ($inputs["select_answer"] < 4) {
								if(($p[0]->pregunta == $lista[$inputs["select_answer"]]) && ($p[0]->respuesta == $inputs["answer"]))
								{
									Session::put('usuario_temp',$inputs["username"]);
									return Redirect::to('login/change');
								}
								else
								{
									return Redirect::back()->with('error_cambio','Información Incorrecta');
								}
							}else{
								if($p[0]->respuesta == $inputs["answer"])
								{
									Session::put('usuario_temp',$inputs["username"]);
									return Redirect::to('login/change');
								}
								else
								{
									return Redirect::back()->with('error_cambio','Información Incorrecta');
								}
							}
						}
					}else{
						return Redirect::back()->with('error_cambio','Información Incorrecta');
					}

				}else{
					return Redirect::back()->with('error_cambio','Usted no es humano');
				}
			}
		}		
	}

	public function getFirstlogin()
	{
		if(Session::has('usuario_temp'))
		{
			$usuario_temp = Session::get('usuario_temp');

			return $this->layout->content = View::make('login.firstlogin',compact("usuario_temp"));
		}else{
			return Redirect::to('login');
		}		
	}

	public function postFirstchange()
	{
		try {
			//DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				
				'answer' => 'required',
				'new_password' => 'required',
				'con_password' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio."
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else{

				if($inputs["new_password"] == $inputs["con_password"])
				{
					$preg = "";

					$lista = array(
						0 => "Primer apellido", 
						1 => "Luguar de nacimiento", 
						2 => "Nombre de tu primer mascota",
						3 => "Comida favorita");

					if ($inputs["select_answer"] == 4) {
						$preg = $inputs["ask"];
					}else{
						$preg = $lista[$inputs["select_answer"]];
					}

					$id_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario_temp')])->get();
					$p = new Preguntas;
					$p->id_usuario = $id_user[0]->id_usuario;
					$p->pregunta = $preg;
					$p->respuesta = $inputs["answer"];
					$p->save();

					$u = Usuarios::find($id_user[0]->id_usuario);
					$u->contrasena = Crypt::encrypt($inputs["con_password"]);
					$u->first_login = 1;
					$u->save();

					Session::forget('usuario_temp');
					DB::commit();

					if ($id_user[0]->perfil->estado == 1) {
						Session::put('usuario',$id_user[0]->nombre_usuario);
						switch ($id_user[0]->perfil->id_perfil) {
							case 1:
								return Redirect::to('sisadm');
								break;

							case 2:
								return Redirect::to('adis');
								break;

							case 3:
								return Redirect::to('colaborador');
								break;
							
							default:
								
								break;
						}
					} else {
						return Redirect::to('perfil');
					}
				}
				else{
					return Redirect::back()->with('error_cambio','¡las contraseñas no coenciden!');
				}
			}

		} catch (Exception $e) {
			DB::rollback();
			
			Session::flash('error_cambio','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/login/firstlogin');

			
		}
	}

	public function getChange()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario_temp'))
		{
			/*$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');*/
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡No puedes acceder a esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('login.change');
	}

	public function postChange()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario_temp'))
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
				$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario_temp')])->get();				
				
				$new_pass = $inputs["new_password"];
				$con_pass = $inputs["con_password"];
				
				if($new_pass != $con_pass)
				{
					return Redirect::to('/login/change')->with('error_cambio','¡Las contrase&ntilde;as no coenciden!');
				}
				else 
				{
					$usuario_bd = Usuarios::find($session_user[0]->id_usuario);
					$usuario_bd->contrasena = Crypt::encrypt($new_pass);
					$usuario_bd->save();

					Session::forget('usuario_temp');
					return Redirect::to('/login')->with('mensaje','Contraseña actualizada correctamente, inicie sesión nuevamente.');
				}
			}
			
		}catch(Exception $e)
		{
			DB::rollback();
			return Redirect::to('/login/change')->with('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.<br />'.$e);
		}				
	}
}
