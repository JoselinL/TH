<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false; 
    protected $table = 'persona';
    protected $fillable = [
        'cedula', 'capacitacion_id', 'user_id',
    ];

    public function capacitacion(){
        return $this->hasOne('App\Capacitacion','id','capacitacion_id');
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function permiso(){
        return $this->hasMany('App\Permiso', 'id');
    }

     public function marcacion(){
        return $this->hasMany('App\Marcacion', 'id');
    }

    public function vacacion(){
        return $this->hasMany('App\Vacacion', 'id');
    }

    public function periodopersona(){
        return $this->hasMany('App\PeriodoPersona', 'id');
    }


}
