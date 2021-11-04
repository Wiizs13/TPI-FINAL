<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    // NOMBRE DE LA TABLA
    protected $table = 'peliculas';
    // CAMPOS DE LA TABLA
    protected $fillable = ['nombre', 'descripcion', 'genero','codigoURL','imgURL','preciorenta',
                            'preciocompra','disponibilidad','popularidad','stonk','create_at'];

    public function NoLike()
    {
        
    }

}
