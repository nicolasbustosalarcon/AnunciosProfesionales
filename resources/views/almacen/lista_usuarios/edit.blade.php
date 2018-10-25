@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usario: {{ $users->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($users,['method'=>'PATCH','route'=>['almacen.lista_usuarios.update',$users->id]])!!}
            {{Form::token()}}
            <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control"  required value="{{$users->name}}">
            </div>
            <div class="form-group">
                  <label for="region">Region</label>
                  <input type="text" name="region" class="form-control" required value="{{$users->direccion_region}}">
            </div>
            <div class="form-group">
                  <label for="ciudad">Ciudad</label>
                  <input type="text" name="ciudad" class="form-control" required value="{{$users->direccion_cuidad}}">
            </div>
            <div class="form-group">
                  <label for="telefono">Telefono</label>
                  <input type="text" name="telefono" class="form-control" required value="{{$users->telefono}}">
            </div>
            <div class="form-group">
                  <label for="email">Correo</label>
                  <input type="text" name="email" class="form-control" required value="{{$users->email}}">
            </div>
            <div class="form-group">
                  <label for="edad">Edad</label>
                  <input type="numeric" name="edad" class="form-control" required value="{{$users->edad}}">
            </div>
            <div class="form-group">
                  <label for="tipo_usuario">Tipo Usuario</label>
                  <select name="tipo_usuario" class="form-control">
                    <option type="numeric" value="0" selected="selected">Usuario</option>
                                    <option type="numeric" value="1" selected="selected">Secretaria</option>
                                    <option type="numeric" value="2" selected="selected">Administrador</option>
                              </select>   
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required value="{{$users->password}}">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required value="{{$users->password}}">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
            
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  
            </div>

			{!!Form::close()!!}		
            <div><a href="../"><button class="btn btn-danger" type="reset">Cancelar</button></a>
            </div>
		</div>
	</div>
@endsection