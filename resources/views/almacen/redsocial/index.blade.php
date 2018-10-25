@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Redes Sociales <a href="redsocial/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.redsocial.search')
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
               @foreach ($red_social as $red)
				<tr>
					<td>{{ $red->idred_social}}</td>
					<td>{{ $red->nombre_red}}</td>
					<td>
						<a href="{{URL::action('Administrador\RedsocialController@edit',$red->idred_social)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$red->idred_social}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.redsocial.modal')
				@endforeach
			</table>
		<h3><a href="../almacen/admin"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
		{{$red_social->render()}}
	</div>
</div>

@endsection