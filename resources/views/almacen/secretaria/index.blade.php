@extends ('layouts.secretaria')
@section ('contenido')

<body>
    <div class="col-sm-12">
        <div class="row">
        <!-- ***********REPORTE GENERAL DE CATEGORIAS**************** -->
        {!!Form::open(array('url'=>'almacen/graficos/categoriasgeneral','method'=>'POST','autocomplete'=>'off'))!!}{{Form::token()}}
        <div class="col-sm-4">
          <div class="well">
            <h4>Reporte General de Categorias</h4>
            <p>
                <div class="well" style="width: 100%;">
                    <label for="">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class="well" style="width: 100%;">
                    <label for="">Fecha Final</label>
                    <input type="date" name="fecha_fin"  class="form-control" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 50%;">
                        <button class="btn btn-primary" type="submit">Generar Reporte</button>
                    </div>
                </div>
            </p>  
          </div>
        </div>
        {!!Form::close()!!}
        <!-- ***********REPORTE GENERAL DE REGIONES**************** -->
        {!!Form::open(array('url'=>'almacen/graficos/pdf','method'=>'POST','autocomplete'=>'off'))!!}{{Form::token()}}
        <div class="col-sm-4">
          <div class="well">
            <h4>Reporte General de Regiones</h4>
            <p>
                <div class="well" style="width: 100%;">
                    <label for="">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class="well" style="width: 100%;">
                    <label for="">Fecha Final</label>
                    <input type="date" name="fecha_fin"  class="form-control" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 50%;">
                        <button class="btn btn-primary" type="submit">Generar Reporte</button>
                    </div>
                </div>
            </p>  
          </div>
        </div>
        {!!Form::close()!!}
        <!-- ***********REPORTE GENERAL DE USUARIOS**************** -->
        {!!Form::open(array('url'=>'almacen/graficos/informeusuarios','method'=>'POST','autocomplete'=>'off'))!!}{{Form::token()}}
        <div class="col-sm-4">
          <div class="well">
            <h4>Reporte General de Usuarios</h4>
            <p>
                <div class="well" style="width: 100%;">
                    <label for="">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class="well" style="width: 100%;">
                    <label for="">Fecha Final</label>
                    <input type="date" name="fecha_fin"  class="form-control" max="<?php echo date('Y-m-d');?>">
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 50%;">
                        <button class="btn btn-primary" type="submit">Generar Reporte</button>
                    </div>
                </div>
            </p>  
          </div>
        </div>
        {!!Form::close()!!}
        <!-- ***********REPORTES POR REGION**************** -->
        {!!Form::open(array('url'=>'almacen/graficos/maule','method'=>'POST','autocomplete'=>'off'))!!}{{Form::token()}}
        <div class="col-sm-4">
          <div class="well">
            <h4>Reporte por Región</h4>
            <p>
                <div class="well" style="width: 100%;">
                    <select name="region" class="form-control">
                        @foreach ($regiones as $reg)
                        <option value="{{$reg->idregion}}">{{$reg->nombre_region}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 50%;">
                        <button class="btn btn-primary" type="submit">Generar Reporte</button>
                    </div>
                </div>
            </p>  
          </div>
        </div>
        {!!Form::close()!!}
        <!-- ***********REPORTES POR CATEGORIA**************** -->
        {!!Form::open(array('url'=>'almacen/graficos/categorias','method'=>'POST','autocomplete'=>'off'))!!}{{Form::token()}}
        <div class="col-sm-4">
          <div class="well">
            <h4>Reporte por Categoría</h4>
            <p>
                <div class="well" style="width: 100%;">
                    <select name="categoria" class="form-control">
                        @foreach ($categorias as $cat)
                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 50%;">
                        <button class="btn btn-primary" type="submit">Generar Reporte</button>
                    </div>
                </div>
            </p>  
          </div>
        </div>
        {!!Form::close()!!}
        <div class="col-sm-4">
          <div class="well">
            <h4>Reporte de Palabras</h4>
            <p>
                <div class="well" style="width: 100%;">
                    Sistema de Anuncios Profesionales
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 50%;">
                        <a href="{{URL::action('Graficos\ReportController@informe_palabras_buscadas')}}">
                            <button class='btn btn-primary'>Generar Reporte</button>
                        </a>
                    </div>
                </div>
            </p> 
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h4>Anuncios más Populares</h4>
            <p>
                <div class="well" style="width: 100%;">
                    Sistema de Anuncios Profesionales
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 100%;">
                        <a href="{{URL::action('Graficos\ReportController@anuncios_like')}}" ><button class='btn btn-primary'>Generar Reporte</button></a>
                    </div>
                </div>
            </p> 
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h4>Anuncios menos Populares</h4>
            <p>
                <div class="well" style="width: 100%;">
                    Sistema de Anuncios Profesionales
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group" style="width: 100%;">
                        <a href="{{URL::action('Graficos\ReportController@anuncios_deslike')}}" ><button class='btn btn-primary'>Generar Reporte</button></a>
                    </div>
                </div>
            </p> 
          </div>
        </div>
    </div>
</div>
</body>


@endsection