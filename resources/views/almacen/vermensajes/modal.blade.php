<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$men->idmensaje}}">
	{{Form::Open(array('action'=>array('Usuario\VerMensajesController@destroy',$men->idmensaje),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar el Mensaje</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Mensaje</p>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			       <p class="alert alert-warning alert-dismissable">						       
			       		<button typo="button" class="close" data-dismiss="alert">&times;</button>PD: El mensaje que eliminará no lo verá el dueño del anuncio</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
