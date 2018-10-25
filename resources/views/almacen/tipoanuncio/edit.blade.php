@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tipo de Anuncio: {{ $tipoanuncio->nombre_tipo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tipoanuncio,['method'=>'PATCH','route'=>['almacen.tipoanuncio.update',$tipoanuncio->idtipo_anuncios]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$tipoanuncio->nombre_tipo}}" placeholder="Nombre...">
            </div>

            <div class="form-group">
            	<label for="precio">Precio</label>
            	<input type="text" name="precio" class="form-control" value="{{$tipoanuncio->precio_anuncio}}" placeholder="Precio del Anuncio...">
            </div>

            <div class="form-group">
            	<label for="cantidad_dias">Cantidad de Días</label>
            	<input type="text" name="cantidad_dias" class="form-control" value="{{$tipoanuncio->cantidad_dias}}" placeholder="Precio del Anuncio...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	
            </div>


			{!!Form::close()!!}		
            <div><a href="../"><button class="btn btn-danger" type="reset">Cancelar</button></a>
            </div>
		</div>
	</div>
@endsection