@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Palabra censurada: {{ $palabra_censurada->palabra_censurada}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($palabra_censurada,['method'=>'PATCH','route'=>['almacen.censura.update',$palabra_censurada->idpalabra]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="palabra_censurada">Nombre</label>
            	<input type="text" name="palabra_censurada" class="form-control" value="{{$palabra_censurada->palabra_censurada}}" placeholder="Palabra ...">
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