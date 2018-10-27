@extends ('layouts.usuario')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Anuncios <a href="{{url('almacen/anuncio/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.anuncio.search')
	</div>
</div>
<div class= "row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"">
			@foreach ($anuncios as $anun)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4	">
				<div class="full-width container-post">
							<div class="full-width post">
								<figure class="full-width post-img">
									<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{ $anun->titulo}" height="150x" width="150px" class="img-rounded">
								</figure>
								<div class="full-width post-info">
											<a href="{{URL::action('Usuario\AnuncioController@show',[$anun->idanuncio,20])}}" class="full-width post-info-title">Titulo: {{ $anun->titulo}}</a>
											<p class="full-width post-info-price">Precio: $ {{ $anun->precio}}</p>
											<p class="post-info-zone">Región: {{ $anun->region}}</p>
											<p class="post-info-zone">Categoría: {{ $anun->categoria}}</p>
								</div>
							</div>
				</div>			
			</div>
			@endforeach
			{{$anuncios->render()}}
		</div>
</div>	
@endsection