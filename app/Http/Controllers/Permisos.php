<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Persona;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class Permisos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarPermiso()
    {
        $permiso=Permiso::with('usuario')->get();
        $permiso=Permiso::with('persona')->get();
         return response()->json($permiso);
    }



    public function index()
    {
        $permiso = Permiso::with('persona', 'usuario')->get();
        $persona = Persona::with('permiso')->get();  
        $usuario = User::with('permiso')->get(); 
        return view('GestionPermiso\Permiso')->with(['permiso'=> $permiso, 'persona'=>$persona, 'usuario'=>$usuario ]);
    }


    public function indexU()
    {
        $permiso = Permiso::with('persona', 'usuario')->get();
        $persona = Persona::with('permiso')->get();  
        $usuario = User::with('permiso')->get(); 
        return view('GestionPermiso\MisPermisos')->with(['permiso'=> $permiso, 'persona'=>$persona, 'usuario'=>$usuario ]);
    }


     public function indexP()
    {
        $permiso = Permiso::with('persona', 'usuario')->get();
        $persona = Persona::with('permiso')->get();  
        $usuario = User::with('permiso')->get(); 
        return view('GestionPermiso\PermisosGenerales')->with(['permiso'=> $permiso, 'persona'=>$persona, 'usuario'=>$usuario ]);
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
        //return response()->json($request);
        $permiso = new Permiso();
        $permiso->descripcion = $request->descripcion;
        $permiso->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $permiso->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        $permiso->fechaAprobJefe = null;
        $permiso->fechaAprobTTHH = null;
        $permiso->horaInicio = date("H:i:s", strtotime(request('horaInicio')));
        $permiso->horaFin = date("H:i:s", strtotime(request('horaFin')));
        $permiso->estado = null;
        $permiso->justificacion = $request->justificacion;
        $permiso->jefeAprueba = null;
        $permiso->tthhAprueba = null;
        // $user=User::findOrFail($request->idusuario);
        // $permiso->jefeAprueba=$user->nombres;

        // $user2=User::findOrFail($request->idusuario);
        // $permiso->tthhAprueba=$user2->nombres;

        $permiso->persona_id = null;
        $permiso->user_id = $request->user_id;
        $permiso->save();
        $permisovar = Permiso::with(['persona','usuario'])->find($permiso->id);
    
        return response()->json($permisovar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function actualizarPermiso($id)
    {
        $permisovar = Permiso::with(['persona', 'usuario'])->find($id);
        return response()->json($permisovar);
    }


    public function listarPermiso($idusuario)
    {
        $permisovar = Permiso::with(['usuario'])->where('user_id',$idusuario)
        ->get();       
         return response()->json($permisovar);
    }

    public function listarPermisoGeneral()
    {
        $permisovar = Permiso::with(['persona', 'usuario'])->get();
        return response()->json($permisovar);
    }


    public function listarPermisoUsuario($idusuario)
    {

        $permisovar = Permiso::with(['usuario'])->where('user_id',$idusuario)
        ->get();       
         return response()->json($permisovar);
    }



     public function buscarPermiso($descripcion=''){ 
        $permiso = Permiso::with(['persona', 'usuario'])->where('descripcion', 'like', "%$descripcion%")->get();
        return response()->json($permiso);
     }



     public function cargarPDF($idpdf)
    {
       $permisovar = Permiso::with(['persona','usuario'])->where('user_id',$idpdf)
        ->get(); 

        $pdf = PDF::loadView('GestionPermiso\MostrarPDF', ['permiso'=>$permisovar]);
        return $pdf->download('certificado.pdf');

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
        $permiso = Permiso::find($id);
        return response()->json($permiso);
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
        $permiso = Permiso::find($request->idPermiso);
        $permiso->descripcion = $request->descripcion;
        $permiso->fechaInicio = date("Y-m-d", strtotime(request('fechaInicio')));
        $permiso->fechaFin = date("Y-m-d", strtotime(request('fechaFin')));
        $permiso->fechaAprobJefe = date("Y-m-d", strtotime(request('fechaAprobJefe')));
        $permiso->fechaAprobTTHH = date("Y-m-d", strtotime(request('fechaAprobTTHH')));
        $permiso->horaInicio = date("H:i:s", strtotime(request('horaInicio')));
        $permiso->horaFin = date("H:i:s", strtotime(request('horaFin')));
        $permiso->estado = $request->estado;
        $permiso->justificacion = $request->justificacion;
        $permiso->persona_id = $request->persona_id;
        $permiso->user_id = $request->user_id;
        $permiso->save();
        return response()->json($permiso);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permisovar=Permiso::find($id);
        $permisovar->delete();
    }

    public function modificarPermiso(Request $request){

        

        $consulta = Permiso::findOrFail($request->idPermiso);
        $user = User::with('tipousuario')->findOrFail($request->idusuario);

        if ($consulta->estado<=2) {
            # code...
            // if ($user->tipousuario->tipo=="Administrador") {
            // # code...
            //     $consulta->fechaAprobJefe=Carbon::now()->toDateTimeString();
            //     $consulta->jefeAprueba=$user->nombres;
            //     $consulta->estado=$consulta->estado+1; 
            //     $consulta->save();
            // }

            if ($consulta->fechaAprobJefe==null && $user->tipousuario->tipo=="Jefe") {
                # code...
                $consulta->fechaAprobJefe=Carbon::now()->toDateTimeString();
                $consulta->jefeAprueba=$user->nombres;
                $consulta->estado=$consulta->estado+1; 
                $consulta->save();
            }else{
                return response()->json('Y');
            }

            if ($consulta->fechaAprobTTHH==null && $user->tipousuario->tipo=="DirectorTH") {
                $consulta->fechaAprobTTHH=Carbon::now()->toDateTimeString();
                $consulta->tthhAprueba=$user->nombres;

                $consulta->estado=$consulta->estado+1; 
                $consulta->save();
            }else{
                return response()->json('Y');
            }
           
        }

    }
}
