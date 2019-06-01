<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = ['idusuario','idpintura'];
    public $timestamps = false;

}
