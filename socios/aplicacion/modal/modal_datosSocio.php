<?php 
//funcion para actualizar cuenta socio  modal
function actualizarSocio(){  ?>

<form id="actualidarDatosSocio">
<div class="modal fade success" id="dataUpdateSocio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Cuenta del Socio:</h4>
      </div>
      <div class="modal-body">
        <div id="datos_ajax"></div>
          <div class="form-group">
            <label for="denominacion" class="control-label">Denominación:</label>
            <input type="text" class="form-control" id="denominacion" name="denominacion" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
            <input type="hidden" class="form-control" id="id" name="id"> 
          </div>
           <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
		  <div class="form-group">
            <label for="paterno" class="control-label">Apellido paterno:</label>
            <input type="text" class="form-control" id="paterno" name="paterno" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
		  <div class="form-group">
            <label for="materno" class="control-label">Apellido materno:</label>
            <input type="text" class="form-control" id="materno" name="materno" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
           <div class="form-group">
            <label for="alias" class="control-label">Alias:</label>
            <input type="text" class="form-control" id="alias" name="alias" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
           <div class="form-group">
            <label for="rfc" class="control-label">RFC:</label>
            <input type="text" class="form-control" id="rfc" name="rfc" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
	       <div class="form-group">
            <label for="observacion" class="control-label">Observación:</label>
            <textarea type="text" class="form-control" id="observacion" name="observacion" required  onkeyup="javascript:this.value=this.value.toUpperCase();" >  
            </textarea>
           
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


<?php 
//funcion para actualizar cuenta socio  modal
function actualizarCorreoSocio(){  ?>

<form id="actualidarDatosEmail">
<div class="modal fade success" id="dataUpdateSEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar correo:</h4>
      </div>
      <div class="modal-body">
        <div id="datos_ajaxE"></div>
          <div class="form-group">
            <label for="tipoc" class="control-label">Tipo Correo:</label>
             <select class="form-control" name="tipoc" id="tipoc" required>
                                            <option value="Personal">Personal</option>
                                            <option value="Empresa">Empresa</option>
                                            <option value="Otro">Otro</option>
                                        </select>
       
            <input type="hidden" class="form-control" id="id" name="id"> 
          </div>
           <div class="form-group">
            <label for="email" class="control-label">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required maxlength="20">
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

<?php }  

//funcion para actualizar cuenta socio  modal
function actualizarTelefonoSocio(){  ?>

<form id="actualidarDatosPhone">
<div class="modal fade success" id="dataUpdatePhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Teléfono:</h4>
      </div>
      <div class="modal-body">
        <div id="datos_ajaxT"></div>
          <div class="form-group">
            <label for="tipot" class="control-label">Tipo Teléfono:</label>
             <select class="form-control" name="tipot" id="tipot" required>
                                            <option value="Personal">Personal</option>
                                            <option value="Empleo">Empleo</option> 
                                        </select>
       
            <input type="hidden" class="form-control" id="id" name="id"> 
          </div>
           <div class="form-group">
            <label for="telefono" class="control-label">Teléfono:</label>
            <input type="text" class="form-control" id="phone" name="phone" required maxlength="12" >
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

<?php }  
//funcion para actualizar cuenta socio  modal
function actualizarSocioDir(){  ?>

<form id="actualidarDatosDir">
<div class="modal fade success" id="dataUpdateDir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modificar Dirección:</h4>
      </div>
      <div class="modal-body">
        <div id="datos_ajaxD"></div>
        
           <div class="form-group">
            <label for="estado" class="control-label">Estado:</label>
          <select name="estado" class="form-control "id="jmr_contacto_estado">
               <option>Selecciona tu estado</option> </select>
                <input type="hidden" class="form-control" id="id" name="id"> 
          </div>
		  <div class="form-group">
            <label for="paterno" class="control-label">Delegación:</label>
            <select name="delegacion" class="form-control" id="jmr_contacto_municipio">
               <option>Selecciona tu delegacion</option> </select>
          </div>
		  <div class="form-group">
            <label for="colonia" class="control-label">Colonia:</label>
            <input type="text" class="form-control" id="colonia" name="colonia" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
           <div class="form-group">
            <label for="numeroi" class="control-label">Número Interior:</label>
            <input type="text" class="form-control" id="numeroi" name="numeroi" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
           <div class="form-group">
            <label for="numeroe" class="control-label">Número Exterior:</label>
            <input type="text" class="form-control" id="numeroe" name="numeroe" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
	       <div class="form-group">
            <label for="calle" class="control-label">Calle:</label>
            <input type="text" class="form-control" id="calle" name="calle" required maxlength="20" onkeyup="javascript:this.value=this.value.toUpperCase();">
           
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

<?php } 
//funcion para agregar correo socio modal
function guardarCorreoSocio(){ ?>
<form id="guardarCorreo">
<div class="modal fade  success" id="dataRegisterCorreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar correo</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_registerCorreo"></div>
           <div class="form-group">
            <label for="nombre0" class="control-label">Tipo correo:</label>
            <select class="form-control" name="tipoc" id="tipoc0" required>
                                            <option value="Personal">Personal</option>
                                            <option value="Empresa">Empresa</option>
                                            <option value="Otro">Otro</option>
                                        </select>
		  </div>
           <div class="form-group">
            <label for="email" class="control-label">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email0" name="email" required maxlength="20">
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
//funcion para agregar correo socio modal
function guardarTelSocio(){ ?>
<form id="guardarTel">
<div class="modal fade  success" id="dataRegisterTel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar correo</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_registerTel"></div>
           <div class="form-group">
            <label for="tipot0" class="control-label">Tipo correo:</label>
             <select class="form-control" name="tipot" id="tipot0" required>
                                            <option value="Personal">Personal</option>
                                            <option value="Empleo">Empleo</option> 
                                        </select>
                                        
            <div class="form-group">
            <label for="telefono" class="control-label">Teléfono:</label>
            <input type="text" class="form-control" id="phone0" name="phone" required maxlength="12" >
          </div>
             
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
//funcion para eliminar correo de socio modal
function eliminarCorreoSocio(){
?>
<form id="eliminarCorreo">
<div class="modal fade success" id="dataDeleteC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
     <div class="modal-body">
      <input type="hidden" id="id_correo" name="id_correo">
         <h2 class="text-center text-muted success modal-title"></h2>
      <h2 class="text-center text-muted success">Estas seguro?</h2>
         <p class="lead text-muted text-center success" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. Deseas continuar?</p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php }  
//eliminar telefono
function eliminarTelSocio(){
?>
<form id="eliminarTel">
<div class="modal fade success" id="dataDeleteT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
     <div class="modal-body">
      <input type="hidden" id="id_telefono" name="id_telefono">
         <h2 class="text-center text-muted success modal-title"></h2>
      <h2 class="text-center text-muted success">Estas seguro?</h2>
         <p class="lead text-muted text-center success" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. Deseas continuar?</p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php } ?>


