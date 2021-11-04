<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    // NOMBRE DE LA TABLA
    protected $table = 'compras';
    // CAMPOS DE LA TABLA
    protected $fillable = ['nombreusuario', 'nombrepelicula', 'idusuario','idpelicula','preciocompra','create_at'];
}
