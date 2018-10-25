@extends ('layouts.usuario')
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
      {!!Form::model($anuncio,['method'=>'PATCH','route'=>['almacen.anuncio.update',$anuncio->idanuncio],'files'=>'true'])!!}
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
              <input type="text" name="precio" required value="{{$anuncio->precio}}" class="form-control">
            </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label>Tipo de Anuncio</label>
            <select name="tipo_anuncio" class="form-control">
              @foreach ($tipo_anuncio as $ta)
                <option value="{{$ta->idtipo_anuncios}}">{{$ta->nombre_tipo}}</option>
              @endforeach
            </select>
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
                <img height="100px" width="100px"src="{{asset('imagenes/anuncios/'.$anuncio->imagen)}}">
              @endif
            </div>
      </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       <p class="alert alert-warning alert-dismissable">
        <button typo="button" class="close" data-dismiss="alert">&times;</button>Al editar un anuncio, el proceso de validación volverá a realizarse. Lo que provocará que el anuncio tenga que volver a ser Aceptado.</p>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">  
      <button class="btn btn-primary" type="submit">Aceptar {!!Form::close()!!} </button>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">  
      <a href="../../anuncio"><button class='btn btn-danger'>Volver</button></a>
    </div>
@endsection