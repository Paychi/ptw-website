<?php
class Noticias extends Eloquent
{	
	protected $table = 'noticia';
	public $primaryKey = 'id_noticia';
	/*protected $guarded = array("*");
	protected $fillable = array("id","titulo","estracto","descripcion","imagen","fecha_registro","fecha_modificacion","estado");*/
	
	public function usuario()
	{
		return $this->belongsTo('Usuario', 'id_usuario');
	}

	public function multimedia()
	{
		return $this->hasMany('Multimedia', 'id_multimedia');
	}
}
