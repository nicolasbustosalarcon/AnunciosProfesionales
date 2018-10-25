@extends ('layouts.anunciopersonal')
@section ('contenido')

<!--TABS ACTIVOS - EN ESPERA - RECHAZADOS -->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul class="nav nav-tabs nav-justified">	
			<li class="active"><a data-toggle="tab" href="#demo">ACTIVOS<span class="badge "></span></a></li>
			<li><a data-toggle="tab" href="#demo2">EN ESPERA</a></li>
			<li><a data-toggle="tab" href="#demo3">RECHAZADOS</a></li>
		</ul>	
	</div>
</div>
<!------------------------------------------->

<!--------------CONTENIDO ------------------->
<div class="tab-content">

	<!-------ACTIVOS-------------------------->
	<div id="demo" class="tab-pane fade in active">
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
						<a href="{{URL::action('Usuario\AnuncioController@edit',$anun->idanuncio)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.anuncio.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios2->render()}}
	</div>	
	<!------------------------------------------>

	<!-------EN ESPERA-------------------------->
	<div id="demo2" class="tab-pane fade">
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
					<td>
						<a href="{{URL::action('Usuario\AnuncioController@edit',$anun->idanuncio)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.anuncio.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios3->render()}}
	</div>	
	<!------------------------------------------>

	<!-------RECHAZADOS-------------------------->
	<div id="demo3" class="tab-pane fade">
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
						<a href="{{URL::action('Usuario\AnuncioController@edit',$anun->idanuncio)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.anuncio.modal')
				@endforeach
			</table>

		</div>
		{{$anuncios1->render()}}
	</div>
	<!------------------------------------------------->
</div>
<!-------------FIN CONTENIDO -------------------------->

<!------------------BOTON VOLVER ---------------------->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3><a href="/almacen/anuncio"><button class='btn btn-danger'>Volver</button></a></h3>
</div>
<!----------------------------------------------------->


@endsection