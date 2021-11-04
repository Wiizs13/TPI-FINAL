@extends('layouts.layout')
<body class="p-3 mb-2 bg-secondary bg-gradient text-white">

<div class="row p-5 justify-content-center">
          
  <div class="col-md-5 border border-light border-5 p-3 mb-2 bg-info text-dark">
    
      <main class="form-signin">

        <form action="{{ route('usuarios.verificar') }}" class="row g-3 needs-validation" method="post">
        @csrf
          <h1 class="h3 mb-3 fw-normal">Iniciar Sesion</h1>

          <div class="form-floating">

            <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Usuario">
            <label for="floatingInput">Nombre</label>

          </div>
          <div class="form-floating">

            <input type="password" name="codigo" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Codigo</label>
            
          </div>

          <button class="w-50 p-1 btn btn-primary text-light btn-outline-secondary" type="submit">Iniciar</button>

        </form>
      </main>    
          
    </div>

</div>

</body>