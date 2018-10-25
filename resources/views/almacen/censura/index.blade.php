@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Palabras Censuradas <a href="censura/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.censura.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($censura as $cen)
				<tr>
					<td>{{ $cen->idpalabra}}</td>
					<td>{{ $cen->palabra_censurada}}</td>
					<td>
						<a href="{{URL::action('Administrador\CensuraController@edit',$cen->idpalabra)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cen->idpalabra}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.censura.modal')
				@endforeach
			</table>
		<h3><a href="../almacen/admin"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
		{{$censura->render()}}
	</div>
</div>

@endsection