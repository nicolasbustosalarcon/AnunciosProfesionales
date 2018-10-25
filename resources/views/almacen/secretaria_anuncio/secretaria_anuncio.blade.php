@extends ('layouts.secretaria')
@section ('contenido')
<!-- ***********ANUNCIOS**************** --> 

<div class="row">
    <div class="col-lg-12">
    <h2 style="text-align:center;">Anuncios</h2>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
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

</div>

@endsection