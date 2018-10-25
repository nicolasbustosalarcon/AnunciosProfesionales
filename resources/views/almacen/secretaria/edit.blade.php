@extends ('layouts.secretaria')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Anuncio: {{$anuncio->titulo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::model($anuncio,['method'=>'PATCH','route'=>['almacen.secretaria.update',$anuncio->idanuncio],'files'=>'true'])!!}
            {{Form::token()}}
                <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="titulo">Titulo</label>
            	<input type="text" name="titulo" required value="{{$anuncio->titulo}}" class="form-control">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
    			<label>Categoria</label>
    				<input type="text" name="idcategoria" required value="{{$anuncio->idcategoria}}" class="form-control">
    		</div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="region">Region</label>
            		<input type="text" name="region" required value="{{$anuncio->region}}" class="form-control">
            </div>	
    	</div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="idusuario">Id Usuario</label>
            	<input type="text" name="idusuario" required value="{{$anuncio->idusuario}}" class="form-control">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="precio">Precio</label>
            	<input type="text" name="precio" required value="{{$anuncio->precio}}" class="form-control">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Tipo de Anuncio</label>
          <input type="tipo_anuncio" name="tipo_anuncio" required value="{{$anuncio->tipo_anuncio}}" class="form-control">
        </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="descripcion">Descripcion</label>
            		<input type="text" name="descripcion" value="{{$anuncio->descripcion}}" class="form-control">
            </div>
    	</div>    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
            	@if (($anuncio->imagen)!="")
            		<img height="100px" width="100px" src="{{asset('imagenes/anuncios/'.$anuncio->imagen)}}">
            	@endif
            </div>
    	</div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
              <label>Estado del Anuncio</label>
          <select name="estado" class="form-control">
                <option type="numeric" value="0" selected="selected">Borrar Anuncio</option>
              </select>           
            </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
              <label for="comentario">Comentario Secretaria</label>
                <input type="text" name="comentario" value="{{$anuncio->comentario_secretaria}}" class="form-control">
            </div>
      </div> 
    </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        	<div class="form-group">
            	<button class="btn btn-primary" type="submit">Aceptar</button>
        	</div>
        </div>            
            
      </div>
  </div>

			{!!Form::close()!!}
        <a href="../../secretaria"><button class='btn btn-danger'>Volver</button></a>
		
            
		
@endsection