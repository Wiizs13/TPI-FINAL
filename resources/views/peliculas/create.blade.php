@extends('layouts.layout')
@include('layouts.nav')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Error!</strong> Revise los campos obligatorios.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(Session::has('success'))
		<div class="alert alert-info">
			{{Session::get('success')}}
		</div>
		@endif
 
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Nuevo pelicula</h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="POST" action="{{ route('peliculas.store') }}"  role="form">
						@csrf
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="nombre" class="form-control input-sm" placeholder="Nombre de la pelicula">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="genero" class="form-control input-sm" placeholder="Genero de la pelicula">
								</div>
							</div>
						</div>
 
						<div class="form-group">
							<textarea name="descripcion" class="form-control input-sm" placeholder="Descripcion de la pelicula"></textarea>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="preciorenta" class="form-control input-sm" placeholder="Precio de renta de la pelicula">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="preciocompra" class="form-control input-sm" placeholder="Precio de compra de la pelicula">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="imgURL" class="form-control input-sm" placeholder="URL de la imagen de la pelicula">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="codigoURL" class="form-control input-sm" placeholder="Codigo de URL de la pelicula">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="stonk" class="form-control input-sm" placeholder="Cantidad de la pelicula en stonk">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="disponibilidad" class="form-control input-sm" placeholder="disponibilidad">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<input type="submit"  value="Guardar" class="btn btn-success btn-block">
								<a href="{{ url('peliculas') }}" class="btn btn-info btn-block" >Atrás</a>
							</div>	
						</div>
					</form>
				</div>
			</div>
 
		</div>
	</div>
</div>
