<?php
class Perfiles extends Eloquent
{	
	protected $table = 'perfil';
	protected $primaryKey = 'id_perfil';
	/*protected $guarded = array("*");
	protected $fillable = array("id","titulo","estracto","descripcion","imagen","fecha_registro","fecha_modificacion","estado");*/
	
	public function usuario()
	{
		return $this->hasMany('usuario', 'id_usuario');
	}
}
