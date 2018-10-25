@extends ('layouts.admin')
@section ('contenido') 
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="/almacen/lista_usuarios/create"><button class="btn btn-success">Crear Nuevo Usuario</button></a></h3>
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
					<th>Telefono</th>
					<th>Correo</th>
					<th>Edad</th>
					<th>Tipo de Usuario</th>
					<th>Opciones</th>
				</thead>
               @foreach ($users as $u)<!--se muestran todos los usuarios obtenidos en la consulta hecha en el controlador-->
				<tr>
					<td>{{ $u->id}}</td>
					<td>{{ $u->name}}</td>
					<td>{{ $u->direccion_region}}</td>
					<td>{{ $u->direccion_cuidad}}</td>
					<td>{{ $u->telefono}}</td>
					<td>{{ $u->email}}</td>
					<td>{{ $u->edad}}</td>
					<td>{{ $u->tipo_usuario}}</td>
					<td>
						<a href="{{URL::action('Administrador\ListausuarioController@edit',$u->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$u->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.lista_usuarios.modal')
				@endforeach
			</table>
		<h3><a href="../almacen/admin"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
		{{$users->render()}}
	</div>
</div>

@endsection