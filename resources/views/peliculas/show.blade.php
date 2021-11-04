@extends('layouts.layout')
@include('layouts.nav')
<div class="container">
  <div class="row">
    <div class="col-sm-8 mx-auto">

        @foreach($pelicula as $peli)  
          <div class="card" style="width: 18rem;">
          <iframe src="https://www.youtube.com/embed/{{$peli->codigoURL}}" frameborder="0" allowfullscreen></iframe>

            <h5 class="card-title">{{$peli->nombre}}</h5>
            <p class="card-text">{{$peli->descripcion}}</p>
            <p class="card-text">Genero: {{$peli->genero}}</p>
            <p class="card-text">Precio de renta: {{$peli->preciorenta}}</p>
            <p class="card-text">Precio de venta: {{$peli->preciocompra}}</p>
            <p class="card-text">Stonk: {{$peli->stonk}}</p>
          </div>

            @if(!empty($_SESSION['id']))
              
              @if($_SESSION['rol'] == "admin")
                <div class="row">
                  <div class="col-xs-2 col-sm-2 col-md-2">
                    <a class="btn btn-primary btn-xs" href="{{ route('peliculas.edit', $peli)}}" >Editar</a>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <form action="{{ route('peliculas.destroy',$peli) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="sumit" class="btn btn-xs btn-danger" onclick="return confirm('¿Esta seguro de eliminar?')">Eliminar</button>
                    </form>
                  </div>
                </div>
              @endif

            @endif

            <div class="row">

              @if(!empty($_SESSION['id']))        
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <a class="btn btn-primary btn-xs" href="{{ route('renta.edit', $peli)}}" >Rentar</a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <a class="btn btn-primary btn-xs" href="{{ route('peliculas.edit', $peli)}}" >comprar</a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <a class="btn btn-primary btn-xs" href="{{ route('peliculas.edit', $peli)}}" >Me Gusta</a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <a class="btn btn-primary btn-xs" href="{{ route('peliculas.edit', $peli)}}" >No Me Gusta</a>
                </div>
              
              @else
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <a class="btn btn-primary btn-xs" href="{{ route('usuarios.login')}}" 
                  onclick="return confirm('Para Rentar una pelicula debe iniciar sesion, ¿Desea continuar?')" >Rentar</a>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <a class="btn btn-primary btn-xs" href="{{ route('usuarios.login')}}" 
                  onclick="return confirm('Para Comprar una pelicula debe iniciar sesion, ¿Desea continuar?')" >comprar</a>
                </div>
              @endif

            </div>
        @endforeach 

    </div>
  </div>
</div>