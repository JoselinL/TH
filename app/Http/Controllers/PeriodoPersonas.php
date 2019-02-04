<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeriodoPersona;
use App\Periodo;
use App\Persona;


class PeriodoPersonas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarPP()
    {
         $periodopersona=PeriodoPersona::with('periodo')->get();
         $periodopersona=PeriodoPersona::with('persona')->get();
         return response()->json($periodopersona);
    }

    public function index()
    {
        $periodopersona = PeriodoPersona::with('periodo', 'persona')->get();
        $periodo = Periodo::with('periodopersona')->get();   
        $persona = Persona::with('periodopersona')->get();  
        return view('GestionPP\PP')->with(['periodopersona'=> $periodopersona, 'periodo'=>$periodo, 'persona'=>$persona ]);
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
        $periodopersona = new PeriodoPersona();
        $periodopersona->cantidadDiasPeriodo = $request->cantidadDiasPeriodo;
        $periodopersona->periodo_id = $request->periodo_id;
        $periodopersona->persona_id = $request->persona_id;
        $periodopersona->save();
        $periodopersonavar = PeriodoPersona::with(['periodo','persona'])->find($periodopersona->id);
        return response()->json($periodopersonavar);
    }


    public function actualizarPP($id)
    {
        $periodopersonavar = PeriodoPersona::with(['periodo','persona'])->find($id);
        return response()->json($periodopersonavar);
    }

    public function listarPP()
    {
        $periodopersonavar = PeriodoPersona::with(['periodo','persona'])->get();
        return response()->json($periodopersonavar);
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
        $periodopersona = PeriodoPersona::find($id);
        return response()->json($periodopersona);
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
        $periodopersona = PeriodoPersona::find($request->idPP);
        $periodopersona->cantidadDiasPeriodo = $request->cantidadDiasPeriodo;
        $periodopersona->periodo_id = $request->periodo_id;
        $periodopersona->persona_id = $request->persona_id;
        $periodopersona->save();
        return response()->json($periodopersona); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodopersonavar=PeriodoPersona::find($id);
        $periodopersonavar->delete();
    }
}
