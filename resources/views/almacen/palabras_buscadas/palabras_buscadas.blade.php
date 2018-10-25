@extends ('layouts.secretaria')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Palabras más Buscadas</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Palabra</th>
					<th>Cantidad</th>
				</thead>
               @foreach ($palabras as $p)
				<tr>
					<td>{{ $p->idpalabra}}</td>
					<td>{{ $p->palabra}}</td>
					<td>{{ $p->cantidad}}</td>
				</tr>
				@endforeach
			</table>
		<h3><a href="../almacen/secretaria"><button class='btn btn-danger'>Volver</button></a></h3>
		</div>
	</div>
</div>

@endsection