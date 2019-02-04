<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCapacitacion extends Model
{
    public $timestamps = false; 
	protected $table = 'tipoCapacitacion';
	protected $fillable = [
       'descripcion',
    ];

    public function capacitacion(){
        return $this->hasMany('App\Capacitacion', 'id');
    }
}
