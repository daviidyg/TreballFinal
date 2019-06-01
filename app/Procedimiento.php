<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    protected $fillable = ['id_figuras','contenido_noticia'];
    public $timestamps = false;

}
