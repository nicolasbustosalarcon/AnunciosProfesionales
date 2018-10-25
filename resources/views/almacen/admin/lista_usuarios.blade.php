@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Usuarios Registrados</h3>
		@include('almacen.admin.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Region</th>
					<th>Ciudad</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Edad</th>
					<th>Tipo de Usuario</th>

				</thead>
               @foreach ($users as $us)
				<tr>
					<td>{{ $us->id}}</td>
					<td>{{ $us->name}}</td>
					<td>{{ $us->direccion_region}}</td>
					<td>{{ $us->direccion_ciudad}}</td>
					<td>{{ $us->email}}</td>
					<td>{{ $us->telefono}}</td>
					<td>{{ $us->edad}}</td>
					<td>{{ $us->tipo_usuario}}</td>
					<td><a href="" data-target="#modal-delete-{{$us->idanuncio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
					
				</tr>
				@include('almacen.admin.modal')
				@endforeach
			</table>

		</div>
		{{$users->render()}}
	</div>
</div>

@endsection