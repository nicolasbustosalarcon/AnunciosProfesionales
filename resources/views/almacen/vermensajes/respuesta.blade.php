@extends ('layouts.usuario')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Responder Mensaje </h3>
		{!!Form::open(array('url'=>'almacen/vermensajes','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="id_anuncio">Anuncio</label>
 					<select name="id_anuncio" class="form-control">
 						 	@foreach ($anuncios as $anun)<!--se recorre la tabla anuncios-->
			              		@if (strcmp($mensaje->id_anuncio, $anun->idanuncio) === 0)<!--se encuentra el mensaje con el anuncio-->
			              			<option value="{{$anun->idanuncio}}">{{ $anun->titulo}}</option>
			              		@endif
			            	@endforeach 				          
    				</select>
    			<label for="id_usuario_envia">De</label>
 					<select name="id_usuario_envia" class="form-control">
				              <option value="{{Auth::user()->id}}">{{ Auth::user()->name}}</option>
    				</select>
    			<label for="id_usuario_envia">Para</label>
 					<select name="id_usuario_recibe" class="form-control">
 						@foreach ($usuarios as $users)
			              @if (strcmp($mensaje->id_usuario_envia, $users->id) === 0)
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
					<button class="btn btn-primary" type="submit">Enviar Mensaje</button>
			{!!Form::close()!!}	
			<a href="{{url('almacen/anuncio')}}" class="btn btn-danger" type="button">Cancelar</a>	
              		</div>	
            </div>
    	</div>		
  </div>
@endsection