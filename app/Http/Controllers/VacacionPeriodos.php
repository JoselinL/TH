<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacacionPeriodo;
use App\Vacacion;
use App\Periodo;

class VacacionPeriodos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarVP()
    {
         $vacacionperiodo=VacacionPeriodo::with('vacacion')->get();
         $vacacionperiodo=VacacionPeriodo::with('periodo')->get();
         return response()->json($vacacionperiodo);
    }

    public function index()
    {
        $vacacionperiodo = VacacionPeriodo::with('vacacion', 'periodo')->get();
        $vacacion = Vacacion::with('vacacionperiodo')->get();   
        $periodo = Periodo::with('vacacionperiodo')->get();  
        return view('GestionVP\VP')->with(['vacacionperiodo'=> $vacacionperiodo, 'vacacion'=>$vacacion, 'periodo'=>$periodo ]);
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
        $vacacionperiodo = new VacacionPeriodo();
        $vacacionperiodo->cantidad = $request->cantidad;
        $vacacionperiodo->vacacion_id = $request->vacacion_id;
        $vacacionperiodo->periodo_id = $request->periodo_id;
        $vacacionperiodo->save();
        $vacacionperiodovar = VacacionPeriodo::with(['vacacion','periodo'])->find($vacacionperiodo->id);
        return response()->json($vacacionperiodovar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarVP($id)
    {
        $vacacionperiodovar = VacacionPeriodo::with(['vacacion','periodo'])->find($id);
        return response()->json($vacacionperiodovar);
    }



    // public function listarVP($id)
    // {
        
    //     $vacacionperiodovar = VacacionPeriodo::with(['vacacion','periodo'])->where('vacacion_id',$id)->orderBy('id','desc')->limit(3)->get();
    //     return response()->json($vacacionperiodovar);
    // }



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
        $vacacionperiodo = VacacionPeriodo::find($id);
        return response()->json($vacacionperiodo);
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
        $vacacionperiodo = VacacionPeriodo::find($request->idVP);
        $vacacionperiodo->cantidad = $request->cantidad;
        $vacacionperiodo->vacacion_id = $request->vacacion_id;
        $vacacionperiodo->periodo_id = $request->periodo_id;
        $vacacionperiodo->save();
        return response()->json($vacacionperiodo); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacacionperiodovar=VacacionPeriodo::find($id);
        $vacacionperiodovar->delete();
    }
}
