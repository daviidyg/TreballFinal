<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pintura;
use App\Inventario;
use DB;
Use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function profile()
    {
        $user = Auth::user()->id;
        $userencontrado = User::find($user);
        $inventario = DB::table('pinturas')
        ->select('inventarios.id','pinturas.id_pintura as id_pintura','pinturas.nombre_pintura as nombre_pintura', 'pinturas.tipo_pintura as tipo_pintura', 'pinturas.color as color' )
        ->join('inventarios','inventarios.idpintura','pinturas.id_pintura')
        ->where('inventarios.idusuario',$userencontrado->id)->get();
        $pinturas = Pintura::all();
        return view('user.inventario',compact(['user','pinturas','inventario','invid']));
    }
    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','Tu imagen se ha subido de forma correcta');

    }

    public function index()
    {
        $usuario = Auth::user();
        $inventario = DB::table('pinturas')
        ->select('inventarios.id','pinturas.precio as precio','pinturas.id_pintura as id_pintura',
        'pinturas.nombre_pintura as nombre_pintura', 'pinturas.tipo_pintura as tipo_pintura', 'pinturas.color as color' )
        ->join('inventarios','inventarios.idpintura','pinturas.id_pintura')
        ->where('inventarios.idusuario',$usuario->id)->get();
         return view('user.profile')->with('inventario',$inventario);
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
        //
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
    public function update(Request $request)
    {
        return view('user.ajustes');
    }
    public function UpdateProfile(){
        return view('user.update');
    }

    public function EditarUsuario(Request $request){

        $user = Auth::user()->id;
        $buscando = User::find($user);
        $buscando->name = $request->input('nombre_usuario');
        $buscando->email = $request->input('correo_electronico');
        $buscando->save(); 
       return redirect ('/profile')->with('status', 'La miniatura ha sido añadida.');          

    }
    public function addimages (Request $request){
      
        
        if ($request->hasFile('image_perfil')) {
            $usuario = Auth::user()->id; 
            $user = User::find($usuario);
            $avatar = $request->file('image_perfil');
            $ci_extension = $avatar->getClientOriginalExtension();
            $nombree = time().'avatar.'.$ci_extension;
            $avatar->storeAs('/perfiles', $nombree);
            $user->avatar=$nombree;
            $user->save();
            return redirect('/profile/datos');

        }
            $usuario = Auth::user()->id; 
            $user = User::find($usuario);
            $banner = $request->file('image_banner');
            $ci_extension = $banner->getClientOriginalExtension();
            $nombrebanner = time().'banner.'.$ci_extension;
            $banner->storeAs('/perfiles', $nombrebanner);
            $user->banner = $nombrebanner;
            $user->save();
            return redirect('/profile/datos');
  
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
    public function imagen (){

        return view('user.perfilimagen');
    }
}
