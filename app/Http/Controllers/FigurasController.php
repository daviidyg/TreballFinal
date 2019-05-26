<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Figura;
use App\Pintura;
use Input;


class FigurasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function nuevaminiatura(){
        $figuras = Figura::all();
        $pinturas = Pintura::all();
        return view('add.addminiatura',compact(['figuras','pinturas'])) ;
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
            $nuevaMiniatura = new Figura(array(
                'nombre_figuras' => $request->get('nombre_figuras'),
                'alianza_figuras' => $request->get('alianza_figuras'),
                'ejercito_figuras' => $request->get('ejercito_figuras'),
                'precio_figuras' => $request->get('precio_figuras'),
            ));
            $validatedData = $request->validate([
                'nombre_figuras' => 'required|unique:figuras',
                'alianza_figuras' => 'required',
                'ejercito_figuras' => 'required',
                'precio_figuras' => 'required',
            ]);
            $nuevaMiniatura->save();
            return redirect ('/add/figuras')->with('status', 'La miniatura ha sido añadida.');          
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
    public function update(Request $request, $id_figuras)
    {
        $figura = Figura::find($id_figuras);
        $this->validate($request,  [
            'minifoto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
       $imagen = $request->file('minifoto');
       $nombre = time().$figura->id_figuras.'.'.$imagen->getClientOriginalExtension();
       $imagen->move(public_path("miniaturas"), $nombre);
       $figura->nombre_figuras = $request->input('Nombre');
       $figura->alianza_figuras = $request->input('Alianza');
       $figura->ejercito_figuras = $request->input('Ejercito');
       $figura->precio_figuras = $request->input('Precio');
       $figura->minifoto = $nombre;
       $figura->save(); 
       return redirect ('/add/figuras')->with('status', 'La miniatura ha sido añadida.');          

    }
    public function addpinturaf(Request $request, $id_figuras){
        $pintura_figura = $request->miembro_investidura['investidura_id'];
        $cont= 0;
        while($cont < count($investidura_id)){
            $miembro_investidura = new Miembro_investidura();
            $miembro_investidura->miembro_id= $miembro->id;
            $miembro_investidura->investidura_id= $investidura_id[$cont];
            $miembro_investidura->save();
            
            $cont=$cont + 1;
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_figuras)
    {
        $figura = Figura::find($id_figuras);
        $figura->delete();
        return redirect('/add/figuras') ;
    }
}
