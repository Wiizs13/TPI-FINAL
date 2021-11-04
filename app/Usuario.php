<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // NOMBRE DE LA TABLA
    protected $table = 'usuarios';
    // CAMPOS DE LA TABLA
    protected $fillable = ['nombre', 'correo', 'contra','rol'];
}
