@extends ('layouts.usuario')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Nuevo Mensaje</h3>
	</div>
</div>
{!!Form::open(array('url'=>'almacen/mensaje','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="id_anuncio">Anuncio</label>
 					<select name="id_anuncio" class="form-control">
				              <option value="{{$anuncio->idanuncio}}">{{$anuncio->titulo}}</option>
    				</select>
    			<label for="id_usuario_envia">De</label>
 					<select name="id_usuario_envia" class="form-control">
				              <option value="{{Auth::user()->id}}">{{ Auth::user()->name}}</option>
    				</select>
    			<label for="id_usuario_envia">Para</label>
 					<select name="id_usuario_recibe" class="form-control">
 						@foreach ($usuarios as $users)<!--se recorre la tabla de usuarios y anuncios-->
			              @if (strcmp($anuncio->idusuario, $users->id) === 0)<!--se encuentra el usuario que publico el anuncio-->
			              <option value="{{$users->id}}">{{ $users->name}}</option>
			              @endif
			            @endforeach 
    				</select>
    			<div class="form-group">
	              <label for="mensaje">Mensaje</label>
	                <input type="text" name="mensaje" required value="{{old('mensaje')}}" class="form-control" placeholder="Mensaje para el Usuario">
	                </input>
	            </div>
	            <div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar</button>
          
			{!!Form::close()!!}	
		<a href="{{url('../almacen/anuncio')}}" class="btn btn-danger" type="button">Cancelar</a>	
              		</div>	
            </div>
    	</div>		
  </div>
@endsection