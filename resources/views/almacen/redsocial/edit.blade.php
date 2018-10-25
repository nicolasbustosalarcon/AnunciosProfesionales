@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Red Social: {{ $red_social->nombre_red}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($red_social,['method'=>'PATCH','route'=>['almacen.redsocial.update',$red_social->idred_social]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$red_social->nombre_red}}" placeholder="Nombre...">
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