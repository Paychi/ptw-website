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
	protected $mensaje = null;

	public function accessRutesAdmon()
	{
		/***    Validacion para el acceso a las rutas    ***/
		$access = true;
		if (Session::has('usuario'))
		{
			$session_user = Usuarios::whereRaw('nombre_usuario=?',[Session::get('usuario')])->get();

			if($session_user[0]->perfil->id_perfil != 1)
			{
				$access = false;
				$this->mensaje = '¡No tiene permiso para acceder a esta página!.';
			}
		}
		else
		{
			$access = false;
			$this->mensaje = '¡Debes iniciar sesión para ver esa página!.';			
		}
		/*******     Fin     *******/
		return $access;
	}
	
	public function getIndex()
	{		
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		return $this->layout->content = View::make('admon.index_admon');
	}
	
	public function getLogout()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		//Auth::logout();
		Session::forget('usuario');
		return Redirect::to('login')->with('mensaje','¡Has cerrado sesión correctamente!.');
	}
	
	// Sección Noticias 

	public function getNoticias()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$datos = Noticias::where('titulo', 'LIKE', '%'.$buscar.'%')->orwhere('estracto', 'LIKE', '%'.$buscar.'%')->orderBy('created_at', 'desc')->paginate(10);
		} else {
			$datos = Noticias::orderBy('created_at', 'desc')->paginate(10);
		}

		return $this->layout->content = View::make('admon.noticias',compact("datos"));
	}
	
	public function getAddnoticia()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('admon.addnoticia');
	}
	
	public function postAddnoticia()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
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

				/*echo $file; exit;*/

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
					$n->publicado = 0;
					$n->save();
					Session::flash('mensaje','Registro ingresado correctamente!!');
					DB::commit();
					return Redirect::to('/sisadm/noticias');
				}else
				{
					Session::flash('mensajeError','No se pudo subir el archivo!!');
					return Redirect::to('/sisadm/noticias');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/noticias');
		}
	}
	
	public function getEditnoticia($id_noticia = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Noticias::find($id_noticia);
		return $this->layout->content = View::make('admon.editnoticia',compact("datos"));
	}
	
	public function postEditnoticia()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
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
				return Redirect::to('/sisadm/noticias');
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/noticias');
		}
		
	}
	
	public function getDelatenoticia($id_noticia = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$path = 'uploads/noticias';

		$dn = Noticias::find($id_noticia);
		$nombre_imagen = $dn->imagen;
		$dn -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/sisadm/noticias');	
	}

	public function postPublishnoticia()
	{
		if (!$this->accessRutesAdmon())
		{
			echo "/login";
			echo "*";
			echo $this->mensaje;
			echo "*";
			echo "error";
			exit();	
		}

		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'paramidnew' => 'numeric'
			);		
			$mensajes = array
			(
				"numeric" => "Valor Invalido."
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{	
				$eu = Noticias::find($inputs["paramidnew"]);
				$eu->publicado = 1;
				$eu->save();				
				echo "/sisadm/noticias";
				echo "*";
				echo "La noticia ha sido publicada correctamente!!";
				echo "*";
				echo "done";
				DB::commit();
				exit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			echo "/sisadm/noticias";
			echo "*";
			echo "Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.";
			echo "*";
			echo "error";
			exit();
		}
	}

	public function postUnpublishnoticia()
	{
		if (!$this->accessRutesAdmon())
		{
			echo "/login";
			echo "*";
			echo $this->mensaje;
			echo "*";
			echo "error";
			exit();	
		}

		try
		{
			DB::beginTransaction();
			$inputs = Input::All();
			$validaciones = array
			(
				'paramidnew' => 'numeric'
			);		
			$mensajes = array
			(
				"numeric" => "Valor Invalido."
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{	
				$eu = Noticias::find($inputs["paramidnew"]);
				$eu->publicado = 0;
				$eu->save();				
				echo "/sisadm/noticias";
				echo "*";
				echo "La noticia ha sido ocultada correctamente!!";
				echo "*";
				echo "done";
				DB::commit();
				exit();
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			echo "/sisadm/noticias";
			echo "*";
			echo "Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.";
			echo "*";
			echo "error";
			exit();
		}
	}

	public function getUpload($id_noticia = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		//$datos = Preguntas::find($id_noticia);
		return $this->layout->content = View::make('admon.upload',compact("id_noticia"));
		//return $this->layout->content = View::make('admon.upload');
	}

	public function postUploads()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {

			$file_imagen = Request::file('imagen');
			$file_video = Request::file('video');
			$id_noticia = Request::input('id');
			$d_imagen = Request::input('descriptionimagen');
			$d_video = Request::input('descriptionvideo');

			$path_imagen = 'uploads/noticias/imagenes';
			$path_video = 'uploads/noticias/videos';

			if ($file_imagen != null && $file_video != null){
				$extencion_imagen = $file_imagen->getClientOriginalExtension();
				$extencion_video = $file_video->getClientOriginalExtension();
				
				if($extencion_imagen == "png" || $extencion_imagen == "jpg" || $extencion_imagen == "PNG" || $extencion_imagen == "JPG")
				{
					if($extencion_video == "mp4" || $extencion_video == "avi" || $extencion_video == "MP4" || $extencion_video == "AVI")
					{
						
					}else{
						return Redirect::back()->with('mensajeError','Formato del video invalido!!');
					}
				}
				else{
					return Redirect::back()->with('mensajeError','Formato de la imagen invalido!!');
				}

				$archivo_imagen = $file_imagen->getClientOriginalName();
				$upload = $file_imagen->move($path_imagen,$archivo_imagen);				
				if($upload)
				{
					$m = new Multimedias;
					$m->id_noticia = $id_noticia;
					$m->tipo = "imagen";
					$m->archivo = $archivo_imagen;
					$m->descripcion = $d_imagen;
					$m->save();
					//DB::commit();
				}else
				{
					DB::rollback();
					return Redirect::back()->with('mensajeError','No se pudo subir la imagen!!');
				}

				$archivo_video = $file_video->getClientOriginalName();
				$upload = $file_video->move($path_video,$archivo_video);				
				if($upload)
				{					
					$m = new Multimedias;
					$m->id_noticia = $id_noticia;
					$m->tipo = "video";
					$m->archivo = $archivo_video;
					$m->descripcion = $d_video;
					$m->save();
					//DB::commit();
				}else
				{
					DB::rollback();
					return Redirect::back()->with('mensajeError','No se pudo subir el video!!');
				}

				DB::commit();
				Session::flash('mensaje','Registros ingresados correctamente!!');
				return Redirect::to('/sisadm/noticias');
				
			}else{
				if ($file_imagen != null) {
					$extencion_imagen = $file_imagen->getClientOriginalExtension();
					
					if($extencion_imagen == "png" || $extencion_imagen == "jpg" || $extencion_imagen == "PNG" || $extencion_imagen == "JPG")
					{
						
					}else{
						return Redirect::back()->with('mensajeError','Formato de la imagen invalido!!');
					}

					$archivo_imagen = $file_imagen->getClientOriginalName();
					$upload = $file_imagen->move($path_imagen,$archivo_imagen);				
					if($upload)
					{
						$m = new Multimedias;
						$m->id_noticia = $id_noticia;
						$m->tipo = "imagen";
						$m->archivo = $archivo_imagen;
						$m->descripcion = $d_imagen;
						$m->save();
						DB::commit();
						Session::flash('mensaje','Registro ingresado correctamente!!');
						return Redirect::to('/sisadm/noticias');
					}else
					{
						DB::rollback();
						return Redirect::back()->with('mensajeError','No se pudo subir la imagen!!');
					}
				}
				else{
					if($file_video != null)
					{
						$extencion_video = $file_video->getClientOriginalExtension();
						
						if($extencion_video == "mp4" || $extencion_video == "avi" || $extencion_video == "MP4" || $extencion_video == "AVI")
						{
							
						}
						else{
							return Redirect::back()->with('mensajeError','Formato del video invalido!!');
						}

						$archivo_video = $file_video->getClientOriginalName();
						$upload = $file_video->move($path_video,$archivo_video);				
						if($upload)
						{					
							$m = new Multimedias;
							$m->id_noticia = $id_noticia;
							$m->tipo = "video";
							$m->archivo = $archivo_video;
							$m->descripcion = $d_video;
							$m->save();
							DB::commit();
							Session::flash('mensaje','Registro ingresado correctamente!!');
							return Redirect::to('/sisadm/noticias');
						}else
						{
							DB::rollback();
							return Redirect::back()->with('mensajeError','No se pudo subir el video!!');
						}
					}
					else{
						return Redirect::back()->with('mensajeError', 'No hay datos cargados, favor cargue una imagen o video');
					}
				}
			}

		} catch (Exception $e) {
			DB::rollback();
			return Redirect::back()->with('mensajeError', 'Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
		}
	}

	//Sección Eventos 
	
	public function getEventos()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('admon.eventos');
	}
	
	//Sección Usuarios

	public function getUsuarios()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$tipo = htmlspecialchars(Input::get('tipo'));

			switch ($tipo) {
				case 0: //Nombres ó Apellidos
					$datos = Usuarios::where('nombres', 'LIKE', '%'.$buscar.'%')->orwhere('apellidos', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				case 1: //Nombre de Usuario
					$datos = Usuarios::where('nombre_usuario', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;
				
				case 2: //Perfil
					$perfil = Perfiles::where('nombre', '=', $buscar)->get();
					if ($perfil->count() == 0) {
						$datos = Usuarios::where('id_perfil', '=', null)->paginate(5);
					}else{
						$datos = Usuarios::where('id_perfil', '=', $perfil[0]->id_perfil)->paginate(5);
					}
					break;

				default:
					
					break;
			}
		} else {
			$datos = Usuarios::paginate(10);
		}
	
		return $this->layout->content = View::make('admon.usuarios',compact("datos"));
	}
	
	public function getAddusuario()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$colaboradores = Colaboradores::lists('abreviatura', 'id_colaborador');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$lista_colaboradores = array(0 => "--- Seleccione --- ") + $colaboradores;
		$selected = array();
		$item_selected = array();	
		return $this->layout->content = View::make('admon.addusuario',compact("lista_perfil","selected","lista_colaboradores","item_selected"));
	}
	
	public function getEditusuario($id_usuario = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Usuarios::find($id_usuario);
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$colaboradores = Colaboradores::lists('abreviatura', 'id_colaborador');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$lista_colaboradores = array(0 => "--- Seleccione --- ") + $colaboradores;
		$selected = array($datos->id_perfil);
		$item_selected = array($datos->id_colaborador);	
		return $this->layout->content = View::make('admon.editusuario',compact("datos","lista_perfil","selected","lista_colaboradores","item_selected"));
	}
	
	public function postEditusuario()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
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
		//echo $inputs["colaborador"]; exit;
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

				if ($num_perfil == 1)
					$eu->id_colaborador = $inputs["colaborador"];
				if ($num_perfil == 2)
					$eu->id_colaborador = $inputs["isadminHide"];
				if ($num_perfil == 3)
					$eu->id_colaborador = $inputs["colaborador"];

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
					return Redirect::to('/sisadm/usuarios');
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
				return Redirect::to('/sisadm/editusuario/'.$inputs["id"] )->with('mensajeError','Perfil no Valido!!');	
			}			
		}
	}
	
	public function postAddusuarios()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();		
		$validaciones = array
		(
			'nombres' => 'required|min:5',
			'apellidos' => 'required|min:5',
			'nombre_usuario' => 'required|unique:usuario'
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
			$conPass = $inputs["conpass_user"];*/		

			if ($num_perfil != 0)
			{
				/*if ($passUser != $conPass) {
					return Redirect::to('/admin/addusuario')->with('mensajeError','Las contrase&ntilde;as no coenciden!!');
				} 
				else 
				{*/
				$nu = new Usuarios;
				$nu->id_perfil = $inputs["perfil"];

				if ($num_perfil == 1)
					$nu->id_colaborador = $inputs["colaborador"];
				if ($num_perfil == 2)
					$nu->id_colaborador = $inputs["isadminHide"];
				if ($num_perfil == 3)
					$nu->id_colaborador = $inputs["colaborador"];

				$nu->nombres = $inputs["nombres"];
				$nu->apellidos = $inputs["apellidos"];
				$nu->nombre_usuario = $inputs["nombre_usuario"];
				$nu->contrasena = Crypt::encrypt("Temporal1234");
				$nu->estado = 1;
				$nu->save();
				Session::flash('mensaje','Registro ingresado correctamente!!');
				return Redirect::to('/sisadm/usuarios');	
				//}					
			}
			else
			{
				return Redirect::to('/sisadm/addusuario')->with('mensajeError','Seleccione un Perfil!!');	
			}
		}
	}
	
	public function getDelateusuario($id_usuario = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$du = Usuarios::find($id_usuario);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/sisadm/usuarios');	
	}
	
