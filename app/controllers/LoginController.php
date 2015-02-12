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
