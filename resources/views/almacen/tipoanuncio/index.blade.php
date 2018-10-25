@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de tipos de Anuncios <a href="tipoanuncio/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.tipoanuncio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad de Días</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tipo_anuncios as $ta)
				<tr>
					<td>{{ $ta->idtipo_anuncios}}</td>
					<td>{{ $ta->nombre_tipo}}</td>
					<td>{{ $ta->precio_anuncio}}</td>
					<td>{{ $ta->cantidad_dias}}</td>
					<td>
						<a href="{{URL::action('Administrador\TipoanuncioController@edit',$ta->idtipo_anuncios)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ta->idtipo_anuncios}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.tipoanuncio.modal')
				@endforeach
			</table>
		<h3><a href="../almacen/admin"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
		{{$tipo_anuncios->render()}}
	</div>
</div>

@endsection