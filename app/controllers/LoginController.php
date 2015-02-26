<?php 
class LoginController extends BaseController
{

	public $restful = true;
	
	protected $layout = 'layouts.layout_login';
	

	public function getIndex()
	{
		if(Auth::user())
		{
			return Redirect::to('admin');
		}
		
		return $this->layout->content = View::make('login.index');
	}

	public function postIndex()
	{
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
				Session::put('usuario',$us[0]->nombre_usuario);
				
				//if($us[0]->usuario_perfil->perfil->id_perfil== 0)
				
				if($us[0]->perfil->id_perfil == 1)
					return Redirect::to('admin');
				if($us[0]->perfil->id_perfil == 2)
					return Redirect::to('adis');
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
		if ($usernamepost == "admon" && $passwordpost == "perfil01")
			return Redirect::to('admin');
			
		if ($usernamepost == "adis" && $passwordpost == "perfil02")
			return Redirect::to('adis');
			
		return Redirect::to('login')->with('error_login', true);
	}
}
