@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Regiones <a href="regiones/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.regiones.search')
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
               @foreach ($regiones as $re)
				<tr>
					<td>{{ $re->idregion}}</td>
					<td>{{ $re->nombre_region}}</td>
					<td>
						<a href="{{URL::action('Administrador\RegionController@edit',$re->idregion)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$re->idregion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.regiones.modal')
				@endforeach
			</table>
		<h3><a href="../almacen/admin"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
		{{$regiones->render()}}
	</div>
</div>

@endsection