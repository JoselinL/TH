<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCapacitacion;
use Illuminate\Support\Facades\DB;

class TipoCapacitaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarTC()
    {
        $tipocapacitacion = TipoCapacitacion::all();
        return response()->json($tipocapacitacion);
    }

    public function index()
    {
        $tipocapacitacion = TipoCapacitacion::all();
        return view('GestionTipoCapacitacion\TipoCapacitacion')->with(['tipocapacitacion'=> $tipocapacitacion]);
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
        $tipocapacitacion = new TipoCapacitacion();
        $tipocapacitacion->descripcion = $request->descripcion;


        if ($tipocapacitacion->save()) {
            return response()->json($tipocapacitacion);
        } else {
            return back()->with('errormsj', '¡Error al guardar los datos!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarTC($id)
    {
        $tipocapacitacion= TipoCapacitacion::all();
        return response()->json($tipocapacitacion);
    }

    public function listarTC()
    {
        $tipocapacitacion = TipoCapacitacion::all();
        return response()->json($tipocapacitacion);
    }


    public function buscarTC($descripcion=''){ 
        $tipocapacitacion = TipoCapacitacion::where('descripcion', 'like', "%$descripcion%")->get();
        return response()->json($tipocapacitacion);
     }


    public function show($id)
    {
        $tipocapacitacion= TipoCapacitacion::find($id);
        return response()->json($tipocapacitacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocapacitacion = TipoCapacitacion::find($id);
        return view('GestionTipoCapacitacion\TipoCapacitacion')->with(['edit' => true, 'tipocapacitacion' =>$tipocapacitacion]);
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
        $tipocapacitacion = TipoCapacitacion::find($request->idtipoC);
        $tipocapacitacion->descripcion = $request->descripcion;
        $tipocapacitacion->save();
        return response()->json($tipocapacitacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipocapacitacion = TipoCapacitacion::find($id);
        $tipocapacitacion->delete();
    }
}
