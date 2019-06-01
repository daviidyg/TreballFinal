<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticias;
use App\User;
use Illuminate\Support\Facades\Input;


class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::all();
        return view('post.noticias')->with("noticias",$noticias);    
    }

    public function nuevanoticia(){
        return view ('add.addnoticia');
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
    public function MostrarNoticia($id_noticias){
        $noticias = Noticias::where('id_noticias',$id_noticias)->get();
        return view('post.noticiascompleta')->with("noticias",$noticias);    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,  [
            'portada_imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'imagen_contenido_noticia' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);
        $usuario = $request->get('id_usuario');
        $nuevousuario = User::find($usuario);
        $portada_imagen = $request->file('portada_imagen');
        $pi_extension = $portada_imagen->getClientOriginalExtension();
        $nombre = time().'portada.'.$pi_extension;
        $portada_imagen->storeAs('/noticias', $nombre);
        $contenido_imagen = $request->file('imagen_contenido_noticia');
        $ci_extension = $contenido_imagen->getClientOriginalExtension();
        $nombree = time().'contenido.'.$ci_extension;
        $contenido_imagen->storeAs('/noticias', $nombree);
        $NuevaNoticia = new Noticias(array(
            'titulo_noticia' => $request->get('titulo_noticia'),
            'subtitulo_noticia' => $request->get('subtitulo_noticia'),
            'contenido_noticia' => $request->get('contenido_noticia'),
            'portada_imagen' => $nombre,
            'autor' =>$nuevousuario->name,
            'imagen_contenido_noticia' => $nombree,
            'pie_de_imagen_noticia' => $request->get('pie_de_imagen_noticia'),
        ));
        $NuevaNoticia->save();
        return redirect ('/noticias/all')->with('status', 'La miniatura ha sido añadida.');          

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
