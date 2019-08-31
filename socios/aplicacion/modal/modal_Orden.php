<?php 
//funcion para eliminar empleado modal
function eliminarImg(){
?>
<form id="eliminarDatos">
<div class="modal fade success" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <input type="hidden" id="id_img" name="id_img">
      <h2 class="text-center text-muted success">Estas seguro?</h2>
	  <p class="lead text-muted text-center success" style="display: block;margin:10px">Se eliminará la imagen. Deseas continuar?</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php }  
//funcion para eliminar empleado modal
function eliminarServicio(){
?>
<form id="eliminarDatosServicio">
<div class="modal fade success" id="dataDeleteServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <input type="hidden" id="id_servicio" name="id_servicio">
      <h2 class="text-center text-muted success">Estas seguro?</h2>
	  <p class="lead text-muted text-center success" style="display: block;margin:10px">Se eliminará el servicio. Deseas continuar?</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } 
//funcion para actualizar cuenta socio  modal
function verificarOrden(){  ?>
<div class="modal fade  success modal-success" id="ordenServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <center>
        <h1 class="modal-title" id="exampleModalLabel">Para continuar</h1>
        </center>
        <h2>Ingrese su firma digital!</h2>
      </div>
    <div class="modal-body"> 
      <div id="datos_ajax_credencial"></div>
      <div class="form-group">
		  <div class="form-group">
            <div class="form-group">
               <label for="firma" class="control-label">Firma:</label>
               <input type="password" class="form-control" id="firma" name="firma" required>
            </div>
		  </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btn_Enviar">Enviar</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php } ?>