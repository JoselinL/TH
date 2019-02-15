<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capacitacion;
use App\TipoCapacitacion;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Capacitaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function cargarCapacitacion()
    {
        $capacitacion=Capacitacion::with('tipocapacitacion')->get();
        $capacitacion=Capacitacion::with('usuario')->get();
         return response()->json($capacitacion);
    }
    

    public function index()
    {
        $capacitacion = Capacitacion::with('tipocapacitacion')->get();
        $tipocapacitacion = TipoCapacitacion::with('capacitacion')->get();   
        $usuario = User::with('capacitacion')->get(); 
        return view('GestionCapacitacion\Capacitacion')->with(['capacitacion'=> $capacitacion, 'tipocapacitacion'=>$tipocapacitacion, 'usuario'=>$usuario]);
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


     public function guardarArchivo(Request $request)
    {
        $var_documento = $request->file('input_file');
        $destino = public_path().'/documentos';
        $nombreDoc = date('Ymd').time().'_'.$var_documento->getClientOriginalName();
        $var_documento->move($destino, $nombreDoc);

        $documento1 = 'documentos/'.$nombreDoc;

        return $documento1;
    }



    public function store(Request $request)
    {

  
        $capacitacion = new Capacitacion();
        $capacitacion->descripcion = $request->descripcion;
        $capacitacion->documento = $request->documento;
        $capacitacion->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $capacitacion->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        $capacitacion->tipoCapacitacion_id = $request->tipoCapacitacion_id;
        $capacitacion->user_id = $request->user_id;
        
        
        $capacitacion->save();
        $capacitacionvar = Capacitacion::with(['tipocapacitacion', 'usuario'])->find($capacitacion->id);
    
        return json_encode(array('succes'=> true, 'id'=> $capacitacionvar->id));
      
    }



    public function actualizarCapacitacion($id)
    {
        $capacitacionvar = Capacitacion::with(['tipocapacitacion', 'usuario'])->find($id);
        return response()->json($capacitacionvar);
    }



    public function listarCapacitacion($idusuarioC)
    {
        $capacitacionvar = Capacitacion::with(['tipocapacitacion', 'usuario'])->where('user_id',$idusuarioC)
        ->get();       
         return response()->json($capacitacionvar);
    }




    public function buscarCapacitacion($descripcion=''){ 
        $capacitacion = Capacitacion::with(['tipocapacitacion', 'usuario'])->where('descripcion', 'like', "%$descripcion%")->get();
        return response()->json($capacitacion);
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
        $capacitacion = Capacitacion::find($id);
        return response()->json($capacitacion);
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
        $capacitacion = Capacitacion::find($request->idCapacitacion);
        $capacitacion->descripcion = $request->descripcion;
        $capacitacion->documento = $request->documento;
        $capacitacion->fechaInicio =  date("Y-m-d", strtotime(request('fechaInicio')));
        $capacitacion->fechaFin =  date("Y-m-d", strtotime(request('fechaFin')));
        $capacitacion->tipoCapacitacion_id = $request->tipoCapacitacion_id;
        $capacitacion->user_id = $request->user_id;
        $capacitacion->save();
        return response()->json($capacitacion);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capacitacionvar=Capacitacion::find($id);
        $capacitacionvar->delete();
    }
}
