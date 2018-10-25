@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Palabra Censurada</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'almacen/censura','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="palabra_censurada">Palabra que desea Censurar</label>
            	<input type="text" name="palabra_censurada" class="form-control" placeholder="Nombre...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	
            </div>

			{!!Form::close()!!}		
             <div><a href="../censura"><button class="btn btn-danger" type="reset">Cancelar</button></a>
            </div>
		</div>
	</div>
@endsection