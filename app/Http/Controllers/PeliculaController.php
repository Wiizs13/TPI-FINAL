<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        $peliculas = PeliculaController::catalogo();
        // REDIRECCIONA A LA VISTA DEL INDEX
        return view('peliculas.index', [
            //los datos que se manda a la vista
            'peliculas' => $peliculas
        ]); 
    }

    public static function catalogo()
    {
        // OBTIENE TODA LA INFORMACION Y LO ORDENA POR ID Y MUESTRA HASTA SOLO 12 PELIS
        return $peliculas=Pelicula::orderBy('id','DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   session_start();
        // REDIRECCIONA A LA VISTA DE CREAR
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // HACE QUE LOS CAMPOS SERAN REQUERIDOS PARA QUE NO ESTEN VACIOS
        $this->validate($request,[  'nombre'=>'required', 'descripcion'=>'required', 'genero'=>'required', 
                                    'codigoURL'=>'required', 'preciorenta'=>'required', 
                                    'preciocompra'=>'required', 'stonk'=>'required']);

        // DA LA ACCION DE CREAR CON TODOS LOS CAMPOS ENVIADOS
        Pelicula::create($request->all());
        // REDIRECCIONA A LA VISTA DE CREAR CON UN MENSAJE SUCCESS
        return redirect()->route('peliculas.create')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        session_start();
        // BUSCA EN LA DB LA PELICULA
        $pelicula=Pelicula::find($pelicula);
        
        // REDIRECCIONA A LA VISTA
        return  view('peliculas.show', [
            //los datos que se manda a la vista
            'pelicula' => $pelicula
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {   session_start();
        // REDIRECCIONA A LA VISTA DE EDITAR
        return view('peliculas.edit', [
            //los datos que se manda a la vista
            'pelicula' => $pelicula
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pelicula)
    {
        // HACE QUE LOS CAMPOS SERAN REQUERIDOS PARA QUE NO ESTEN VACIOS
        $this->validate($request,[  'nombre'=>'required', 'descripcion'=>'required', 'genero'=>'required', 
                                    'codigoURL'=>'required', 'preciorenta'=>'required', 
                                    'preciocompra'=>'required', 'stonk'=>'required']);
        // BUSCA EN EL DOCUMENTO
        Pelicula::find($pelicula)->update($request->all());
        // REDIRECCIONA A LA VISTA DE la pelicula modificada, con el nuevo valor
        return redirect()->route('peliculas.show',$pelicula);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        // DA LA ACCION DE ELIMINAR EL REGISTRO OBTENIDO
        $pelicula->delete();
        return redirect()->route('peliculas.index');
    }
}
