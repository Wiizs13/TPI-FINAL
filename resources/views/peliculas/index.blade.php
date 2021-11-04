@extends('layouts.layout')
@include('layouts.nav')
<div class="container">
  <div class="row">
    <div class="col-sm-10 mx-5">

      @if(!empty($_SESSION['id']))        
        @if($_SESSION['rol'] == "admin")
          <a href="{{ route('peliculas.create') }}" class="btn btn-info" >Añadir pelicula</a>
        @endif
      @endif  

        @foreach($peliculas as $pelicula)  
          <div class="form-floating mb-3 border border-primary border-5 card" style="width: 18rem">

            <form action="{{ route('peliculas.show',$pelicula) }}" method="get">
              <button type="sumit" class="btn btn-xs" ><img class="ratio ratio-21x9" src="{{$pelicula->imgURL}}" alt="Portada"></button>
            </form>

            <div class="card-body" >
                <h5 class="card-title">{{$pelicula->nombre}}</h5>
                <p class="card-text">{{$pelicula->descripcion}}</p>
            </div>
            
          </div>
        @endforeach 

    </div>
  </div>
</div>