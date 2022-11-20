<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesores extends Model
{
    protected $fillable = ['nombre', 'apellido', 'profesion','telefono','foto','edad','sexo','direccion'];
}
