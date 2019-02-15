<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marcacion;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Marcaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarMarcacion()
    {
        $marcacion=Marcacion::with('usuario')->get();
        return response()->json($marcacion);
    }

    public function index()
    {
        $marcacion = Marcacion::with('usuario')->get();
        $usuario = User::with('marcacion')->get();   
        return view('GestionMarcacion\Marcacion')->with(['marcacion'=> $marcacion, 'usuario'=>$usuario]);
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


    public function guardarMarcacion(Request $request)
    {
        $var_documento = $request->file('input_file');
        $destino = public_path().'/marcaciones';
        $nombreDoc = date('Ymd').time().'_'.$var_documento->getClientOriginalName();
        $var_documento->move($destino, $nombreDoc);

        $documento2 = 'marcaciones/'.$nombreDoc;

        return $documento2;
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
        $marcacion->user_id = $request->user_id;
        $marcacion->registro = $request->registro;
        $marcacion->save();
        $marcacionvar = Marcacion::with(['usuario'])->find($marcacion->id);

        
        $marcacion->save();
        $marcacionvar = Marcacion::with(['usuario'])->find($marcacion->id);
    
        return json_encode(array('succes'=> true, 'id'=> $marcacionvar->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizarMarcacion($id)
    {
        $marcacionvar = Marcacion::with(['usuario'])->find($id);
        return response()->json($marcacionvar);
    }


    public function listarMarcacion($idusuarioM)
    {
        $marcacionvar = Marcacion::with(['usuario'])->where('user_id',$idusuarioM)
        ->get();       
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
        $marcacion->user_id = $request->user_id;
        $marcacion->registro = $request->registro;
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
