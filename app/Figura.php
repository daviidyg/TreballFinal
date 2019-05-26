<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
    protected $fillable = ['nombre_figuras', 'alianza_figuras','ejercito_figuras','minifoto','precio_figuras'];
    protected $primaryKey = 'id_figuras';
    public $timestamps = false;

}
