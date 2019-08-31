<?php 
//funcion para actualizar cuenta socio  modal
function verificarDatSocio(){  ?>


 <form id="guardarCredenciales">
 
<div class="modal fade  success modal-success" id="credenciales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Por favor, Ingrese una nueva firma digital!</h4>
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
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
</div>
 

</form>  







<?php  } 
function error(){
?>

      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">403</h1>
              <h2>Access denied</h2>
              <p>Full authentication is required to access this resource. <a href="#">Report this?</a>
              </p>
            
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>






<?php } ?>