/***   Vista Colaboradores de Administracion   ***/	
	
	public function getColaboradores()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$datos = Colaboradores::where('nombre', 'LIKE', '%'.$buscar.'%')->orwhere('descripcion', 'LIKE', '%'.$buscar.'%')->paginate(5);
		} else {
			$datos = Colaboradores::paginate(10);
		}

		return $this->layout->content = View::make('admon.colaboradores',compact("datos"));
	}
	
	public function getAddcolaborador()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('admon.addcolaborador');
	}
	
	public function postAddcolaborador()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

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
					return Redirect::to('/sisadm/colaboradores');
				}else
				{
					Session::flash('mensajeError','No se pudo subir el archivo!!');
					return Redirect::to('/sisadm/colaboradores');
				}
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/colaboradores');
		}
	}
	
	public function getEditcolaborador($id_colaborador = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Colaboradores::find($id_colaborador);
		return $this->layout->content = View::make('admon.editcolaborador',compact("datos"));
	}
	
	public function postEditcolaborador()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
	
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
				return Redirect::to('/sisadm/colaboradores');
			}
		}
		catch(Exception $e)
		{
			DB::rollback();
			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/colaboradores');
		}		
	}
	
	public function getDelatecolaborador($id_colaborador = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$dc = Colaboradores::find($id_colaborador);
		$dc -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/sisadm/colaboradores');	
	}
	
	/***   Vista Configuracion para los banners   ***/	
	
	public function getConfbanners()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		return $this->layout->content = View::make('admon.banners');
	}
	
	public function postConfbanners()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
			
		try
		{		
			$inputs = Input::All();		
			$path = 'uploads/header_site';
			$file = $inputs["imagen_banner"];
			$nombre_file = $inputs["nombre_banner"];

			if ($file != null) {
				$extencion = $file->getClientOriginalExtension();
				$tamano = $file->getSize();
				$imagen_banner = $file->getClientOriginalName();
				
				//$imp= 'nada';
				if($extencion == "png" || $extencion == "PNG")
				{
					$upload = $file->move($path,$nombre_file);
					if($upload)
					{
						//$imp= '<br /> nombre: '.$imagen_banner.'<br /> tamano: '.$tamano.'<br /> extencion: '.$extencion;
						Session::flash('mensaje','Registro actualizado correctamente!!<br /> sino se muestra la nueva imagen recarge la pagina. Gracias!');
						return Redirect::to('/sisadm/confbanners');
					}
					else
					{
						Session::flash('mensajeError','Error al subir el archivo');
						return Redirect::to('/sisadm/confbanners');
					}				
				}
				else
				{
					Session::flash('mensajeError','Formato Invalido');
					return Redirect::to('/sisadm/confbanners');
				}
			} else {
				return Redirect::to('/sisadm/confbanners')->with('mensajeError', 'El Archivo es Requerido');
			}	
		}
		catch(Exception $e)
		{			
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/confbanners');
		}
	}
	
	public function getActbanner($id_banner = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}	
		
		return $this->layout->content = View::make('admon.actbanner');
	}

		/***   Vista Configuracion para los Perfiles   ***/	
	
	public function getPerfiles()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$datos = Perfiles::where('nombre', 'LIKE', '%'.$buscar.'%')->paginate(5);
		} else {
			$datos = Perfiles::paginate(10);
		}
		
		return $this->layout->content = View::make('admon.perfiles',compact("datos"));
	}

	public function getEditperfil($id_perfil = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Perfiles::find($id_perfil);
		return $this->layout->content = View::make('admon.editperfil',compact("datos"));
	}

	public function postEditperfil($id_perfil = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
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
				return Redirect::to('/sisadm/perfiles')->with('mensaje', 'Registro editado correctamente!!');
			}
			
		} catch (Exception $e) {
			DB::rollback();
			return Redirect::to('/sisadm/perfiles')->with('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
		}
	}

	public function getDeshabilitarperfil($id_perfil = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		try 
		{
			$dp = Perfiles::find($id_perfil);
			$dp->estado = 0;
			$dp->save();
			return Redirect::to('/sisadm/perfiles')->with('mensaje','Registro deshabilitado correctamente!!');
		} 
		catch (Exception $e) 
		{
			DB::rollback();
			return Redirect::to('/sisadm/perfiles')->with('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');			
		}			
	}

	public function getHabilitarperfil($id_perfil = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		try 
		{
			$dp = Perfiles::find($id_perfil);
			$dp->estado = 1;
			$dp->save();
			return Redirect::to('/sisadm/perfiles')->with('mensaje','Registro habilitado correctamente!!');
		} 
		catch (Exception $e) 
		{
			DB::rollback();
			return Redirect::to('/sisadm/perfiles')->with('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');			
		}			
	}









	/**************************************SECCIÓN LÍDERES Y COMUNIDADES*************************************/

	/********Líderes********/
	public function getLideres()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$tipo = htmlspecialchars(Input::get('tipo'));

			switch ($tipo) {
				case 0: //Nombre
					$datos = Lideres::where('nombre', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				case 1: //Comunidad
					$comunidad = Comunidades::where('nombreComunidad', '=', $buscar)->get();
					if ($comunidad->count() == 0) {
						$datos = Comunidades::where('id_comunidad', '=', null)->paginate(5);
					}else{
						$datos = Comunidades::where('id_comunidad', '=', $perfil[0]->id_perfil)->paginate(5);
					}

				default:
					
					break;
			}
		} else {
			$datos = Lideres::paginate(10);
		}
	
		return $this->layout->content = View::make('admon.lideres',compact("datos"));
	}

	public function getAddlider()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$colaboradores = Colaboradores::lists('abreviatura', 'id_colaborador');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$lista_colaboradores = array(0 => "--- Seleccione --- ") + $colaboradores;
		$selected = array();

		$comunidades = Comunidades::whereRaw('id_comunidad>0')->lists('nombreComunidad', 'id_comunidad');			
		$lista_comunidad = array(0 => "--- Seleccione --- ") + $comunidades;

		$item_selected = array();	
		return $this->layout->content = View::make('admon.addlider',compact("lista_comunidad","selected","lista_colaboradores","item_selected"));
	}
	
	public function getEditlider($id_lider = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Lideres::find($id_lider);

		$comunidades = Comunidades::whereRaw('id_comunidad>0')->lists('nombreComunidad', 'id_comunidad');			
		$lista_comunidad = array(0 => "--- Seleccione --- ") + $comunidades;
		$selected = array($datos->id_comunidad);

		return $this->layout->content = View::make('admon.editlider',compact("datos","lista_comunidad","selected"));
	}
	
	public function postEditlider()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();
		$validaciones = array
		(
			'nombre' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Lider ya existe"
		);
		//echo $inputs["colaborador"]; exit;
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$nombreLider = $inputs["nombre"];

			if ($nombreLider != "")
			{
				$eu = Lideres::find($inputs["id"]);

				$eu->nombre = $inputs["nombre"];
				$eu->id_comunidad = $inputs["comunidad"];


				$eu->estado = 1;
				$eu->save();
				
				Session::flash('mensaje','Registro editado correctamente!!');
				return Redirect::to('/sisadm/lideres');
				
			}
			else
			{
				return Redirect::to('/sisadm/editlider/'.$inputs["id"] )->with('mensajeError','Perfil no Valido!!');	
			}			
		}
	}
	
	public function postAddlideres()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();		
		$validaciones = array
		(
			'nombre' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Lider ya existe"
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$campoNombre = $inputs["nombre"];
			
			if ($campoNombre != "")
			{
			
				$nu = new Lideres;
				$nu->nombre = $inputs["nombre"];
				$nu->id_comunidad = $inputs["comunidad"];

				$nu->estado = 1;

				$nu->save();
				Session::flash('mensaje','Registro ingresado correctamente!!');
				return Redirect::to('/sisadm/lideres');	
				//}					
			}
			else
			{
				return Redirect::to('/sisadm/addlider')->with('mensajeError','Seleccione un Perfil!!');	
			}
		}
	}
	
	public function getDeletelider($id_lider = null)
	{		
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$du = Lideres::find($id_lider);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/sisadm/lideres');	
	}








	/********Comunidades********/
	public function getComunidades()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$tipo = htmlspecialchars(Input::get('tipo'));

			switch ($tipo) {
				case 0: //Nombre
					$datos = Comunidades::where('nombreComunidad', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				default:
					
					break;
			}
		} else {
			$datos = Comunidades::paginate(10);
		}
	
		return $this->layout->content = View::make('admon.comunidades',compact("datos"));
	}

	public function getAddcomunidad()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$perfiles = Perfiles::whereRaw('estado=1')->lists('nombre', 'id_perfil');	
		$colaboradores = Colaboradores::lists('abreviatura', 'id_colaborador');	
		$lista_perfil = array(0 => "--- Seleccione --- ") + $perfiles;
		$lista_colaboradores = array(0 => "--- Seleccione --- ") + $colaboradores;
		$selected = array();
		$item_selected = array();	
		return $this->layout->content = View::make('admon.addcomunidad',compact("lista_perfil","selected","lista_colaboradores","item_selected"));
	}
	
	public function getEditcomunidad($id_comunidad = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Comunidades::find($id_comunidad);

		return $this->layout->content = View::make('admon.editcomunidad',compact("datos"));
	}
	
	public function postEditcomunidad()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();
		$validaciones = array
		(
			'nombreComunidad' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Comunidad ya existe"
		);
		//echo $inputs["colaborador"]; exit;
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$nombreComunidad = $inputs["nombreComunidad"];

			if ($nombreComunidad != "")
			{
				$eu = Comunidades::find($inputs["id"]);

				$eu->nombreComunidad = $inputs["nombreComunidad"];
				$eu->codigo_comunidad = $inputs["codigo_comunidad"];
				$eu->descripcion = $inputs["descripcion"];
				
				$eu->save();
				
				Session::flash('mensaje','Registro editado correctamente!!');
				return Redirect::to('/sisadm/comunidades');
				
			}
			else
			{
				return Redirect::to('/sisadm/editcomunidad/'.$inputs["id"] )->with('mensajeError','Perfil no Valido!!');	
			}			
		}
	}
	
	public function postAddcomunidades()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$inputs = Input::All();		
		$validaciones = array
		(
			'nombreComunidad' => 'required|min:5'
		);		
		$mensajes = array
		(
			"required" => "Este campo no puede quedar vacio.",
			"min" => "Debe tener como minimo 5 caracteres",
			"unique" => "Comunidad ya existe"
		);
		
		$validar=Validator::make($inputs,$validaciones,$mensajes);
		
		if($validar->fails())
		{
			return Redirect::back() -> withErrors($validar);
		}else
		{			
			$campoNombre = $inputs["nombreComunidad"];
			
			if ($campoNombre != "")
			{
			
				$nu = new Comunidades;
				$nu->nombreComunidad = $inputs["nombreComunidad"];
				$nu->codigo_comunidad = $inputs["codigo_comunidad"];
				$nu->descripcion = $inputs["descripcion"];


				$nu->save();
				Session::flash('mensaje','Registro ingresado correctamente!!');
				return Redirect::to('/sisadm/comunidades');	
				//}					
			}
			else
			{
				return Redirect::to('/sisadm/addcomunidad')->with('mensajeError','Seleccione un Perfil!!');	
			}
		}
	}
	
	public function getDeletecomunidad($id_comunidad = null)
	{		
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$du = Comunidades::find($id_comunidad);
		$du -> delete();
		Session::flash('mensaje','Registro eliminado correctamente!!');
		return Redirect::to('/sisadm/comunidades');	
	}

	/*** Coctactos ***/

	public function getContactos(){
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		if (isset($_GET["filtro"])) {
			$buscar = htmlspecialchars(Input::get('filtro'));
			$tipo = htmlspecialchars(Input::get('tipo'));

			switch ($tipo) {
				case 0: //Nombres ó Apellidos
					$datos = Contactos::where('nombre', 'LIKE', '%'.$buscar.'%')->orwhere('apellido', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				case 1: //Correo
					$datos = Contactos::where('correo', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;
				
				case 2: //Telefono
					$datos = Contactos::where('telefono', 'LIKE', '%'.$buscar.'%')->paginate(5);
					break;

				default:
					
					break;
			}
		} else {
			$datos = Contactos::paginate(10);
		}
		return $this->layout->content = View::make('admon.contactos',compact("datos"));
	}

	public function getAddcontacto()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		return $this->layout->content = View::make('admon.addcontacto');
	}

	public function postAddcontacto()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::All();		
			$validaciones = array
			(
				'nombre' => 'required|min:5',
				'apellido' => 'required|min:5',
				'correo' => 'required|email',
				'telefono' => 'required|numeric'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"email" => "Debe ser un correo",
				"numeric" => "Debe ser un numero"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{			
				$c = new Contactos;
				$c->nombre = $inputs["nombre"];
				$c->apellido = $inputs["apellido"];
				$c->correo = $inputs["correo"];
				$c->telefono = $inputs["telefono"];
				$c->save();
				DB::commit();
				return Redirect::to('/sisadm/contactos')->with('mensaje','Registro ingresado correctamente!!');
			}			
		} catch (Exception $e) {
			DB::rollback();
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/contactos');
		}
	}

	public function getEditcontacto($id_contacto = null)
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$datos = Contactos::find($id_contacto);

		return $this->layout->content = View::make('admon.editcontacto',compact("datos"));
	}

	public function postEditcontacto()
	{
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}

		try {
			$inputs = Input::All();		
			$validaciones = array
			(
				'nombre' => 'required|min:5',
				'apellido' => 'required|min:5',
				'correo' => 'required|email',
				'telefono' => 'required|numeric'
			);		
			$mensajes = array
			(
				"required" => "Este campo no puede quedar vacio.",
				"min" => "Debe tener como minimo 5 caracteres",
				"email" => "Debe ser un correo",
				"numeric" => "Debe ser un numero"
			);
			
			$validar=Validator::make($inputs,$validaciones,$mensajes);
			
			if($validar->fails())
			{
				return Redirect::back() -> withErrors($validar);
			}else
			{
				$ec = Contactos::find($inputs["id"]);
				$ec->nombre = $inputs["nombre"];
				$ec->apellido = $inputs["apellido"];
				$ec->correo = $inputs["correo"];
				$ec->telefono = $inputs["telefono"];
				$ec->save();
				DB::commit();
				return Redirect::to('/sisadm/contactos')->with('mensaje','Registro editado correctamente!!');
			}			
		} catch (Exception $e) {
			DB::rollback();
			Session::flash('mensajeError','Ocurrio un error inesperado :(<br/> Por favor contacte con el administrador del sistema.');
			return Redirect::to('/sisadm/contactos');
		}
	}

	public function getDeletecontacto($id_contacto = null)
	{		
		if (!$this->accessRutesAdmon())
		{
			return Redirect::to('/login')->with('mensaje',$this->mensaje);
		}
		
		$dc = Contactos::find($id_contacto);
		$dc -> delete();
		return Redirect::to('/sisadm/contactos')->with('mensaje','Registro eliminado correctamente!!');
	}
}
