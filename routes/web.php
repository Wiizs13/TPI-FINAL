<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.home');
});

// RUTAS DE PELICULAS
Route::get('/peliculas', 'PeliculaController@index')->name('peliculas.index');

Route::get('/peliculas/create', 'PeliculaController@create')->name('peliculas.create');

Route::POST('/peliculas/store', 'PeliculaController@store')->name('peliculas.store');

Route::get('/peliculas/{pelicula}', 'PeliculaController@show')->name('peliculas.show');

Route::get('/peliculas/{pelicula}/edit', 'PeliculaController@edit')->name('peliculas.edit');

Route::PATCH('/peliculas/{pelicula}', 'PeliculaController@update')->name('peliculas.update');

Route::delete('/peliculas/{pelicula}', 'PeliculaController@destroy')->name('peliculas.destroy');


// RUTAS DE USUARIOS

Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');

Route::get('/usuarios/create', 'UsuarioController@create')->name('usuarios.create');

Route::POST('/usuarios/store', 'UsuarioController@store')->name('usuarios.store');

Route::get('/usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show');

Route::get('/usuarios/{usuario}/edit', 'UsuarioController@edit')->name('usuarios.edit');

Route::PATCH('/usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update');

Route::delete('/usuarios/{usuario}', 'UsuarioController@destroy')->name('usuarios.destroy');


// RUTAS DE Home

Route::get('/home/login', 'UsuarioController@login')->name('usuarios.login');

Route::POST('/home/login', 'UsuarioController@verificar')->name('usuarios.verificar');

Route::get('/home/cerrar', 'UsuarioController@cerrar')->name('usuarios.cerrar');