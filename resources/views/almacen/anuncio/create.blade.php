@extends ('layouts.usuario')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Anuncio</h3>
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

			{!!Form::open(array('url'=>'almacen/anuncio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="titulo">Titulo</label>
            	<input type="text" name="titulo" required value="{{old('titulo')}}" class="form-control" placeholder="Titulo...">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
    			<label>Categoria</label>
    				<select name="idcategoria" class="form-control">
    					@foreach ($categorias as $cat)
    						<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
    					@endforeach
    				</select>
    		</div>
    	</div>
    	
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Region</label>
            <select name="idregion" class="form-control">
              @foreach ($regiones as $reg)
                <option value="{{$reg->idregion}}">{{$reg->nombre_region}}</option>
              @endforeach
            </select>
        </div>
      </div>


    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="precio">Precio</label>
            	<input type="text" name="precio" required value="{{old('precio')}}" class="form-control" placeholder="Ej:100000">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Tipo de Anuncio</label>
            <select name="tipo_anuncio" class="form-control">
              @foreach ($tipo_anuncios as $ta)
                <option value="{{$ta->idtipo_anuncios}}">{{$ta->nombre_tipo}}</option>
              @endforeach
            </select>
        </div>
      </div> 

      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
              <label for="descripcion">Descripcion</label>
                <textarea type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del Anuncio">
                </textarea>
            </div>
      </div>  

      <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
        <div class="form-group">
          <label>Seleccionar Red Social</label>
            <select name="redsocial" class="form-control">
              @foreach ($redes_sociales as $rs)
                <option value="{{$rs->idred_social}}">{{$rs->nombre_red}}</option>
              @endforeach
            </select>
        </div>
      </div> 


      <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
        <div class="form-group">
              <label for="redsocial1">Red Social 1</label>
              <input type="text" name="redsocial1" required value="{{old('redsocial1')}}" class="form-control" placeholder="https:.....">
            </div>
      </div>

      <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
        <div class="form-group">
          <label>Seleccionar Red Social</label>
            <select name="redsocialdos" class="form-control">
              @foreach ($redes_sociales as $rs)
                <option value="{{$rs->idred_social}}">{{$rs->nombre_red}}</option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
        <div class="form-group">
              <label for="redsocial2">Red Social 2</label>
              <input type="text" name="redsocial2" required value="{{old('redsocial2')}}" class="form-control" placeholder="https:....">
        </div>
      </div> 

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="imagen">Imagen 1</label>
            	<input type="file" name="imagen" class="form-control">
              <label for="imagen">Imagen 2</label>
              <input type="file" name="imagen2" class="form-control">
              <label for="imagen">Imagen 3</label>
              <input type="file" name="imagen3" class="form-control">
            </div>
    	</div>
    </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        	<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{url('../almacen/anuncio')}}" class="btn btn-danger" type="button">Cancelar</a>
        	</div>
        </div>            
            
      </div>
  </div>
			{!!Form::close()!!}		
            
		
@endsection