<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacacion;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\DB;

class Vacaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarVacacion()
    {
        $vacacion=Vacacion::with('persona')->get();
        $vacacion=Vacacion::with('usuario')->get();
         return response()->json($vacacion);
    }

    public function index()
    {
        $vacacion = Vacacion::with('persona','usuario')->get();
        $persona = Persona::with('vacacion')->get(); 
        $usuario = User::with('vacacion')->get();   
        return view('GestionVacacion\Vacacion')->with(['vacacion'=> $vacacion, 'persona'=>$persona, 'usuario'=>$usuario]);
    }


    public function indexVacacionIndividual()
    {
        $vacacion = Vacacion::with('persona', 'usuario')->get();
        $persona = Persona::with('vacacion')->get();  
        $usuario = User::with('vacacion')->get(); 
        return view('GestionVacacion\MisVacaciones')->with(['vacacion'=> $vacacion, 'persona'=>$persona, 'usuario'=>$usuario ]);
    }


     public function indexVacacionGeneral()
    {
        $vacacion = Vacacion::with('persona', 'usuario')->get();
        $persona = Persona::with('vacacion')->get();  
        $usuario = User::with('vacacion')->get(); 
        return view('GestionVacacion\VacacionesGenerales')->with(['vacacion'=> $vacacion, 'persona'=>$persona, 'usuario'=>$usuario ]);
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
        $vacacion = new Vacacion();
        $vacacion->descripcion = $request->descripcion;
        $vacacion->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $vacacion->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        $vacacion->fechaAprobacionJefe = null;
        $vacacion->fechaAprobacionTTHH = null;
        $vacacion->estado = null;
        $vacacion->persona_id = null;
        $vacacion->jefeAprueba = null;
        $vacacion->tthhAprueba = null;
        $vacacion->user_id = $request->user_id;
        $vacacion->save();
        $vacacionvar = Vacacion::with(['persona','usuario'])->find($vacacion->id);
    
        return response()->json($vacacionvar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarVacacion($id)
    {
        $vacacionvar = Vacacion::with(['persona','usuario'])->find($id);
        return response()->json($vacacionvar);
    }


    public function listarVacacion($idusuario1)
    {
        $vacacionvar = Vacacion::with(['usuario'])->where('user_id',$idusuario1)
        ->get();       
         return response()->json($vacacionvar);
    }



    public function buscarVacacion($descripcion=''){ 
        $vacacion = Vacacion::with(['persona','usuario'])->where('descripcion', 'like', "%$descripcion%")->get();
        return response()->json($vacacion);
     }


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
        $vacacion = Vacacion::find($id);
        return response()->json($vacacion);
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
        $vacacion = Vacacion::find($request->idVacacion);
        $vacacion->descripcion = $request->descripcion;
        $vacacion->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $vacacion->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        $vacacion->fechaAprobacionJefe = date("Y-m-d", strtotime(request('fechaAprobacionJefe')));
        $vacacion->fechaAprobacionTTHH = date("Y-m-d", strtotime(request('fechaAprobacionTTHH')));
        $vacacion->estado = $request->estado;
        $vacacion->persona_id = $request->persona_id;
        $vacacion->user_id = $request->user_id;
        $vacacion->save();
        return response()->json($vacacion); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacacionvar=Vacacion::find($id);
        $vacacionvar->delete();
    }
}
