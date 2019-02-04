<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoUsuario;
use Illuminate\Support\Facades\DB;

class TipoUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarTU()
    {
        $tipousuario = TipoUsuario::all();
        return response()->json($tipousuario);
    }

    public function index()
    {
        $tipousuario = TipoUsuario::all();
        return view('GestionTU\TU')->with(['tipousuario'=> $tipousuario]);
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
        $tipousuario = new TipoUsuario();
        $tipousuario->tipo = $request->tipo;


        if ($tipousuario->save()) {
            return response()->json($tipousuario);
        } else {
            return back()->with('errormsj', '¡Error al guardar los datos!');
        }
    }



    public function actualizarTU($id)
    {
        $tipousuario= TipoUsuario::all();
        return response()->json($tipousuario);
    }

    public function listarTU()
    {
        $tipousuario = TipoUsuario::all();
        return response()->json($tipousuario);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipousuario= TipoUsuario::find($id);
        return response()->json($tipousuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipousuario = TipoUsuario::find($id);
        return view('GestionTU\TU')->with(['edit' => true, 'tipousuario' =>$tipousuario]);
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
        $tipousuario = TipoUsuario::find($request->idtipoU);
        $tipousuario->tipo = $request->tipo;
        $tipousuario->save();
        return response()->json($tipousuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipousuario = TipoUsuario::find($id);
        $tipousuario->delete();
    }
}
