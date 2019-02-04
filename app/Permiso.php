<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public $timestamps = false; 
    protected $table = 'permisos';
    protected $fillable = [
        'descripcion', 'fechaInicio','fechaFin', 'fechaAprobJefe', 'fechaAprobTTHH', 'horaInicio', 'horaFin', 'estado', 'justificacion', 'persona_id', 'jefeAprueba', 'tthhAprueba', 'user_id'
    ];


    public function persona(){
        return $this->hasOne('App\Persona','id','persona_id');
    }


     public function usuario(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
