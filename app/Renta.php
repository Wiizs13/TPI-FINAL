<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    // NOMBRE DE LA TABLA
    protected $table = 'rentas';
    // CAMPOS DE LA TABLA
    protected $fillable = ['nombreusuario', 'nombrepelicula', 'idusuario','idpelicula','preciorenta','create_at'];
}
