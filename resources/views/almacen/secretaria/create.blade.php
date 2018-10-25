@extends ('layouts.secretaria')
@section ('contenido')
	 <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="region">Generar Reporte por Región</label>
            		<select name="region" class="form-control">    
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
            <div class="form-group">
              <a href="reporte"><button class="btn btn-success" type="submit">Generar Reporte</button></a>
            </div>
            </div>	
    	</div>
    </div>

    <div class="row">
      <div class="form-group">
            	<a href="{{url('../almacen/secretaria')}}" class="btn btn-danger" type="button">Volver</a>
        	</div>
        </div>                   
      </div>
  </div>
			{!!Form::close()!!}		
            
		
@endsection