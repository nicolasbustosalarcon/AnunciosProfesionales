<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Anuncio</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>	

			<?php echo Form::open(array('url'=>'almacen/anuncio','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

            <?php echo e(Form::token()); ?>

    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="titulo">Titulo</label>
            	<input type="text" name="titulo" required value="<?php echo e(old('titulo')); ?>" class="form-control" placeholder="Titulo...">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
    			<label>Categoria</label>
    				<select name="idcategoria" class="form-control">
    					<?php foreach($categorias as $cat): ?>
    						<option value="<?php echo e($cat->idcategoria); ?>"><?php echo e($cat->nombre); ?></option>
    					<?php endforeach; ?>
    				</select>
    		</div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="region">Region</label>
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
            </div>	
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="descripcion">Descripcion</label>
            		<textarea type="text" name="descripcion" required value="<?php echo e(old('descripcion')); ?>" class="form-control" placeholder="Descripcion del Anuncio">
            		</textarea>
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="idusuario">Id Usuario</label>
            	<input type="number" name="idusuario" required value="<?php echo e(old('idusuario')); ?>" class="form-control" placeholder="ID Usuario">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="precio">Precio</label>
            	<input type="number" name="precio" required value="<?php echo e(old('precio')); ?>" class="form-control" placeholder="Ej:100000">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="tipo_anuncio">Tipo de Anuncio</label>
    				<select name="tipo_anuncio" class="form-control">
    					<?php foreach($tipo_anuncios as $tipo): ?>
    						<option value="<?php echo e($tipo->idtipo_cuenta); ?>"><?php echo e($tipo->nombre); ?></option>
    					<?php endforeach; ?>
    				</select>
            </div>
    	</div>


    </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>		
            
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>