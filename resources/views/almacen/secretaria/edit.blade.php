@extends ('layouts.secretaria')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Rechazar Anuncio: {{$anuncio->titulo}}</h3>
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
{!!Form::model($anuncio,['method'=>'PATCH','route'=>['almacen.secretaria.update',$anuncio->idanuncio],'files'=>'true'])!!}{{Form::token()}}
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <select type="text" name="titulo" required value="{{$anuncio->titulo}}" class="form-control">
                <option value="{{$anuncio->titulo}}">{{ $anuncio->titulo}}</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <select type="text" name="descripcion" required value="{{$anuncio->descripcion}}" class="form-control">
                <option value="{{$anuncio->descripcion}}">{{ $anuncio->descripcion}}</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="precio">Precio</label>
            <select type="text" name="precio" required value="{{$anuncio->precio}}" class="form-control">
                <option value="{{$anuncio->precio}}">{{ $anuncio->precio}}</option>
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
            {!!Form::close()!!}
            <a href="../../secretaria">
                <button class='btn btn-danger'>Volver</button>
            </a>
        </div>
    </div>
    </div>
</div>

<div>
    
</div>
		
            
		
@endsection