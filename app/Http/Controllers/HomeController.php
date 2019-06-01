<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Figura;
use App\Noticias;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noticiaportada = DB::table('noticias')->orderByRaw('id_noticias DESC')->get();        
        $noticiaencontrada = Noticias::find($noticiaportada[0]->id_noticias);
        $figurasencontradas = Figura::orderby('id_figuras');
        $figuras = Figura::orderBy('id_figuras', 'desc')->take(3)->get();
        return view('home',['noticiaencontrada'=> $noticiaencontrada,'figuras' => $figuras]);
    }
}
