
<?php session_start();
require_once '../connections/conexion.php';   
$sesionSocio = $_SESSION['userSession'];

	# conectare la base de datos 
    if(!$conexionBD){
        die("imposible conectarse: ".mysqli_error($conexionBD));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
        
     ?>
         
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                         Información
                                      </a>
                                  </li>
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Correo
                                      </a>
                                  </li>
                                   <li>
                                      <a data-toggle="tab" href="#tel">
                                          <i class="icon-phone"></i>
                                          Teléfono
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Direccioón
                                      </a>
                                  </li>
                                   <li class="">
                                      <a data-toggle="tab" href="#datas">
                                          <i class="icon-envelope"></i>
                                          Datos del socio
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity">                                          
                                   
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                            <section class="panel well">
                                  <div class="panel-body bio-graph-info">
      
		 
			<?php
            
           $query = $conexionBD->query("SELECT * FROM socio WHERE idSocio= '$sesionSocio' ");
            while($row = mysqli_fetch_array($query)){  ?>
               
                <div class="form-group success">
                                    <label class="col-xs-2 control-label">Denominación:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['denominacion'];?></label>
                </div>
                                       <!--termin denominaicon --> 
                 <div class="form-group success">       
                                    <label class="col-xs-2 control-label">Nombre:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['nombreSocio'];?> </label>
                </div>
                                       <!--termin apellido paterno--> 
             <div class="form-group success">                             
                                    <label class="col-xs-2 control-label">Apellidos:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['apellidoPaternoSocio'];?> <?php echo $row['apellidoMaternoSocio'];?></label>
                </div>
                                       <!--termin apellido paterno materno --> 
              <div class="form-group success">                                  
                                    <label class="col-xs-2 control-label">Alias:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['alias'];?></label>
                </div>                    
                                       <!--termin alias -->  
                    <div class="form-group success">                                  
                                    <label class="col-xs-2 control-label">RFC:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['rfc'];?></label>
                </div>                    
                                       <!--termina rfc-->                         
                   <div class="form-group success">                             
                                    <label class="col-xs-2 control-label">Observaciones:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['observaciones'];?></label>
                </div>               
                               <!--termin observacones -->   
                  <div class="form-group success">                      
                                    <label class="col-xs-2 control-label">Fecha de registro:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['fechaDeRegistro'];?></label>
                                   
                </div>               <!--termin fecha --> 
 
                  <div class="form-group success">			 						
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dataUpdateSocio" data-id="<?php echo $row['idSocio']?>" data-denominacion="<?php echo $row['denominacion']?>" data-nombre="<?php echo $row['nombreSocio']?>" data-apepaterno="<?php echo $row['apellidoPaternoSocio']?>" data-apematerno="<?php echo $row['apellidoMaternoSocio']?>" data-alias="<?php echo $row['alias']?>" data-rfc="<?php echo $row['rfc']?>" data-observacion="<?php echo $row['observaciones']?>" title="Modificar datos personales"><i class='icon_cogs'></i></button>			 						
				       
                </div>
				<?php } ?>
	  
                                                     
                                </div>
                            </section>
                             </div>
                             </div>

                              </div>
                             </div>
                                  <!-- correo del socio -->
                                  <div id="profile" class="tab-pane">
                                    <section class="panel well">
                                  <div class="panel-body bio-graph-info">
                                  
                                  
                                         
			 
                              <?php 
           $query = $conexionBD->query("SELECT * FROM socio_correo WHERE idSocio= '$sesionSocio' ");
            while($row = mysqli_fetch_array($query)){  ?>
            <div class="form-group success">                             
                        <label class="col-xs-2 control-label">Tipo correo:</label>
                        <label class="col-xs-10 control-label"><?php echo $row['tipoCorreo'];?></label>
                </div>               
                               <!--termin observacones -->   
                   <div class="form-group success">                      
                       <label class="col-xs-2 control-label">correo Electronico:</label>
                       <label class="col-xs-2 control-label"><?php echo $row['correoElectronico'];?></label>
                        
                                                                  
                    </div>               <!--termin fecha --> 
                         
                          <div class="form-group success">                      
                                                
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dataUpdateSEmail" data-id="<?php echo $row['idSocioCorreo']?>" data-tipo="<?php echo $row['tipoCorreo']?>" data-correo="<?php echo $row['correoElectronico']?>" title="Modificar Correo">modificar</button>
                                 
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDeleteC" data-id="<?php echo $row['idSocioCorreo']?>" data-correo="<?php echo $row['correoElectronico']?>" title="Excluir Correo"  >eliminar</button>
                                                                  
                    </div>   
                                
                 
                           
                            <?php } ?>    
                        
                         
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#dataRegisterCorreo" title="Agregar correo"><i class='glyphicon glyphicon-plus'></i></button>
                          
                        
                                     
                            </div>
                            </section>
                                  
                                  </div>
                                  
                                <!-- telefono del socio -->
                                  <div id="tel" class="tab-pane">
                                    <section class="panel well">
                                  <div class="panel-body bio-graph-info">
              
                          
            <?php   
              $quer = $conexionBD->query("SELECT * FROM socio_telefono WHERE idSocio= '$sesionSocio' ");
                                while($row = mysqli_fetch_array($quer) ){ ?> 
                <div class="form-group success">                             
                        <label class="col-xs-2 control-label">Ubicación:</label>
                        <label class="col-xs-10 control-label"><?php echo $row['ubicacion'];?></label>
                </div>               
                               <!--termin observacones -->   
                   <div class="form-group success">                      
                       <label class="col-xs-2 control-label">Teléfono:</label>
                       <label class="col-xs-2 control-label"><?php echo $row['telefono'];?></label>
                        
                                                                  
                    </div>               <!--termin fecha --> 
                         
                          <div class="form-group success">                      
                                                
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dataUpdatePhone" data-id="<?php echo $row['idSocioTelefono']?>" data-tipot="<?php echo $row['ubicacion']?>" data-telef="<?php echo $row['telefono']?>" title="Modificar teléfono">modificar</button>
                                  
                     <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDeleteT" data-id="<?php echo $row['idSocioTelefono']?>" data-telefono="<?php echo $row['telefono']?>" title="Excluir Teléfono"  >eliminar</button>
                                  
                                                                  
                    </div>   
                             
                            
                                     <?php  } ?> 
                    <button type="button" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#dataRegisterTel" title="Agregar teléfono" ><i class='glyphicon glyphicon-plus'></i></button>
                          
                                  
                      
                    </div>  
                    
                                   
                                     
                                    </section>
                                  
                                  </div>
                        
                                  <!-- direcion del socio-->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel well">                                          
                                          <div class="panel-body bio-graph-info">
                                                         
            
                            <?php 
           $query = $conexionBD->query("SELECT * FROM socio_direccion WHERE idSocio= '$sesionSocio' ");
            while($row = mysqli_fetch_array($query)){  ?>
                    <div class="form-group success">
                                    <label class="col-xs-2 control-label">País:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['pais'];?></label>
                </div>
                                       <!--termin pais --> 
                    <div class="form-group success">       
                                    <label class="col-xs-2 control-label">Estado:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['estado'];?> </label>
                </div>
                                       <!--termin estado--> 
                    <div class="form-group success">                             
                                    <label class="col-xs-2 control-label">Delegación:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['delegacion'];?></label>
                </div>
                                       <!--termin delegacion --> 
                    <div class="form-group success">                                  
                                    <label class="col-xs-2 control-label">Colonia:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['colonia'];?></label>
                </div>                    
                                       <!--termin colonia -->  
                             
                    <div class="form-group success">                                  
                                    <label class="col-xs-2 control-label">Número interior:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['numeroInterior'];?></label>
                </div> <!--numero interior -->
                
                    <div class="form-group success">                                  
                                    <label class="col-xs-2 control-label">Número exterior:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['numeroExterior'];?></label>
                </div>    <!--numero exterior -->     
                    <div class="form-group success">                                  
                                    <label class="col-xs-2 control-label">Calle:</label>
                                    <label class="col-xs-10 control-label"><?php echo $row['calle'];?></label>
                </div>    <!--numero exterior -->     
                
                    <div class="form-group success"> 
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dataUpdateDir" data-id="<?php echo $row['idSocio']?>" data-estado="<?php echo $row['estado']?>" data-deleg="<?php echo $row['delegacion']?>" data-colonia="<?php echo $row['colonia']?>" data-numi="<?php echo $row['numeroInterior']?>" data-nume="<?php echo $row['numeroExterior']?>" data-calle="<?php echo $row['calle']?>" title="Modificar dirección" > <i class='icon_cogs'></i></button>
                                
                               </div>
                                    <?php } ?>       
                      
              
                     
                                              
                                          </div>
                                      </section>
                                  </div>
                                  
                                  
                                  <!-- datos del socio -->
                                  <div id="datas" class="tab-pane">
                                    <section class="panel well">
                                  <div class="panel-body bio-graph-info">
                                  
                                <?php include '../funciones/datosSocio/modificar_credenciales.php'; ?>  
                      <form action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data" id="empresaEmail" name="empresaEmail">
                        <div id="respue"></div> 
                        <!--inicia inputs-->  
                        <div class="row well">
                               
                               <div class="form-group success">       
                                    <label class="control-label">Contraseña</label>
                                    <input type="password"  required name="tipo" id="tipo" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php  ?>" />
                                   <input type="hidden" name="idEmpresa" value="<?php ?>"> 
                              
                                </div> 
                                 <div class="form-group success">       
                                    <label class="control-label">Repetir contraseña</label>
                                    <input type="password"  required name="correo" id="correo" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php  ?>" />
                              
                                 </div>
                                <div class="form-group success">       
                                    <label class="control-label">Firma digital</label>
                                    <input type="password"  required name="tipo" id="tipo" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php  ?>" />
                                </div> 
                                                

                        </div>  
 
                          <div class="f1-buttons">
                            <button type="button" name="btnActualizarPass" id="btnActualizarPass" class="btn btn-success">actualizar</button>  
   
                           </div> 
                          
                           </form>
                        
                                     
                            </div>
                            </section>
                                  
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
     
 
 <?php }  ?>