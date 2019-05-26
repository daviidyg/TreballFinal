<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pintura extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id_pintura' => $this->id_pintura,
            'nombre_pintura' => $this->nombre_pintura,
            'tipo_pintura' => $this->tipo_pintura,
            'precio' => $this->precio,
            'color' => $this->color,
        ];
    }
}
