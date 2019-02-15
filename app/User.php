<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false; 
    protected $table = 'user';
    protected $fillable = [
        'nombres', 'apellidos', 'password', 'email', 'tipoUsuario_id', 'fechaNacimiento', 'estadoCivil', 'sexo', 'nacionalidad', 'direccion', 'telefono', 'tipoSangre', 'nivelEstudio', 'perfilProfesional','cedula','area','sueldo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipousuario(){
        return $this->hasOne('App\TipoUsuario', 'id', 'tipoUsuario_id');
    }

    public function persona(){
        return $this->hasMany('App\Persona', 'id');
    }


     public function permiso(){
        return $this->hasMany('App\Permiso', 'id');
    }

     public function vacacion(){
        return $this->hasMany('App\Vacacion', 'id');
    }

    public function capacitacion(){
        return $this->hasMany('App\Capacitacion', 'id');
    }

     public function periodopersona(){
        return $this->hasMany('App\PeriodoPersona', 'id');
    }

    public function marcacion(){
        return $this->hasMany('App\Marcacion', 'id');
    }

}