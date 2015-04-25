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
	
	public function getIndex()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('admon.index_admon');
	}
	
	public function getLogout()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
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
	
	public function getNoticias()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Noticias::paginate(10);
		return $this->layout->content = View::make('admon.noticias',compact("datos"));
	}
	
	public function getAddnoticia()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('admon.addnoticia');
	}
	
	public function postAddnoticia()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try
		{
			//DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'titulo' => 'required|min:5',
				'estracto' => 'required|min:5',
				'contenido' => 'required|min:5',
				'fecha' => 'required|date',
				'archivo' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);

			

			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{	
				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);

				$path = 'uploads/noticias';
				$file = Input::file('archivo');
				$archivo = $file->getClientOriginalName();
				
				$upload = $file->move($path,$archivo);
				
				if($upload)
				{
					$id_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
					$n = new Noticias;
					$n->id_usuario = $id_user[0]->id_usuario;
					$n->titulo = $inputs["titulo"];
					$n->estracto = $inputs["estracto"];
					$n->descripcion = $inputs["contenido"];
					$n->imagen = $archivo;
					$n->fecha_noticia = $newfecha;
					$n->estado = 1;
					$n->save();
					Session::flash('mensaje','Registro ingresado correctamente!!');
					DB::commit();
					return Redirect::to('/admin/noticias');
				}else
				{
					Session::flash('mensaje','No se pudo subir el archivo!!');
					return Redirect::to('/admin/noticias');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/admin/noticias');
		}
	}
	
	public function getEditnoticia($id_noticia = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Noticias::find($id_noticia);
		return $this->layout->content = View::make('admon.editnoticia',compact("datos"));
	}
	
	public function postEditnoticia()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'titulo' => 'required|min:5',
				'estracto' => 'required|min:5',
				'contenido' => 'required|min:5',
				'fecha' => 'required|date'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{		

				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);

				$eu = Noticias::find($inputs["id"]);
				$eu->titulo = $inputs["titulo"];
				$eu->estracto = $inputs["estracto"];
				$eu->descripcion = $inputs["contenido"];
				$eu->fecha_noticia = $newfecha;
				$eu->estado = 1;
				$eu->save();
				Session::flash('mensaje','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/admin/noticias');
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/admin/noticias');
		}
		
	}
	
	public function getDelatenoticia($id_noticia = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$du = Noticias::find($id_noticia);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/admin/noticias');	
	}
	
	public function getEventos()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('admon.eventos');
	}
	
	public function getUsuarios()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Usuarios::paginate(10);
		return $this->layout->content = View::make('admon.usuarios',compact("datos"));
	}
	
	public function getAddusuario()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$selected = array();	
		return $this->layout->content = View::make('admon.addusuario',compact("lista_perfil","selected"));
	}
	
	public function getEditusuario($id_usuario = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Usuarios::find($id_usuario);
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$selected = array($datos->id_perfil);
		return $this->layout->content = View::make('admon.editusuario',compact("datos","lista_perfil","selected"));
	}
	
	public function postEditusuario()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$inputs = Input::All();
		$validaciones = array
		(
			'nombres' => 'required|min:5',
			'apellidos' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Usuario ya existe"
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$num_perfil = $inputs["perfil"];
			/*$passUser = $inputs["pass_user"];
			$conPass = $inputs["conpass_user"];	*/

			if ($num_perfil != 0)
			{
				/*if ($passUser != $conPass) {
					return Redirect::to('/admin/addusuario')->with('mensajeError','Las contrase&ntilde;as no coenciden!!');
				} 
				else 
				{
					
				}*/
				$eu = Usuarios::find($inputs["id"]);
				$p = $inputs["perfil"];
				$p_bd = $eu->id_perfil;
				$user = $eu->nombre_usuario;
				$eu->id_perfil = $inputs["perfil"];
				$eu->nombres = $inputs["nombres"];
				$eu->apellidos = $inputs["apellidos"];
				$eu->estado = 1;
				$eu->save();
				if ($p != $p_bd && $user == Session::get('usuario'))
				{
					switch ($p) {
						case '2':
								return Redirect::to('/adis');
							break;
						
						default:
								return Redirect::to('/login');
							break;
					}
					
				}
				else
				{
					Session::flash('mensaje','Registro editado correctamente!!');
					return Redirect::to('/admin/usuarios');
				}
				//Session::put('usuario',$inputs["nombre_usuario"]);
				/*$p = $eu->id_perfil;
				$user = $eu->nombre_usuario;
				.....
				if ($p != 1 && $user == Session::get('usuario'))
					Session::put('usuario',$inputs["nombre_usuario"]);*/
			}
			else
			{
				return Redirect::to('/admin/editusuario/'.$inputs["id"] )->with('mensajeError','Perfil no Valido!!');	
			}			
		}
	}
	
	public function postAddusuarios()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$inputs = Input::All();		
		$validaciones = array
		(
			'nombres' => 'required|min:5',
			'apellidos' => 'required|min:5',
			'nombre_usuario' => 'required|unique:usuario',
			'pass_user' => 'required'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Usuario ya existe"
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$num_perfil = $inputs["perfil"];
			$passUser = $inputs["pass_user"];
			$conPass = $inputs["conpass_user"];		

			if ($num_perfil != 0)
			{
				if ($passUser != $conPass) {
					return Redirect::to('/admin/addusuario')->with('mensajeError','Las contrase&ntilde;as no coenciden!!');
				} 
				else 
				{
					$nu = new Usuarios;
					$nu->id_perfil = $inputs["perfil"];
					$nu->nombres = $inputs["nombres"];
					$nu->apellidos = $inputs["apellidos"];
					$nu->nombre_usuario = $inputs["nombre_usuario"];
					$nu->contrasena = Crypt::encrypt($passUser);
					$nu->estado = 1;
					$nu->save();
					Session::flash('mensaje','Registro ingresado correctamente!!');
					return Redirect::to('/admin/usuarios');	
				}					
			}
			else
			{
				return Redirect::to('/admin/addusuario')->with('mensajeError','Seleccione un Perfil!!');	
			}
		}
	}
	
	public function getDelateusuario($id_usuario = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$du = Usuarios::find($id_usuario);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/admin/usuarios');	
	}
	
