@extends('layouts.layout')
@include('layouts.nav')
<div class="container">
  <div class="row">
    <div class="col-sm-8 mx-auto">
      <a href="{{ route('usuarios.create') }}" class="btn btn-info" >Añadir usuario</a>
      <table class="table">
         <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Contraseña</th>
              <th>Rol</th>
              <th>Creado</th>
            <tr>
         </thead>
         <tbody>
            @if($usuarios->count())  
                @foreach($usuarios as $usuario)  
                <tr>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->correo}}</td>
                <td>{{$usuario->contra}}</td>
                <td>{{$usuario->rol}}</td>
                <td>{{$usuario->created_at}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{ route('usuarios.edit', $usuario)}}" >Editar<span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <form action="{{ route('usuarios.destroy',$usuario) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="sumit" class="btn btn-sm btn-danger" onclick="return confirm('¿Esta seguro de eliminar?')">Eliminar</button>
                    </form>
                </td>
                </tr>
                @endforeach 
            @else
              <td>
                <h1 colspan="8">No hay registro !!</h1>
              </td>
            @endif
           
        </tbody>

      </table>
    </div>
  </div>
</div>