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
		<h3><a href="../almacen/anuncio"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>

	</div>
</div>
@endsection