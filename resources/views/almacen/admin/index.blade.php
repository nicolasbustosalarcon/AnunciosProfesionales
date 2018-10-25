@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Anuncios</h3>
		@include('almacen.admin.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Titulo</th>
					<th>Region</th>
					<th>Estado</th>
					<th>Categoria</th>
					<th>Descripcion</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Tipo de Anuncio</th>
					<th>Opciones</th>

				</thead>
               @foreach ($anuncios as $anun)
				<tr>
					<td>{{ $anun->idanuncio}}</td>
					<td>{{ $anun->titulo}}</td>
					<td>{{ $anun->region}}</td>
					<td>{{ $anun->estado}}</td>
					<td>{{ $anun->categoria}}</td>
					<td>{{ $anun->descripcion}}</td>
					<td>
						<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{ $anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
					</td>
					<td>{{ $anun->precio}}</td>
					<td>{{ $anun->tipo_anuncio}}</td>
					<td><a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
					
				</tr>
				@include('almacen.admin.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios->render()}}
	</div>
</div>

@endsection