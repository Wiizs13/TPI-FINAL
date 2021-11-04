<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Pelicula;

class UsuarioController extends Controller
{
    public function login(){

        // REDIRECCIONA A LA VISTA DEl LOGIN
        return view('home.login');

    }

    public function verificar(Request $request){

        $usuarios = UsuarioController::usuarios();

        foreach($usuarios as $usuario){
            if($request->usuario == $usuario->nombre){

                if($request->codigo == $usuario->contra){

                    $peliculas = PeliculaController::catalogo();

                    session_start();

                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['nombre'] = $usuario->nombre;
                    $_SESSION['correo'] = $usuario->correo;
                    $_SESSION['contra'] = $usuario->contra;
                    $_SESSION['rol'] = $usuario->rol;

                    return view('peliculas.index', [
                        //los datos que se manda a la vista
                        'peliculas' => $peliculas,
                        'usuario' => $usuario
                    ]); 

                }

            }
        }
        return view('home.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        
        $usuarios = UsuarioController::usuarios();

        // REDIRECCIONA A LA VISTA DEL INDEX
        return view('usuarios.index', [
            //los datos que se manda a la vista
            'usuarios' => $usuarios
        ]); 
    }

    public static function usuarios()
    {
        // OBTIENE TODA LA INFORMACION Y LO ORDENA POR ID
        return $usuarios=Usuario::orderBy('id','DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // REDIRECCIONA A LA VISTA DE CREAR
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DA LA ACCION DE CREAR CON TODOS LOS CAMPOS ENVIADOS
        Usuario::create($request->all());
        // REDIRECCIONA A LA VISTA DE CREAR CON UN MENSAJE SUCCESS
        return redirect()->route('usuarios.create')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        // BUSCA EN LA DB LA PELICULA
        $usuario=Usuario::find($usuario);
        
        // REDIRECCIONA A LA VISTA
        return  view('usuarios.show', [
            //los datos que se manda a la vista
            'usuario' => $usuario
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        // REDIRECCIONA A LA VISTA DE EDITAR
        return view('usuarios.edit',[
            //los datos que se manda a la vista
            'usuario' => $usuario
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usuario)
    {
        // HACE QUE LOS CAMPOS SERAN REQUERIDOS PARA QUE NO ESTEN VACIOS
        $this->validate($request,[  'nombre'=>'required', 'correo'=>'required', 
                                    'contra'=>'required', 'rol'=>'required']);
        // BUSCA EN EL DOCUMENTO
        Usuario::find($usuario)->update($request->all());
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        // DA LA ACCION DE ELIMINAR EL REGISTRO OBTENIDO
        $usuario->delete();
        return back();
    }

    public function cerrar()
    {
        session_start();
        session_destroy();

        unset($_SESSION);

        $peliculas = PeliculaController::catalogo();

        return view('peliculas.index', [
            //los datos que se manda a la vista
            'peliculas' => $peliculas
        ]); 
    }

}
