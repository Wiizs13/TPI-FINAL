@extends('layouts.layout')
@section('content')
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
				<h3 class="panel-title">Nuevo usuario</h3>
			</div>
			<div class="panel-body">					
				<div class="table-container">
					<form method="POST" action="{{ route('usuarios.update',$usuario) }}"  role="form">
						{{ csrf_field() }}
						<input name="_method" type="hidden" value="PATCH">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$usuario->nombre}}">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="correo" id="" class="form-control input-sm" value="{{$usuario->correo}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="contra" id="edicion" class="form-control input-sm" value="{{$usuario->contra}}">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="rol" id="precio" class="form-control input-sm" value="{{$usuario->rol}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
								<a href="{{ url('usuarios') }}" class="btn btn-info btn-block" >Atrás</a>
							</div>	
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
