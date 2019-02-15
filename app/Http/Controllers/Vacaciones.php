<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacacion;
use App\Persona;
use App\User;
use App\PeriodoPersona;
use App\VacacionPeriodo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class Vacaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $vacacion->estado = 0;
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


    public function cargarCertificado($idcertificado)
    {
       $vacacionvar = Vacacion::with(['persona','usuario'])->where('user_id',$idcertificado)
        ->get(); 

        $persona=User::findOrFail($idcertificado);
        $pdf = PDF::loadView('GestionVacacion\MostrarCertificado', ['vacacion'=>$vacacionvar, 'persona'=>$persona]);
        return $pdf->download('certificado_vacaciones.pdf');

    }


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



    public function listarVacacionGeneral()
    {
        $vacacionvar = Vacacion::with(['persona', 'usuario'])->where('estado','<','2')->get();
        return response()->json($vacacionvar);
    }



    public function listarVacacionIndividual($idusuario1)
    {

        $vacacionvar = Vacacion::with(['usuario'])->where('user_id',$idusuario1)
        ->get();       
         return response()->json($vacacionvar);
    }


    public function buscarVacacion(Request $request){ 
        //$vacacion = Vacacion::with(['persona','usuario'])->where('descripcion', 'like', "%$descripcion%")->get();

            $vacacion = Vacacion::with('persona','usuario')->where([
                                                                        ['user_id',$request->user_id],
                                                                        ['descripcion','like',"%$request->descripcion%"]
                                                                    ])->get();

       
        //dd($request);
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



public function modificarVacacion(Request $request){
       //$consulta="hola";
        $consulta = Vacacion::findOrFail($request->idVacacion);
        $user = User::with('tipousuario')->findOrFail($request->idusuario);
       $num=$consulta->estado+1;

        if  ($consulta->estado == 0 || $consulta->estado == 1) {
            # code...
            if ($consulta->fechaAprobacionJefe==null && $user->tipousuario->tipo=="Jefe"){
                $consulta->fechaAprobacionJefe=Carbon::now()->toDateTimeString();
                $consulta->jefeAprueba=$user->nombres;
                $consulta->estado=$num; 
                $consulta->save();
                   

            }else if ($consulta->fechaAprobacionTTHH==null && $user->tipousuario->tipo=="DirectorTH") {

                $consulta->fechaAprobacionTTHH=Carbon::now()->toDateTimeString();
                $consulta->tthhAprueba=$user->nombres;
                $consulta->estado=$num; 
                $consulta->save();  
                  
                  $vacacionperiodovar = PeriodoPersona::where('user_id',$consulta->user_id)->orderBy('id')->limit(3)->get();
            
               $fecha_i = Carbon::parse($consulta->fechaInicio);
               $fecha_f = Carbon::parse($consulta->fechaFin);
               $dias= $fecha_f->diffInDays($fecha_i);

                foreach ($vacacionperiodovar as $value) {
                   if ($value->cantidadDiasPeriodo>=$dias) {
                       
                        $vacacionPerio= new VacacionPeriodo();
                        $vacacionPerio->periodo_id=$value->periodo_id;
                        $vacacionPerio->vacacion_id=$consulta->id;
                        $vacacionPerio->cantidad=$dias;
                        $vacacionPerio->save();

                    
                        $Pp=PeriodoPersona::findOrFail($value->id);
                        $Pp->cantidadDiasPeriodo=$value->cantidadDiasPeriodo-$dias;;
                        $Pp->save();
                        $dias=0;
                   break;
                  }
                   else{
                    if ($value->cantidadDiasPeriodo==0) {
                       
                    }else{
                        $dias=$dias-$value->cantidadDiasPeriodo;
                        $vacacionPerio= new VacacionPeriodo();
                        $vacacionPerio->periodo_id=$value->periodo_id;
                        $vacacionPerio->vacacion_id=$consulta->id;
                        $vacacionPerio->cantidad=$value->cantidadDiasPeriodo;
                        $vacacionPerio->save();

                        $Pp=PeriodoPersona::findOrFail($value->id);
                        $Pp->cantidadDiasPeriodo=0;
                        $Pp->save();
                        }
                   }
                    

                }
            }

        }
       // return response()->json($consulta);
        return response()->json($vacacionperiodovar);
    }



    public function addObservacionVacacion(Request $request)
    {
        $consulta = Vacacion::findOrFail($request->idVacacion);
        $user = User::with('tipousuario')->findOrFail($request->idusuario);

        $consulta->observacion= $user->apellidos." ".$user->nombres." : ".$request->observacion;
        $consulta->save();

        return response()->json($consulta);

    }
    public function getObservacionVacacion($id)
    {
        $consulta = Vacacion::findOrFail($id);
        return response()->json($consulta->observacion);
    }
}


    

