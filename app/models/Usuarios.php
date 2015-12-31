<?php
class Usuarios extends Eloquent
{	
	protected $table = 'usuario';
	public $primaryKey = 'id_usuario';
	/*protected $guarded = array("*");
	protected $fillable = array("id","titulo","estracto","descripcion","imagen","fecha_registro","fecha_modificacion","estado");*/
	
	public function noticia()
	{
		return $this->hasMany('Noticias', 'id_usuario');
	}
	
	public function perfil()
	{
		return $this->belongsTo('Perfiles', 'id_perfil');
	}
	
	public function colaborador()
	{
		return $this->hasMany('Colaboradores', 'id_usuario');
	}

	public function pregunta()
	{
		return $this->hasMany('Preguntas', 'id_usuario');
	}
}
