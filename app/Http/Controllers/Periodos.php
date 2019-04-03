<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use App\User;
use App\PeriodoPersona;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Periodos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarPeriodo()
    {
        $periodo = Periodo::all();
        return response()->json($periodo);
    }

    public function index()
    {
        $periodo = Periodo::all();
        return view('GestionPeriodo\Periodo')->with(['periodo'=> $periodo]);
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
        $periodo = new Periodo();
        $periodo->descripcion = $request->descripcion;
        $periodo->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $periodo->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        $periodo->estado = 'Activo';

        if ($periodo->save()) {
            # code...
            $periodos = Periodo::all();
            foreach ($periodos as $item) {
                # code...
                //$item->estado=;
                if ($periodo->id != $item->id) {
                    # code...
                    $periodoM = Periodo::find($item->id);
                    $periodoM->estado = "Inactivo";
                    $periodoM->update();
                }
               
            }
            $usuarios=User::all();
            foreach ($usuarios as $value) {
                $edad = Carbon::parse($value->fechaInicio)->age; 
                if ($edad >=1) {
                    $periodo_persona=new PeriodoPersona();
                $periodo_persona->periodo_id=$periodo->id;
                $periodo_persona->user_id=$value->id;
                $periodo_persona->cantidadDiasPeriodo=30;
                $periodo_persona->save(); 
                }
               
            }
        return response()->json($periodo);

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarPeriodo($id)
    {
        $periodo= Periodo::all();
        return response()->json($periodo);
    }

    public function listarPeriodo()
    {
        $periodo = Periodo::all();
        return response()->json($periodo);
    }


    public function buscarPeriodo($descripcion=''){ 
        $periodo = Periodo::where('descripcion', 'like', "%$descripcion%")->get();
        return response()->json($periodo);
     }

    public function show($id)
    {
        $periodo= Periodo::find($id);
        return response()->json($periodo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $periodo = Periodo::find($id);
        return view('GestionPeriodo\Periodo')->with(['edit' => true, 'periodo' =>$periodo]);
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
        $periodo = Periodo::find($request->idPeriodo);
        $periodo->descripcion = $request->descripcion;
        $periodo->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $periodo->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        

        $periodo->save();
        return response()->json($periodo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo = Periodo::find($id);
        $periodo->delete();
    }
}
