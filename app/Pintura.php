<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pintura extends Model
{
    protected $fillable = ['nombre_pintura', 'tipo_pintura','precio','color'];
    protected $primaryKey = 'id_pintura';
    public $timestamps = false;

}