/***   Vista Colaboradores de Administracion   ***/	
	
	public function getColaboradores()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Colaboradores::paginate(10);
		return $this->layout->content = View::make('admon.colaboradores',compact("datos"));
	}
	
	public function getAddcolaborador()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('admon.addcolaborador');
	}
	
	public function postAddcolaborador()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/

		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'nombre' => 'required|min:5',
				'descripcion' => 'required|min:5',
				'abreviatura' => 'required',
				'fecha' => 'required|date',
				'logo' => 'required'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{		
				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);	

				$path = 'uploads/logo_colaboradores';
				$file = Input::file('logo');
				$archivo = $file->getClientOriginalName();
				
				$upload = $file->move($path,$archivo);
				
				if($upload)
				{
					$id_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
					$c = new Colaboradores;
					$c->id_usuario = $id_user[0]->id_usuario;
					$c->nombre = $inputs["nombre"];
					$c->abreviatura = $inputs["abreviatura"];
					$c->descripcion = $inputs["descripcion"];
					$c->logo = $archivo;
					$c->sitio_web = $inputs["website"];
					$c->fecha_colaborador = $newfecha;
					$c->estado = 1;
					$c->save();
					Session::flash('mensaje','Registro ingresado correctamente!!');
					DB::commit();
					return Redirect::to('/admin/colaboradores');
				}else
				{
					Session::flash('mensaje','No se pudo subir el archivo!!');
					return Redirect::to('/admin/colaboradores');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/admin/colaboradores');
		}
	}
	
	public function getEditcolaborador($id_colaborador = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Colaboradores::find($id_colaborador);
		return $this->layout->content = View::make('admon.editcolaborador',compact("datos"));
	}
	
	public function postEditcolaborador()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
	
		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'nombre' => 'required|min:5',
				'descripcion' => 'required|min:5',
				'abreviatura' => 'required',
				'fecha' => 'required|date'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"date" => "La fecha no es valida"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{		
				$fecha = $inputs["fecha"];
				$fecha = str_replace('/', '-', $fecha);
				$fecha_post = strtotime($fecha);
				$newfecha = date("Y-m-d",$fecha_post);	

				$ec = Colaboradores::find($inputs["id"]);
				$ec->nombre = $inputs["nombre"];
				$ec->abreviatura = $inputs["abreviatura"];
				$ec->descripcion = $inputs["descripcion"];
				$ec->sitio_web = $inputs["website"];
				$ec->fecha_colaborador = $newfecha;
				$ec->estado = 1;
				$ec->save();
				Session::flash('mensaje','Registro editado correctamente!!');
				DB::commit();
				return Redirect::to('/admin/colaboradores');
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/admin/colaboradores');
		}		
	}
	
	public function getDelatecolaborador($id_colaborador = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$dc = Colaboradores::find($id_colaborador);
		$dc -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/admin/colaboradores');	
	}
	
	/***   Vista Configuracion para los banners   ***/	
	
	public function getConfbanners()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		return $this->layout->content = View::make('admon.banners');
	}
	
	public function postConfbanners()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
			
		try
		{		
			$inputs = Input::All();		
			$path = 'uploads/header_site';
			$file = $inputs["imagen_banner"];
			$nombre_file = $inputs["nombre_banner"];
			
			$extencion = $file->getClientOriginalExtension();
			$tamano = $file->getSize();
			$imagen_banner = $file->getClientOriginalName();
			
			//$imp= 'nada';
			if($extencion == "png" || $extencion == "jpg" || $extencion == "PNG" || $extencion == "JPG")
			{
				$upload = $file->move($path,$nombre_file);
				if($upload)
				{
					//$imp= '<br /> nombre: '.$imagen_banner.'<br /> tamano: '.$tamano.'<br /> extencion: '.$extencion;
					Session::flash('mensaje','Registro actualizado correctamente!!<br /> sino se muestra la nueva imagen recarge la pagina. Gracias!');
					return Redirect::to('/admin/confbanners');
				}
				else
				{
					Session::flash('mensaje','Error al subir el archivo');
					return Redirect::to('/admin/confbanners');
				}				
			}
			else
			{
				Session::flash('mensaje','Formato Invalido');
				return Redirect::to('/admin/confbanners');
			}				
		}
		catch(Exception $e)
		{			
			Session::flash('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/admin/confbanners');
		}
	}
	
	public function getActbanner($id_banner = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		
		
		return $this->layout->content = View::make('admon.actbanner');
	}

		/***   Vista Configuracion para los Perfiles   ***/	
	
	public function getPerfiles()
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Perfiles::paginate(10);
		return $this->layout->content = View::make('admon.perfiles',compact("datos"));
	}

	public function getEditperfil($id_perfil = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		$datos = Perfiles::find($id_perfil);
		return $this->layout->content = View::make('admon.editperfil',compact("datos"));
	}

	public function postEditperfil($id_perfil = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esa página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try {
			//DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'nombre' => 'required|min:5',
				'descripcion' => 'required|min:5'
			);			
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.", 
				"min" => "Debe tener como minimo 5 caracteres."
			);

			$validar=Validator::make($inputs,$validaciones,$mensajes);

			if ($validar->fails()) 
			{
				return Redirect::back()->withErrors($validar);
			} 
			else 
			{
				$p = Perfiles::find($inputs["id"]);
				$p->nombre = $inputs["nombre"];
				$p->descripcion = $inputs["descripcion"];
				$p->save();
				return Redirect::to('/admin/perfiles')->with('mensaje', 'Registro editado correctamente!!');
			}
			
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('/admin/perfiles')->with('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
		}
	}

	public function getDeshabilitarperfil($id_perfil = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try 
		{
			$dp = Perfiles::find($id_perfil);
			$dp->estado = 0;
			$dp->save();
			return Redirect::to('/admin/perfiles')->with('mensaje','Registro deshabilitado correctamente!!');
		} 
		catch (Exception $e) 
		{
			DB::rollback();
			return Redirect::to('/admin/perfiles')->with('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');			
		}			
	}

	public function getHabilitarperfil($id_perfil = null)
	{
		/***    Validacion para el acceso a las rutas    ***/
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();
			if($session_user[0]->perfil->id_perfil != 1)
				return Redirect::to('/login')->with('mensaje','¡No tiene permiso para acceder a esta página!.');
		}
		else
		{
			return Redirect::to('/login')->with('mensaje','¡Debes iniciar sesión para ver esa página!.');
		}
		/*******     Fin     *******/
		
		try 
		{
			$dp = Perfiles::find($id_perfil);
			$dp->estado = 1;
			$dp->save();
			return Redirect::to('/admin/perfiles')->with('mensaje','Registro habilitado correctamente!!');
		} 
		catch (Exception $e) 
		{
			DB::rollback();
			return Redirect::to('/admin/perfiles')->with('mensaje','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');			
		}			
	}
}
