@extends ('layouts.secretaria')
@section ('contenido')

<!-- ***********REPORTE GENERAL DE REGIONES**************** --> 

<div class="container border justify-content-start" style="height: 10px;" >
    {!!Form::open(array('url'=>'almacen/graficos/pdf','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
        <h3 class="display-4">Reporte General de Regiones</h3>
        <div class="form-group" style="width: 50%;">
            <label for="">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" max="<?php echo date('Y-m-d');?>">
        </div>
        <div class="form-group" style="width: 50%;">
            <label for="">Fecha Final</label>
            <input type="date" name="fecha_fin"  class="form-control" max="<?php echo date('Y-m-d');?>">
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group" style="width: 50%;">
                <button class="btn btn-primary" type="submit">Generar Reporte</button>
            </div>
        </div> 
    </div>
    {!!Form::close()!!} 


    <!-- ***********REPORTE GENERAL DE CATEGORIAS**************** -->
    {!!Form::open(array('url'=>'almacen/graficos/categoriasgeneral','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
        <h3 class="display-4">Reporte General de Categorias</h3>
        <div class="form-group" style="width: 50%;">
            <label for="">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" max="<?php echo date('Y-m-d');?>">
        </div>
        <div class="form-group" style="width: 50%;">
            <label for="">Fecha Final</label>
            <input type="date" name="fecha_fin"  class="form-control" max="<?php echo date('Y-m-d');?>">
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group" style="width: 50%;">
                <button class="btn btn-primary" type="submit">Generar Reporte</button>
            </div>
        </div> 
    </div>
    {!!Form::close()!!} 


    <!-- ***********REPORTE GENERAL DE USUARIOS**************** -->

    {!!Form::open(array('url'=>'almacen/graficos/informeusuarios','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
        <h3 class="display-3">Reporte de Usuarios</h3>
        <div class="form-group" style="width: 50%;">
            <label for="">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" max="<?php echo date('Y-m-d');?>">
        </div>
        <div class="form-group" style="width: 50%;">
            <label for="">Fecha Final</label>
            <input type="date" name="fecha_fin"  class="form-control" max="<?php echo date('Y-m-d');?>">
        </div> 
        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group" style="width: 50%;">
                <button class="btn btn-primary " type="submit">Generar Reporte</button>
            </div>
        </div> 
    </div>
    {!!Form::close()!!}
</div>

    <!-- ***********REPORTES POR REGION**************** -->

    <div class = "container justify-content-center" style="height: 10px;">
    {!!Form::open(array('url'=>'almacen/graficos/maule','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
        <h3 class="display-4">Región</h3>
        <div class="form-group" style="width: 50%;">
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
    </div>
    {!!Form::close()!!}
    <!-- ***********REPORTES POR CATEGORIA**************** --> 
    {!!Form::open(array('url'=>'almacen/graficos/categorias','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
            <h3 class="display-4">Categoría</h3>
            <div style="width: 50%;">
                <select name="categoria" class="form-control">
                    @foreach ($categorias as $cat)
                    <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group" style="width: 50%;">
                <button class="btn btn-primary" type="submit">Generar Reporte</button>
            </div>
        </div> 
    </div>
    {!!Form::close()!!}
    </div>


@endsection