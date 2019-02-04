<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marcacion;
use App\Persona;
use Illuminate\Support\Facades\DB;

class Marcaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarMarcacion()
    {
        $marcacion=Marcacion::with('persona')->get();
        return response()->json($marcacion);
    }

    public function index()
    {
        $marcacion = Marcacion::with('persona')->get();
        $persona = Persona::with('marcacion')->get();   
        return view('GestionMarcacion\Marcacion')->with(['marcacion'=> $marcacion, 'persona'=>$persona]);
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
        $marcacion = new Marcacion();
        $marcacion->persona_id = $request->persona_id;
        $marcacion->save();
        $marcacionvar = Marcacion::with(['persona'])->find($marcacion->id);
    
        return response()->json($marcacionvar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarMarcacion($id)
    {
        $marcacionvar = Marcacion::with(['persona'])->find($id);
        return response()->json($marcacionvar);
    }


    public function listarMarcacion()
    {
        $marcacionvar = Marcacion::with(['persona'])->get();
        return response()->json($marcacionvar);
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
        $marcacion = Marcacion::find($id);
        return response()->json($marcacion);
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
        $marcacion = Marcacion::find($request->idMarcacion);
        $marcacion->persona_id = $request->persona_id;
        $marcacion->save();
        return response()->json($marcacion);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcacionvar=Marcacion::find($id);
        $marcacionvar->delete();

    }
}
