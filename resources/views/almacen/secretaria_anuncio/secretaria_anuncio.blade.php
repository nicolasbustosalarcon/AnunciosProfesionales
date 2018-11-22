@extends ('layouts.secretaria')
@section ('contenido')
<!-- ***********ANUNCIOS**************** --> 

<div class="row">
    <div class="col-lg-12">
    <h2 style="text-align:center;">Anuncios</h2>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Palabra a censurar</div>
  <div class="panel-body">
    <div class="search row">
      <div class="col-xs-12">
        <span>Escribir una palabra:</span>
        <input type="text" name="item" class="form-control input-sm" placeholder="Palabra...">
      </div>
    </div>
  </div>
</div>


<div class="panel panel-default">
    <div class="panel-body context">
        <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Region</th>
                    <th>Estado</th>
                    <th>Publicista</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Tipo de Anuncio</th>

                </thead>
               @foreach ($anuncios as $anun)
                <tr>
                    <td>{{ $anun->idanuncio}}</td>
                    <td>{{ $anun->titulo}}</td>
                    <td>{{ $anun->region}}</td>
                    <td>{{ $anun->estado}}</td>
                    <td>{{ $anun->usuario}}</td>
                    <td>{{ $anun->categoria}}</td>
                    <td>{{ $anun->descripcion}}</td>
                    <td>
                        <img src="{{asset('imagenes/anuncios/'.$anun->imagen)}}" alt="{ $anun->titulo}" height="100px" width="100px" class="img-thumbnail"> 
                    </td>
                    <td>{{ $anun->precio}}</td>
                    <td>{{ $anun->tipo_anuncio}}</td>
                    <td>
                        <a href="" data-target="#modal-delete-{{$anun->idanuncio}}" data-toggle="modal"><button class="btn btn-success">Publicar Anuncio</button></a>
                    </td>
                    <td>
                        <a href="{{URL::action('Secretaria\AnuncioController2@edit',$anun->idanuncio)}}"><button class="btn btn-danger">Rechazar Anuncio</button></a>
                    </td>
                    
                </tr>
                @include('almacen.secretaria.modal')

                @endforeach
            </table>
        
        </div>
        {{$anuncios->render()}}
</div>

@endsection