<?php
class Multimedias extends Eloquent
{	
	protected $table = 'multimedia';
	public $primaryKey = 'id_multimedia';
	/*protected $guarded = array("*");
	protected $fillable = array("id","titulo","estracto","descripcion","imagen","fecha_registro","fecha_modificacion","estado");*/
	
	public function noticia()
	{
		return $this->belongsTo('Noticia', 'id_noticia');
	}
}