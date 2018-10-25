@extends ('layouts.usuario')
@section ('contenido') 
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Mi Perfil</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Region</th>
					<th>Ciudad</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Edad</th>
					<th>Opciones</th>
				</thead>
               @foreach ($users as $u)
				<tr>
					<td>{{ $u->name}}</td>
					<td>{{ $u->direccion_region}}</td>
					<td>{{ $u->direccion_cuidad}}</td>
					<td>{{ $u->telefono}}</td>
					<td>{{ $u->email}}</td>
					<td>{{ $u->edad}}</td>
					<td>
						<a href="{{URL::action('Usuario\EditarUsuarioController@edit',$u->id)}}"><button class="btn btn-info">Editar</button></a>
					</td>
				</tr>
				@include('almacen.editar_usuario.modal')
				@endforeach
			</table>
		<h3><a href="../../almacen/anuncio"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
		{{$users->render()}}
	</div>
</div>

@endsection