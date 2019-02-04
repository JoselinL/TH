<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    public $timestamps = false; 
    protected $table = 'vacaciones';
    protected $fillable = [
        'descripcion', 'fechaInicio', 'fechaFin', 'fechaAprobacionJefe', 'fechaAprobacionTTHH', 'estado', 'persona_id', 'jefeAprueba', 'tthhAprueba', 'user_id'
    ];

    public function persona(){
        return $this->hasOne('App\Persona','id','persona_id');
    }

	public function vacacionperiodo(){
        return $this->hasMany('App\VacacionPeriodo', 'id');
    }


    public function usuario(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
