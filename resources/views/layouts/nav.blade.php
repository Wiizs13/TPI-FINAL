<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        @if(!empty($_SESSION['id']))     
          @if($_SESSION['rol'] == "admin")
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('usuarios.index') }}">Usuarios</a>
            </li>
          @endif
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{{ route('peliculas.index') }}">Peliculas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('usuarios.login') }}">Login</a>  
        </li>

      </ul>
      <form class="d-flex">
        
        @if(!empty($_SESSION['id']))
          <h5 class="card-title">Hola {{$_SESSION['nombre']}}</h5>

          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('usuarios.cerrar') }}">Cerrar Sesion</a>  
          </li>
        @endif
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>