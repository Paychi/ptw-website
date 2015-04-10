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
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'titulo' => 'required|min:5',
				'estracto' => 'required|min:5',
				'contenido' => 'required|min:5',
				'fecha' => 'required|min:5'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{			
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
					$n->fecha_noticia = $inputs["fecha"];
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
				'fecha' => 'required|min:5'
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
				$eu = Noticias::find($inputs["id"]);
				$eu->titulo = $inputs["titulo"];
				$eu->estracto = $inputs["estracto"];
				$eu->descripcion = $inputs["contenido"];
				$eu->fecha_noticia = $inputs["fecha"];
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
		
		$perfiles = Perfiles::all()->lists('nombre', 'id_perfil');	
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
		$perfiles = Perfiles::all()->lists('nombre', 'id_perfil');	
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
			'apellidos' => 'required|min:5',
			'nombre_user' => 'required',
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
			$eu = Usuarios::find($inputs["id"]);
			$p = $eu->id_perfil;
			$user = $eu->nombre_usuario;
			$eu->id_perfil = $inputs["perfil"];
			$eu->nombres = $inputs["nombres"];
			$eu->apellidos = $inputs["apellidos"];
			$eu->nombre_usuario = $inputs["nombre_user"];
			$eu->contrasena = Crypt::encrypt($inputs["pass_user"]);
			$eu->estado = 1;
			$eu->save();
			if ($p == 1 && $user == Session::get('usuario'))
				Session::put('usuario',$inputs["nombre_user"]);
			Session::flash('mensaje','Registro editado correctamente!!');
			return Redirect::to('/admin/usuarios');
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
			'nombre_user' => 'required',
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
			$nu = new Usuarios;
			$nu->id_perfil = $inputs["perfil"];;
			$nu->nombres = $inputs["nombres"];
			$nu->apellidos = $inputs["apellidos"];
			$nu->nombre_usuario = $inputs["nombre_user"];
			$nu->contrasena = Crypt::encrypt($inputs["pass_user"]);
			$nu->estado = 1;
			$nu->save();
			Session::flash('mensaje','Registro ingresado correctamente!!');
			return Redirect::to('/admin/usuarios');	
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
				'fecha' => 'required|min:5'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
				
			}else
			{			
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
					$c->fecha_colaborador = $inputs["fecha"];
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
				'fecha' => 'required|min:5'
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
				$ec = Colaboradores::find($inputs["id"]);
				$ec->nombre = $inputs["nombre"];
				$ec->abreviatura = $inputs["abreviatura"];
				$ec->descripcion = $inputs["descripcion"];
				$ec->sitio_web = $inputs["website"];
				$ec->fecha_colaborador = $inputs["fecha"];
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
}
