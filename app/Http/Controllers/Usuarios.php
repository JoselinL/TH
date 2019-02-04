<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TipoUsuario;
use PDF;

class Usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function cargarUsuario()
    {
         $usuario=User::with('tipousuario')->get();
         return response()->json($usuario);
    }

    public function index()
    {
        $usuario = User::with('tipousuario')->get();
        $tipousuario = TipoUsuario::with('usuario')->get();    
        return view('GestionUsuario\Usuario')->with(['usuario'=> $usuario, 'tipousuario'=>$tipousuario]);
    }


    public function indexHistorial()
    {
        $usuario = User::with('tipousuario')->get();
        $tipousuario = TipoUsuario::with('usuario')->get();    
        return view('GestionUsuario\Historial')->with(['usuario'=> $usuario, 'tipousuario'=>$tipousuario]);
    }



    public function indexListado()
    {
        $usuario = User::with('tipousuario')->get();
        $tipousuario = TipoUsuario::with('usuario')->get();    
        return view('GestionUsuario\ListadoUsuario')->with(['usuario'=> $usuario, 'tipousuario'=>$tipousuario]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->password = bcrypt($request->password);
        $usuario->email = $request->email;
        $usuario->tipoUsuario_id = $request->tipoUsuario_id;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->estadoCivil = $request->estadoCivil;
        $usuario->sexo = $request->sexo;
        $usuario->nacionalidad = $request->nacionalidad;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->tipoSangre = $request->tipoSangre;
        $usuario->nivelEstudio = $request->nivelEstudio;
        $usuario->perfilProfesional = $request->perfilProfesional;
        $usuario->cedula = $request->cedula;
        $usuario->save();
        $usuariovar = User::with(['tipousuario'])->find($usuario->id);
        return response()->json($usuariovar);
    }


    public function actualizarUsuario($id)
    {
        $usuariovar = User::with(['tipousuario'])->find($id);
        return response()->json($usuariovar);
    }



    public function actualizarUsuarioH($id)
    {
        $usuariovar = User::with(['tipousuario'])->find($id);
        return response()->json($usuariovar);
    }



    public function listarUsuario()
    {
        $usuariovar = User::with(['tipousuario'])->get();
        return response()->json($usuariovar);
    }




    public function listarUsuarioH($idusuarioH)
    {
        $usuariovar = User::with(['tipousuario'])->findOrFail($idusuarioH);       
         return response()->json($usuariovar);
    }



    public function buscarUsuario($nombres=''){ 
        $usuariovar = User::with(['tipousuario'])->where('nombres', 'like', "%$nombres%")->get();
        return response()->json($usuariovar);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($request->idUsuario);
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->password = bcrypt($request->password);
        $usuario->email = $request->email;
        $usuario->tipoUsuario_id = $request->tipoUsuario_id;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->estadoCivil = $request->estadoCivil;
        $usuario->sexo = $request->sexo;
        $usuario->nacionalidad = $request->nacionalidad;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->tipoSangre = $request->tipoSangre;
        $usuario->nivelEstudio = $request->nivelEstudio;
        $usuario->perfilProfesional = $request->perfilProfesional;
        $usuario->cedula = $request->cedula;

        if ($request->actualizarclave=="1") {
            $usuario->password=bcrypt($request->password);
        }

        $usuario->save();
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuariovar=User::find($id);
        $usuariovar->delete();
    }
}
