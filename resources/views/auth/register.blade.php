@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion_region') ? ' has-error' : '' }}">
                            <label for="direccion_region" class="col-md-4 control-label">Region</label>

                             <div class="col-md-6">
                                <select name="direccion_region" class="form-control" value="{{ old('direccion_region') }}">    
                                    <option value="Region Metropolitana" selected="selected">Region Metropolitana</option>
                                    <option value="XV Arica y Parinacota"  selected="selected">XV Arica y Parinacota</option>
                                    <option value="I Tarapaca"  selected="selected">I Tarapacá</option>
                                    <option value="II Antofagasta"  selected="selected">II Antofagasta</option>
                                    <option value="III Atacama"  selected="selected">III Atacama</option>
                                    <option value="IV Coquimbo"  selected="selected">IV Coquimbo</option>
                                    <option value="V Valparaiso"  selected="selected">V Valparaiso</option>
                                    <option value="VI O'Higgins"  selected="selected">VI O'Higgins</option>
                                    <option value="VII Maule"  selected="selected">VII Maule </option>
                                    <option value="VIII BioBio"  selected="selected">VII BioBio</option>
                                    <option value="IX La Araucania"  selected="selected">IX La Araucania</option>
                                    <option value="XIV Los Ríos"  selected="selected">XIV Los Ríos</option>
                                    <option value="X Los Lagos"  selected="selected">X Los Lagos</option>
                                    <option value="XI Aysén"  selected="selected">XI Aysén</option>
                                    <option value="XII Magallanes y Antártica"  selected="selected">XII Magallanes y Antártica</option>
                                </select>   

                                @if ($errors->has('direccion_region'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion_region') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            
                        </div>

                        <!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="region">Region</label>
                                <select name="direccion_region" class="form-control" value="{{ old('direccion_region') }}">    
                                    <option value="Region Metropolitana" selected="selected">Region Metropolitana</option>
                                    <option value="XV Arica y Parinacota"  selected="selected">XV Arica y Parinacota</option>
                                    <option value="I Tarapaca"  selected="selected">I Tarapacá</option>
                                    <option value="II Antofagasta"  selected="selected">II Antofagasta</option>
                                    <option value="III Atacama"  selected="selected">III Atacama</option>
                                    <option value="IV Coquimbo"  selected="selected">IV Coquimbo</option>
                                    <option value="V Valparaiso"  selected="selected">V Valparaiso</option>
                                    <option value="VI O'Higgins"  selected="selected">VI O'Higgins</option>
                                    <option value="VII Maule"  selected="selected">VII Maule </option>
                                    <option value="VIII BioBio"  selected="selected">VII BioBio</option>
                                    <option value="IX La Araucania"  selected="selected">IX La Araucania</option>
                                    <option value="XIV Los Ríos"  selected="selected">XIV Los Ríos</option>
                                    <option value="X Los Lagos"  selected="selected">X Los Lagos</option>
                                    <option value="XI Aysén"  selected="selected">XI Aysén</option>
                                    <option value="XII Magallanes y Antártica"  selected="selected">XII Magallanes y Antártica</option>
                                </select>   
                            </div>
                        </div>  -->


                        <div class="form-group{{ $errors->has('direccion_cuidad') ? ' has-error' : '' }}">
                            <label for="direccion_cuidad" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <input id="direccion_cuidad" type="text" class="form-control" name="direccion_cuidad" value="{{ old('direccion_cuidad') }}">

                                @if ($errors->has('direccion_cuidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion_cuidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('edad') ? ' has-error' : '' }}">
                            <label for="edad" class="col-md-4 control-label">Edad</label>

                            <div class="col-md-6">
                                <input id="edad" type="text" class="form-control" name="edad" value="{{ old('edad') }}">

                                @if ($errors->has('edad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
