<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    public $timestamps = false; 
    protected $table = 'capacitacion';
    protected $fillable = [
        'descripcion', 'documento','fechaInicio', 'fechaFin', 'tipoCapacitacion_id', 'user_id',

    ];


	public function tipocapacitacion(){
        return $this->hasOne('App\TipoCapacitacion','id','tipoCapacitacion_id');
    }

	public function persona(){
        return $this->hasMany('App\Persona', 'id');
    }

    public function usuario(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}


