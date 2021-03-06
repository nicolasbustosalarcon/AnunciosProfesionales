@extends ('layouts.usuario')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
  <div class="row">
      <div class="col-xs-12 col-sm-8">
                <div class="item">
                  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                  <div class="bs-example">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <!--
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li> -->
                        </ol>   
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item active">
                               @if ($anuncio->imagen != '')
                               <figure class="full-width post-img">
                                <img src="{{asset('imagenes/anuncios/'.$anuncio->imagen)}}" alt="First Slide" height="280x" width="360px" class="img-rounded">
                              </figure>
                                @endif
                            </div>
                             @if ($anuncio->imagen2 != '')
                            <div class="item">
                              <figure class="full-width post-img">
                              <img src="{{asset('imagenes/anuncios/'.$anuncio->imagen2)}}" alt="Second Slide" height="280x" width="360px" class="img-rounded">
                            </figure>
                            </div>
                             @endif
                             @if ($anuncio->imagen3 != '')
                            <div class="item">
                              <figure class="full-width post-img">
                              <img src="{{asset('imagenes/anuncios/'.$anuncio->imagen3)}}" alt="Third Slide" height="280x" width="360px" class="img-rounded">
                            </figure>
                            </div>
                            @endif
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
                  <div class="full-width" style="padding:10px; background-color: #F5F5F5; margin: 7px 0;">
                    <p class="lead text-left"><strong>Descripción </strong></p>
                    <p>{{$anuncio->descripcion}}</p>
                  </div>
                </div>
                <ul class="list-unstyled fullwidth text-left footer-social social-post">
                  <li>

                  <div class="full-width" style="padding:10px; background-color: #F5F5F5; margin: 7px 0;">
                    <p class="lead text-left"><strong>Popularidad </strong></p>
                    <a href="{{URL::action('Usuario\AnuncioController@show',[$anuncio->idanuncio,1])}}"><button class="btn btn-success"> 👍 Me Gusta</button></a>
                    <a href="{{URL::action('Usuario\AnuncioController@show',[$anuncio->idanuncio,2])}}"><button class="btn btn-warning"> 👎 No Me Gusta</button></a>
                    <div>
                      <p target="_blank">Me Gusta : {{ $cantidad_mg[0]->mg}}
                    </div>
                    <div>
                      <p target="_blank">No Me Gusta : {{ $cantidad_no_mg[0]->no_mg}}
                    </div>
      
                  </li>
                </ul>
              <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">  
                <a href="/almacen/anuncio"><button class='btn btn-danger'>Volver</button></a>
              </div>
      </div>
      <div class="col-xs-12 col-sm-4">
          <div class="full-width" style="padding:10px; background-color: #F5F5F5; margin: 7px 0;">
            <p class="lead text-center"><strong>{{$anuncio->titulo}}</strong></p>
            <p class="lead text-center" style="color: #F09000;"><strong>${{$anuncio->precio}}</strong></p>
          <div class="full-width post-user-info">
            <i class="fa fa-user NavBar-Nav-icon" aria-hidden="true"></i>
            <div>
              <p class="lead text-center">@foreach ($usuarios as $users)<!--se recorre la tabla de usuarios y anuncios-->
              @if (strcmp($anuncio->idusuario, $users->id) === 0)<!--se encuentra el usuario que publico el anuncio-->
              {{ $users->name}}
              @endif
              @endforeach</p>
              <p class="lead text-center"><i class="fa fa-mobile" aria-hidden="true"></i> 
              @foreach ($usuarios as $users)
              @if (strcmp($anuncio->idusuario, $users->id) === 0)
              {{ $users->telefono}}
              @endif
              @endforeach

            </p>
            </div>
          </div>
      <div class="clearfix"></div>
          <a href="{{URL::action('Usuario\MensajeController@show',[$anuncio->idanuncio])}}" class="btn btn-success btn-block">ENVIAR MENSAJE</a>
          <p class="lead text-center" style="margin: 7px 0; background-color: #F5F5F5;">
            <i class="fa fa-map-marker lead text-center">@foreach ($nombre_region as $nombre)
            @if (strcmp($anuncio->region, $nombre->idregion) === 0)
            {{ $nombre->nombre_region}}
            @endif
            @endforeach</i>
    </div>
    <ul class="list-unstyled fullwidth text-center footer-social social-post">
        <li>
          <div class="full-width" style="padding:10px; background-color: #F5F5F5; margin: 7px 0;">
            <p class="lead text-center"><strong>Redes Sociales </strong></p>
          @foreach ($redes_sociales as $redes)<!--se recorre la tabla de redes y anuncios-->
          @if (strcmp($anuncio->idanuncio, $redes->id_anuncio) === 0)<!--se encuentran las redes sociales de los anuncios-->
          @foreach ($nombre_red as $nom)<!--se recorren todas las redes que hay-->
          @if (strcmp($nom->idred_social, $redes->id_redsocial) === 0)<!--se encuentra el nombre de las redes-->
          <div><a target="_blank">{{$nom->nombre_red}} : {{ $redes->red_social}}</div><!--se muestra el nombre de la red social y el link-->
          @endif
          @endforeach
          @endif
          @endforeach
        </li>
    </ul>
</div>

@endsection