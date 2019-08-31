<?php
//funcion para agregar empleado modal
function guardarEmpleado(){ ?>
<form id="guardarDatos">
<div class="modal fade  success" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar empleado</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
           <div class="form-group">
            <label for="nombre0" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre0" name="nombre" required maxlength="20">
		  </div>
          <div class="form-group">
            <label for="apellidoPo0" class="control-label">Apellido paterno:</label>
            <input type="text" class="form-control" id="apellidoP0" name="apellidoP" required maxlength="20">
		  </div>
		  <div class="form-group">
            <label for="apellidoM0" class="control-label">Apellido materno:</label>
            <input type="text" class="form-control" id="apellidoM0" name="apellidoM" required maxlength="20">
          </div>
		  <div class="form-group">
            <label for="user0" class="control-label">user:</label>
            <input type="text" class="form-control" id="user0" name="user" required maxlength="10">
          </div>
		  <div class="form-group">
            <label for="password0" class="control-label">Contraseña:</label>
            <input type="password" class="form-control" id="password0" name="password" required maxlength="30"> 
          </div>
          <div class="form-group">
            <label for="compPssword0" class="control-label">Comprobar Contraseña:</label>
            <input type="password" class="form-control" id="compPass0" name="compPass" required maxlength="30"> 
          </div>
		 
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>


<?php }
//funcion para eliminar empleado modal
function eliminarEmpleado(){
?>
<form id="eliminarDatos">
<div class="modal fade success" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <input type="hidden" id="id_empleado" name="id_empleado">
      <h2 class="text-center text-muted success">Estas seguro?</h2>
	  <p class="lead text-muted text-center success" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. Deseas continuar?</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } 
//funcion para actualizar empleado modal
function actualizarEmpleado(){  ?>

<form id="actualidarDatos">
<div class="modal fade success" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Empleado:</h4>
      </div>
      <div class="modal-body">
        <div id="datos_ajax"></div>
          <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="20">
            <input type="hidden" class="form-control" id="id" name="id"> 
          </div>
		  <div class="form-group">
            <label for="apellidoP" class="control-label">Apellido paterno:</label>
            <input type="text" class="form-control" id="apellidoP" name="apellidoP" required maxlength="20">
          </div>
		  <div class="form-group">
            <label for="apellidoM" class="control-label">Apellido materno:</label>
            <input type="text" class="form-control" id="apellidoM" name="apellidoM" required maxlength="20">
          </div>
	 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>


