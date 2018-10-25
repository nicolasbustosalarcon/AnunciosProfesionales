@extends ('layouts.admin')
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

			{!!Form::open(array('url'=>'almacen/admin','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
            	<label for="region">Region</label>
            		<select name="region" class="form-control">    
       						<option value="Region Metropolitana" selected="selected">Region Metropolitana</option>
       						<option value="XV Arica y Parinacota"  selected="selected">XV Arica y Parinacota</option>
       						<option value="I Tarapaca"  selected="selected">I Tarapacá</option>
       						<option value="II Antofagasta"  selected="selected">II Antofagasta</option>
       						<option value="III Atacama"  selected="selected">III Atacama</option>
       						<option value="IV Coquimbo"  selected="selected">IV Coquimbo</option>
       						<option value="V Valparaiso"  selected="selected">V Valparaiso</option>
       						<option value="VI O'Higgins"  selected="selected">VI O'Higgins</option>
       						<option value="VII Maule"  selected="selected">VII Maule </option>
       						<option value="VIII BioBio"  selected="selected">VII BioBio</option>
       						<option value="IX La Araucania"  selected="selected">IX La Araucania</option>
       						<option value="XIV Los Ríos"  selected="selected">XIV Los Ríos</option>
       						<option value="X Los Lagos"  selected="selected">X Los Lagos</option>
       						<option value="XI Aysén"  selected="selected">XI Aysén</option>
       						<option value="XII Magallanes y Antártica"  selected="selected">XII Magallanes y Antártica</option>

  					</select>	
            </div>	
    	</div>

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="idusuario">Id Usuario</label>
            	<input type="text" name="idusuario" required value="{{old('idusuario')}}" class="form-control" placeholder="ID Usuario">
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
       					<option type="numeric" value="1" selected="selected">Bronce</option>
       					<option type="numeric" value="2" selected="selected">Plata</option>
       					<option type="numeric" value="3" selected="selected">Oro</option>
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
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
            </div>
    	</div>
    </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        	<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{url('../almacen/admin')}}" class="btn btn-danger" type="button">Cancelar</a>
        	</div>
        </div>            
            
      </div>
  </div>
			{!!Form::close()!!}		
            
		
@endsection