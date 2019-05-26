<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pintura;
use App\Http\Resources\Pintura as PinturaResources;
use Illuminate\Support\Facades\Auth;

class PinturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pintura = Pintura::all();
        return response()->json($pintura);
    }
    public function nuevapintura(){
        $usuario = Auth::user();
        if($usuario->admin == 1){
        $pintura = Pintura::all();
        return view('add.addpintura')->with('pintura',$pintura);;}
        else{
            return view ('auth.login');}
    }
    public function mySearch(Request $request)
    {
      if($request->has('search')){
        $pinturas = Pintura::search($request->get('search'))->get();  
      }else{
        $pinturas = Pintura::get();
      }
      return view('my-search', compact('pinturas'));
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
        if(Auth::user()->admin==1){
        $nuevapintura = new Pintura(array(
            'nombre_pintura' => $request->get('nombre_pintura'),
            'tipo_pintura' => $request->get('tipo_pintura'),
            'precio' => $request->get('precio'),
            'color' => $request->get('color'),
        ));
        $validatedData = $request->validate([
            'nombre_pintura' => 'required|unique:pinturas',
            'tipo_pintura' => 'required',
            'precio' => 'required',
            'color' => 'required',

        ]);
        $nuevapintura->save();
        return redirect ('/add/pinturas')->with('status', 'La pintura ha sido añadida.');
        }
        else{
            return view('home');
        }
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
        //
    }
}
