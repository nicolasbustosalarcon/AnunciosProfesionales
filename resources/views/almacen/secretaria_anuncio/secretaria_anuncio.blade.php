@extends ('layouts.secretaria')
@section ('contenido')
<!-- ***********ANUNCIOS**************** --> 

<div class="row">
    <div class="col-lg-12">
     <h2 style="text-align:center;">Anuncios </h2>
    </div>
</div>

 
<?php
$censura = json_encode($palabras_censura);
$contador = 0;
?>
<script type="text/javascript">
    var censura = eval(<?php echo $censura; ?>);
    //for (i = 0; i<= censura.length;i++) {
      //  document.write("Palabra:" +censura[i].palabra_censurada+ "<br/>");
    //}

</script>
 <!-- ***********REPORTE GENERAL DE CATEGORIAS****************  <input type="text" name="censurar"  value="{{$palabras_censura[0]->palabra_censurada}}"> -->


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
                    <?php
                    $contador = 0;
                    ?>
                    <td>{{ $anun->idanuncio}}</td>
                    @foreach ($palabras_censura as $ps)
                    @if($contador == 0)
                    <?php
                    $posicion_coincidencia = stripos($anun->titulo, $ps->palabra_censurada);
                    ?>
                    @if($posicion_coincidencia !== false)
                    <td class="danger">{{ $anun->titulo}} </td>
                    <?php
                    $contador = 1;
                    ?>
                    @endif
                    @endif
                    @endforeach
                    @if($contador == 0)
                    <td>{{ $anun->titulo}}</td>
                    @endif
                    <td>{{ $anun->region}}</td>
                    <td>{{ $anun->estado}}</td>
                    <td>{{ $anun->usuario}}</td>
                    <td>{{ $anun->categoria}}</td>
                    <?php
                    $contador = 0;
                    ?>
                    @foreach ($palabras_censura as $ps)
                    @if($contador == 0)
                    <?php
                    $posicion_coincidencia = stripos($anun->descripcion, $ps->palabra_censurada);
                    ?>
                    @if($posicion_coincidencia !== false)
                    <td class = "danger"> {{ $anun->descripcion}} </td>
                    <?php
                    $contador = 1;
                    ?>
                    @endif
                    @endif
                    @endforeach
                    @if($contador == 0)
                    <td>{{ $anun->descripcion}}</td>
                    @endif
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