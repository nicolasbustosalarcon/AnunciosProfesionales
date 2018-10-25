@extends ('layouts.anunciopersonal')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<th><h2>Anuncios Publicados</h2></th>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Título</th>
					<th>Región</th>
					<th>Categoría</th>
					<th>Descripción</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Tipo de Anuncio</th>
					<th>Secretaria</th>
				</thead>
               @foreach ($anuncios2 as $anun)
				<tr>
					<td>{{ $anun->titulo}}</td>
					<td>{{ $anun->region}}</td>
					<td>{{ $anun->categoria}}</td>
					<td>{{ $anun->descripcion}}</td>
					<td>
						<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{ $anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
					</td>
					<td>{{ $anun->precio}}</td>
					<td>{{ $anun->tipo_anuncio}}</td>
					<td>{{ $anun->id_secretaria}}</td>
					<td>
						<a href="{{URL::action('Usuario\AnuncioController@edit',$anun->idanuncio)}}"><button class="btn btn-info" style="width: 70px">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger" style="width: 70px">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.anuncio.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios2->render()}}
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<th><h2>Anuncios en Espera</h2></th>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Título</th>
					<th>Región</th>
					<th>Categoría</th>
					<th>Descripción</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Tipo de Anuncio</th>
					<th>Secretaria</th>


				</thead>
               @foreach ($anuncios3 as $anun)
				<tr>
					<td>{{ $anun->titulo}}</td>
					<td>{{ $anun->region}}</td>
					<td>{{ $anun->categoria}}</td>
					<td>{{ $anun->descripcion}}</td>
					<td>
						<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{ $anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
					</td>
					<td>{{ $anun->precio}}</td>
					<td>{{ $anun->tipo_anuncio}}</td>
					<td>{{ $anun->id_secretaria}}</td>
					<td>
						<a href="{{URL::action('Usuario\AnuncioController@edit',$anun->idanuncio)}}"><button class="btn btn-info" style="width: 70px">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger" style="width: 70px">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.anuncio.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios3->render()}}
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<th><h2>Anuncios Rechazados</h2></th>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Título</th>
					<th>Región</th>
					<th>Categoría</th>
					<th>Descripción</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Tipo de Anuncio</th>
					<th>Secretaria</th>
					<th>Comentario de la Secretaria</th>
				</thead>
               @foreach ($anuncios1 as $anun)
				<tr>
					<td>{{ $anun->titulo}}</td>
					<td>{{ $anun->region}}</td>
					<td>{{ $anun->categoria}}</td>
					<td>{{ $anun->descripcion}}</td>
					<td>
						<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{ $anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
					</td>
					<td>{{ $anun->precio}}</td>
					<td>{{ $anun->tipo_anuncio}}</td>
					<td>{{ $anun->id_secretaria}}</td>
					<td>{{ $anun->comentario_secretaria}}</td>
					<td>
						<a href="{{URL::action('Usuario\AnuncioController@edit',$anun->idanuncio)}}"><button class="btn btn-info" style="width: 70px">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger" style="width: 70px">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.anuncio.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios1->render()}}
	</div>
</div>
	<h3><a href="/almacen/anuncio"><button class='btn btn-danger'>Volver</button></a></h3>


@endsection