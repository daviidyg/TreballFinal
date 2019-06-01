<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Inventario;
use Auth;
use DB;
use Response;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                  
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
        $pintura_id = $request->id_pintura;
        $inventario = new Inventario();
        $inventario->idusuario= Auth::user()->id;
        $inventario->idpintura = $request->id_pintura;
        $inventario->save();
        $busquedapintura = DB::table('pinturas')
        ->select('pinturas.nombre_pintura as nombre_pintura, pinturas.tipo_pintura as tipo_pintura, pinturas.color as color')
        ->join('inventarios','inventarios.idpintura','pinturas.id_pintura')->get();
        return Response::json($busquedapintura);        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('inventarios')->where('id', $id)->delete();
        return \Response::json(['msg' => 'Eliminado']);

    }
}
