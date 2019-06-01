<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Figura;
use App\Pintura;
use App\Procedimiento;
use DB;
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
        $figura = Figura::all();
        return view('post.figuras')->with('figura',$figura);
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
    public function edit(Request $request)
    {
        $id_figuras=$request->id_figuras;
        $figurin=Figura::find($id_figuras);
           $salida = array(
                'Nombre' => $figurin->nombre_figuras,
                'Alianza' => $figurin->alianza_figuras,
                'Ejercito' => $figurin->ejercito_figuras,
                'Precio' => $figurin->precio_figuras,
                'id' => $figurin->$id_figuras,
            );
            echo json_encode($salida);
    }

    public function UploadPDF (Request $request, $id_figuras){
        if ($request->hasFile('normativaspdf')) {
            $figuras = Figura::find($request->id);
            $pdf = $request->file('normativaspdf');
            $ci_extension = $pdf->getClientOriginalExtension();
            $nombree = time().'pdf.'.$ci_extension;
            $pdf->storeAs('/normas', $nombree);
            $figuras->normas = $nombree;
            $figuras->save();
            return redirect('/add/figuras');

        }
    }
    public function Procedimiento (Request $request, $id_figuras){
        $procedimento = new Procedimiento();
        $procedimento->contenido_noticia = $request->input('procedmiento');
        $procedimento->id_figuras = $id_figuras;
        $procedimento->save();
        return redirect('add/figuras');
    }

    public function mostrarcompleta($id_figuras){
      $figuras = Figura::where('id_figuras',$id_figuras)->get();
       $procedimento = DB::table('procedimientos')
       ->select('procedimientos.contenido_noticia as contenido_noticia, procedimientos.id_figuras as id_figuras')
       ->join('figuras','figuras.id_figuras','procedimientos.id_figuras')->get();
       return view('post.figuracompleta', ['figuras'=> $figuras,'procedimento' => $procedimento]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $figura = Figura::find($request->input('id'));
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        if($request->ajax()){
            $id_figuras = $request->id;
            $figura = Figura::find($id_figuras);
                $figura->delete();
                return response()->with('message', '¡Figura borrada!');
                return redirect('/add/figuras');
            }
            
        }
    }
