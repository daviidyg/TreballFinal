<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = ['id_noticias', 'titulo_noticia','subtitulo_noticia','contenido_noticia','portada_imagen','autor','imagen_contenido_noticia','pie_de_imagen_noticia'];
    public $timestamps = false;

}
