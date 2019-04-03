<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Persona;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use DateTime;

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

    public function indexPA()
    {
        $permiso = Permiso::with('persona', 'usuario')->get();
        $persona = Persona::with('permiso')->get();  
        $usuario = User::with('permiso')->get(); 
        return view('GestionPermiso\PermisosAprobados')->with(['permiso'=> $permiso, 'persona'=>$persona, 'usuario'=>$usuario ]);
    }


    public function indexPNA()
    {
        $permiso = Permiso::with('persona', 'usuario')->get();
        $persona = Persona::with('permiso')->get();  
        $usuario = User::with('permiso')->get(); 
        return view('GestionPermiso\PermisosNoAprobados')->with(['permiso'=> $permiso, 'persona'=>$persona, 'usuario'=>$usuario ]);
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



    public function guardarJustificacion(Request $request)
    {
        $var_documento = $request->file('input_file');
        $destino = public_path().'/justificaciones';
        $nombreDoc = date('Ymd').time().'_'.$var_documento->getClientOriginalName();
        $var_documento->move($destino, $nombreDoc);

        $documento12 = 'justificaciones/'.$nombreDoc;

        return $documento12;
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
        $permiso->estado = 0;
        $permiso->justificacion = $request->justificacion;
        $permiso->jefeAprueba = null;
        $permiso->tthhAprueba = null;
        $permiso->catalogo = $request->catalogo;
        // $user=User::findOrFail($request->idusuario);
        // $permiso->jefeAprueba=$user->nombres;

        // $user2=User::findOrFail($request->idusuario);
        // $permiso->tthhAprueba=$user2->nombres;

        $permiso->persona_id = null;
        $permiso->user_id = $request->user_id;
        $permiso->save();
        $permisovar = Permiso::with(['persona','usuario'])->find($permiso->id);
    
        return json_encode(array('succes'=> true, 'id'=> $permisovar->id));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    // public function permisoArea($id)
    // {
    //     $userJefe = User::find('id');
    //     //$permisoJefe = User::with('permiso')->get();
    //     $permisoJefe = User::with(['permiso'])->where('area','like','%$userJefe->area%')->get();
    //     return response()->json($permisoJefe);                           
                                                   
    // }



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
        $tipousu=Auth::user()->tipoUsuario_id;
        $tipo=Auth::user()->area;
        if ($tipousu==4) {
              $permisovar = DB::table('permisos')
                ->select('permisos.user_id','permisos.descripcion','permisos.fechaInicio'
                     ,'permisos.id','permisos.justificacion'
                    ,'permisos.fechaFin','permisos.horaInicio'
                    ,'permisos.horaFin','permisos.catalogo','permisos.estado', 'user.cedula','user.nombres','user.apellidos','user.area'
                )
                ->join('user', 'user.id', '=', 'permisos.user_id')
                ->get();
        }
        
        else{
            $permisovar = DB::table('permisos')
                ->select('permisos.user_id','permisos.descripcion','permisos.fechaInicio'
                     ,'permisos.id','permisos.justificacion'
                    ,'permisos.fechaFin','permisos.horaInicio'
                    ,'permisos.horaFin','permisos.catalogo','permisos.estado', 'user.cedula','user.nombres','user.apellidos','user.area'
                )
                ->join('user', 'user.id', '=', 'permisos.user_id')
                ->where('user.area', $tipo)
                ->get();
        }
     
        //$permisovar = Permiso::with(['persona', 'usuario'])->where('estado','<','2')->get();
        return response()->json($permisovar);
    }


     public function listarPermisoAprobado()
    {
        $tipousu=Auth::user()->tipoUsuario_id;
        $tipo=Auth::user()->area;
        if ($tipousu==4) {
              $permisovar = DB::table('permisos')
                ->select('permisos.user_id','permisos.descripcion','permisos.fechaInicio'
                     ,'permisos.id','permisos.justificacion'
                    ,'permisos.fechaFin','permisos.horaInicio'
                    ,'permisos.horaFin','permisos.catalogo','permisos.estado', 'user.cedula','user.nombres','user.apellidos','user.area'
                )
                ->join('user', 'user.id', '=', 'permisos.user_id')
                ->get();
        }
        
        else{
            $permisovar = DB::table('permisos')
                ->select('permisos.user_id','permisos.descripcion','permisos.fechaInicio'
                     ,'permisos.id','permisos.justificacion'
                    ,'permisos.fechaFin','permisos.horaInicio'
                    ,'permisos.horaFin','permisos.catalogo','permisos.estado', 'user.cedula','user.nombres','user.apellidos','user.area'
                )
                ->join('user', 'user.id', '=', 'permisos.user_id')
                ->where('user.area', $tipo)
                ->get();
        }
     
        //$permisovar = Permiso::with(['persona', 'usuario'])->where('estado','<','2')->get();
        return response()->json($permisovar);
    }



    public function listarPermisoNA()
    {
        $tipousu=Auth::user()->tipoUsuario_id;
        $tipo=Auth::user()->area;
        if ($tipousu==4) {
              $permisovar = DB::table('permisos')
                ->select('permisos.user_id','permisos.descripcion','permisos.fechaInicio'
                     ,'permisos.id','permisos.justificacion'
                    ,'permisos.fechaFin','permisos.horaInicio'
                    ,'permisos.horaFin','permisos.catalogo','permisos.estado', 'user.cedula','user.nombres','user.apellidos','user.area'
                )
                ->join('user', 'user.id', '=', 'permisos.user_id')
           
                ->get();
        }else{
            $permisovar = DB::table('permisos')
                ->select('permisos.user_id','permisos.descripcion','permisos.fechaInicio'
                     ,'permisos.id','permisos.justificacion'
                    ,'permisos.fechaFin','permisos.horaInicio'
                    ,'permisos.horaFin','permisos.catalogo','permisos.estado', 'user.cedula','user.nombres','user.apellidos','user.area'
                )
                ->join('user', 'user.id', '=', 'permisos.user_id')
                ->where('user.area', $tipo)
                ->get();
        }
     
        //$permisovar = Permiso::with(['persona', 'usuario'])->where('estado','<','2')->get();
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
       //$permisovar = Permiso::with(['persona','usuario'])->where('user_id',$idpdf)
        //->get(); 
        //$persona=User::findOrFail($idpdf);
        $consultapermiso = DB::table('user')
        ->join('permisos', 'permisos.user_id', '=', 'user.id')
        ->join('tipousuario', 'tipousuario.id','=','user.tipoUsuario_id')
        ->select('user.cedula', 'user.nombres', 'user.apellidos','tipousuario.tipo','permisos.catalogo','permisos.fechaInicio','permisos.fechaFin','permisos.horaInicio','permisos.horaFin','permisos.catalogo')
        ->where('permisos.id', $idpdf)
        ->get();
        
        $pdf = PDF::loadView('GestionPermiso\MostrarPDF', ['consultapermiso'=>$consultapermiso]);

        return $pdf->download('certificado.pdf');

        
        //return response()->json($consultapermiso);
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
        $permiso->catalogo = $request->catalogo;
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

        if  ($consulta->estado == 0 || $consulta->estado == 1) {
            # code...
            if ($consulta->fechaAprobJefe==null && $user->tipousuario->tipo=="Jefe"){
                $consulta->fechaAprobJefe=Carbon::now()->toDateTimeString();
                $consulta->jefeAprueba=$user->cedula;
                $consulta->estado=$consulta->estado+1; 
                $consulta->save();                
            }else if ($consulta->fechaAprobTTHH==null && $user->tipousuario->tipo=="DirectorTH") {
                $consulta->fechaAprobTTHH=Carbon::now()->toDateTimeString();
                $consulta->tthhAprueba=$user->cedula;
                $consulta->estado=$consulta->estado+1; 
                $consulta->save();        
            }

        }
        return response()->json($consulta);
    }

    public function addObservacion(Request $request)
    {
        $consulta = Permiso::findOrFail($request->idPermiso);
        $user = User::with('tipousuario')->findOrFail($request->idusuario);

        $consulta->observacion= $user->apellidos." ".$user->nombres." : ".$request->observacion;
        $consulta->estado=3;
        $consulta->save();

        return response()->json($consulta);

    }
    public function getObservacion($id)
    {
        $consulta = Permiso::findOrFail($id);
        $observacion="";
        if ($consulta!=null) {
           $observacion=$consulta->observacion;
        }
      
        return response()->json($observacion);
    }
}

