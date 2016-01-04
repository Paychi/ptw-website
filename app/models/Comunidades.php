 <?php

class Comunidades extends Eloquent
{	
	protected $table = 'comunidad';
	public $primaryKey = 'id_comunidad';

	public function lider()
	{
		return $this->hasMany('lider', 'id_lider');
	}
}