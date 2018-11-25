@extends ('layouts.usuario')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de mensajes</h3>	
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<div>
					<h4>Mensajes Recibidos</h4>
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Anuncio</th>
							<th>Imagen</th>
							<th>De</th>
							<th>Mensaje</th>
							<th>Opciones</th>
						</thead>
		               @foreach ($mensajes as $men)
		               		@foreach($anuncios as $anun)
		               			@foreach($users as $use)
			               			@if($use->id == $men->id_usuario_envia)
				               			@if($men->id_anuncio == $anun->idanuncio)
							               	@if($men->estado == 1)
								               	@if(Auth::user()->id == $men->id_usuario_recibe)
												<tr>
													<td>{{ $anun->titulo}}</td>
													<td>{{ $use->name}}</td>
													<td>{{ $men->mensaje}}</td>
													<td>
														<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{$anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
													</td>
													<td><a href="{{URL::action('Usuario\VerMensajesController@edit',$men->idmensaje)}}"><button class="btn btn-info">Marcar como leído</button></a>
                    								<a href="{{URL::action('Usuario\VerMensajesController@show',[$men->idmensaje,$men->id_anuncio])}}"><button class="btn btn-warning">Responder mensaje</button></a>
                    								</td>
												</tr>
												@endif
											@endif
										@endif
									@endif
								@endforeach
							@endforeach
						@endforeach
						
				</table>
			</div>	
			<div>
			<h4>Mensajes Leídos</h4>

					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Anuncio</th>
							<th>Imagen</th>
							<th>De</th>
							<th>Mensaje</th>
							<th>Opciones</th>
						</thead>
		               @foreach ($mensajes as $men)
		               		@foreach($anuncios as $anun)
		               			@foreach($users as $use)
			               			@if($use->id == $men->id_usuario_envia)
				               			@if($men->id_anuncio == $anun->idanuncio)
							               	@if($men->estado == 2)
								               	@if(Auth::user()->id == $men->id_usuario_recibe)
												<tr>
													<td>{{ $anun->titulo}}</td>
													<td>
														<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{$anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
													</td>													
													<td>{{ $use->name}}</td>
													<td>{{ $men->mensaje}}</td>
													<td><a href="{{URL::action('Usuario\VerMensajesController@show',[$men->idmensaje,$men->id_anuncio])}}"><button class="btn btn-warning">Responder mensaje</button></a>
													</td>
												</tr>
												@endif
											@endif
										@endif
									@endif
								@endforeach
							@endforeach
						@endforeach
				</table>
			</div>			
			<div>
			<h4>Mensajes enviados</h4>
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Anuncio</th>
							<th>Imagen</th>
							<th>Para</th>
							<th>Mensaje</th>
							<th>Opciones</th>
						</thead>
		               @foreach ($mensajes as $men)
		               		@foreach($anuncios as $anun)
		               			@foreach($users as $use)
			               			@if($use->id == $men->id_usuario_recibe)
				               			@if($men->id_anuncio == $anun->idanuncio)
							               	@if($men->estado == 1)
								               	@if(Auth::user()->id == $men->id_usuario_envia)
												<tr>
													<td>{{ $anun->titulo}}</td>
													<td>
														<img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{$anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
													</td>													
													<td>{{ $use->name}}</td>
													<td>{{ $men->mensaje}}</td>
													<td>
														<a href="" data-target="#modal-delete-{{$men->idmensaje}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    								
												</tr>
												@include('almacen.vermensajes.modal')

												@endif
											@endif
										@endif
									@endif
								@endforeach
							@endforeach
						@endforeach
				</table>
			</div>			
		<h3><a href="../almacen/anuncio"><button class='btn btn-warning'>Volver</button></a></h3>
		</div>

	</div>
</div>
@endsection