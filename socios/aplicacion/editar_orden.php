<?php
session_start(); 

$_SESSION['detalle'] = array();
require_once '../connections/conexion.php';
require_once '../styles/complemento/sitio.php'; 

$sesionSocio = $_SESSION['userSession']; 

if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
} else{
if(isset($_GET['fol'])){ 
    $idFolio=$_GET['fol'];
	$result=$conexionBD->query("SELECT * FROM nota_servicio, nota_servicio_unidad WHERE nota_servicio.idNotaServicio='$idFolio'");
	$row = $result->fetch_array();
    
 $s=$conexionBD->query("SELECT sum(subtotal) as suma FROM concepto WHERE idNotaServicio='$idFolio' ");
  $r=$s->fetch_array(); 
  $newTotal = $r['suma']; 
  $sql="UPDATE nota_servicio SET  totalNota='".$newTotal."' WHERE idNotaServicio='".$idFolio."'";
  $conexionBD->query($sql); 
         

?> 
 
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal"> 
    <title>pagina principal</title> 
    

    <link rel="stylesheet" href="../styles/css/bootstrapValidator.min.css" type="text/css"> 
    <link rel="stylesheet" href="../styles/css/sass-compile.css" type="text/css"> 
    <link rel="stylesheet" href="../styles/css/styleWizard.css" type="text/css">

    <!-- Bootstrap CSS -->    
    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/css/bootstra.min.css"   type="text/css"> 
    <!-- bootstrap theme -->
    <link href="../styles/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="../styles/css/widgets.css" rel="stylesheet">
    <link href="../styles/css/style.css" rel="stylesheet">
    <link href="../styles/css/style-responsive.css" rel="stylesheet" />
    <link href="../styles/css/jquery-ui-1.10.4.min.css" rel="stylesheet">   
    <!--external css-->
    <!-- font icon -->
    <link href="../styles/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../styles/css/font-awesome.min.css" rel="stylesheet" />  
    <!-- Custom styles --> 
    <link href="../styles/css/custom.min.css" rel="stylesheet">        
        <link rel="stylesheet" href="../styles/css/stylefooter.css" type="text/css" media="all"> 
        
       <script src="../styles/js/lightbox/lightbox-plus-jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/js/lightbox/lightbox.min.css">
         <!-- iCheck -->
    <link href="../styles/css/flat/green.css" rel="stylesheet">
    <link href="../styles/js/autcom/jqueryui.css" type="text/css" rel="stylesheet"/> 
    <script type="text/javascript" src="../styles/js/autcom/jquery.min.js"></script>
    <script type="text/javascript" src="../styles/js/autcom/jquery-ui.min.js"></script>
     <!-- Alertity -->
    <link rel="stylesheet" href="../styles/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../styles/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    
     <link href="../styles/css/filecss/fileinput.css" media="all" rel="stylesheet" type="text/css" />
     <link href="../styles/js/filejs/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/> 
     
  <!-- Select2 --> 
  <link rel="stylesheet" href="../styles/js/select2/dist/css/select2.min.css">
   <link href="../styles/js/alerta/main.css" >
    <link rel="stylesheet" href="../styles/js/alerta/sweetalert.css">
    <script src="../styles/js/alerta/functions.js" ></script>
    <script src="../styles/js/alerta/sweetalert.min.js"></script>
    
     
        <script>
	       	$(document).ready(function(){
                
				$( "#placa" ).autocomplete({
      				source: "../funciones/buscadorPlaca.php",
      				minLength: 2
    			});
    			
    			$("#placa").focusout(function(){
    				$.ajax({
    					url:'../funciones/llenarPlaca.php',
    					type:'POST',
    					dataType:'json',
                        data:{ placa:$('#placa').val()}  
    			 
    				}).done(function(respuesta){
                        $("#idUnidad").val(respuesta.idUnidad);
                        $("#idEmpresa").val(respuesta.idEmpresa);
                        $("#idChofer").val(respuesta.idChofer);                        
    					$("#nombre").val(respuesta.nombre); 
                        $("#direccion").val(respuesta.direccion);                        
                        $("#telefono").val(respuesta.telefono);                        
                        $("#marca").val(respuesta.marca);                        
                        $("#modelo").val(respuesta.modelo);                        
                        $("#anio").val(respuesta.anio);                        
                        $("#color").val(respuesta.color);                    
                        $("#motor").val(respuesta.motor);                    
                        $("#serie").val(respuesta.serie);                    
                        $("#km").val(respuesta.km);
                         
                  
    				});
    			});    			    		
			});
        </script>
  </head>

 <body>
        

  <!-- container principio de la seccion -->
  <section id="container"  >
     
       <?php headerSocio(); //menu de la cabecera  ?>
       <?php asideSitio(); //menu vertical izquierda  ?>
       
      <!--inicia main content-->
  <section id="main-content">
  <!--actualizar imagen -->
 <?php include '../funciones/datosServicio/actualizar_img.php';  ?>
  
              <!-- inicio de la clase wrapper llamado de modales -->
      <section class="wrapper">
             <?php include("modal/modal_Orden.php");?> 
  <?php eliminarImg(); 
        eliminarServicio(); ?>     
              <div class="col-lg-12">
                    <div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Folio: <?php echo $idFolio; ?>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Cliente</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">Vehículo</a>
                                </li>
                                <li><a href="#messages-pills" data-toggle="tab">Servicios</a>
                                </li>
                                <li><a href="#settings-pills" data-toggle="tab">Evidencias</a>
                                </li>
                            </ul>

                    <div class="tab-content">
        <!-- -------------------------------------------------------------------------------- -->
                   <!--inicia sobre la placa -->                    
                    <div class="tab-pane fade in active" id="home-pills">
                                    <h4>Datos del cliente y de la unidad movíl</h4>
                                    
                        <form method="POST" action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data" id="validarForm" name="validarF">
                        <div id="respu"></div>
                       <div class="well well-sm">
                        <!--inicia inputs-->
                         <div class="well well-sm">
                        <div class="row"  >
                                <?php 
                                       $cho = $row['idChofer'];
                                       $rChofer=$conexionBD->query("SELECT * FROM chofer, chofer_telefono WHERE chofer.idChofer='$cho' and chofer_telefono.idChofer='$cho' " );
                                       $chof = $rChofer->fetch_array();  
                                ?> 
                                
                                <?php 
                                        $emp = $row['idEmpresa'];
                                        $rEmpresa=$conexionBD->query("SELECT * FROM empresa, empresa_direccion WHERE empresa.idEmpresa='$emp' and empresa_direccion.idEmpresa='$emp' ");
                                        $empre = $rEmpresa->fetch_array();  
                                  ?> 
                                <?php 
                                       $unidad = $row['idUnidadMovil'];
                                       $rUnidad=$conexionBD->query("SELECT * FROM unidad_movil WHERE idUnidadMovil='$unidad'");
                                       $unidadM = $rUnidad->fetch_array();  
                                  ?>
                          <div class="form-group col-md-4">
                           <label class="col-xs-1 control-label">Placa</label>
                            <input type="text"  required name="placa" id="placa" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['placa']; ?>" />
                            
                        <input type="hidden" value="<?php echo $idFolio; ?>" name="idNota"> 
                        <input type="hidden" name="idChofer" value="<?php echo $chof['idChofer']; ?>" >
                        
                        
          
                          </div>

                          <div class="form-group col-md-4">
                            <label class="col-xs-1 control-label">Nombre</label>

                                <input type="text"  required name="nombre" disabled id="nombre" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $chof['nombreChofer'] ?>" />

                          </div>
                             <div class="col-md-4">
                               <label class="col-xs-2 control-label">Teléfono</label>   
                                <input type="text"  required disabled name="telefono" id="telefono" class="form-control" value="<?php echo $chof['telefono'] ?>"/>
                                    
                                </div>
                            <div class="col-md-6"> 
                              <label class="col-xs-2 control-label">Dirección</label>
                              <input type="text"  required disabled name="direccion" id="direccion" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $empre['estado'].', '.$empre['delegacion'].', '.$empre['calle']  ?>"/>

                             </div>
                  
                              </div>
                         </div>
                          
                         <div class="well well-sm">
                        <div class="row" >
                            
                        
                                  <div class="col-md-3">
                               <label class="col-xs-2 control-label">Marca</label>
                                 <input type="text"  required name="marca" id="marca" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['marca']; ?>" disabled/>
                               
                                </div>
                                 
                                  <div class="col-md-3">
                                    <label class="col-xs-2 control-label">Modelo</label>
                                    <input type="text"  required name="modelo" id="modelo" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['modelo']; ?>" disabled />
                                    
                                </div>
                         
                        <div class="col-md-3">
                                  <label class="col-xs-2 control-label">Año</label>
                                 
                                    <select class="form-control" name="anio" id="anio" required disabled>
                                    <option value="0" selected><?php echo $unidadM['anio']; ?></option>
                                    <?php $year = date("Y");
                                            for ($i=1945; $i<=$year; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                      ?>
                                        </select>    
                                 
                                </div>
                                
                                <div class="col-md-3">
                                 <label class="col-xs-2 control-label">Color</label>
                                  <input type="text"  required name="color" id="color" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['color']; ?>" disabled/>
                                     
                                    
                                </div> 
                                
                                    <div class="col-md-4">
                                    <label class="col-xs-5 control-label">Núm. motor</label>
                                        <input type="text"  required name="motor" id="motor" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['numeroMotor']; ?>" disabled/>
                                    
                                   </div>
                                   
                                   <div class="col-md-4">
                                     <label class="col-xs-5 control-label">Núm. seríe</label>
                                     <input type="text"  required name="serie" id="serie" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['numeroSerie']; ?>" disabled/>
                                     
                                       
                                   </div>
                                
                                   <div class="col-md-2">
                                   <label class="col-xs-1 control-label">KM</label>     
                                    <input type="text"  required name="km" id="km"  class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $unidadM['km']; ?>" disabled/>
                                    
                                   </div>
                              </div>
                         </div> 
                           <div class="f1-buttons">
                            <button type="button" name="btnActualizarCliente" id="btnActualizarCliente" class="btn btn-success">actualizar</button>  
   
                           </div>
                         
                            </div>
                                
                                    </form>
                                </div>
        <!------------------------------------------------------------------------------------ -->
                   <!--inicia sobre vehiculo -->
                    <div class="tab-pane fade" id="profile-pills">
                            <br>
                            
                     <div class="well">      
                     
     <!--Inicia la acrualizacion de las caracterisitcas del automovíl -->    
                    <form method="POST" action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data" id="vehiculo" name="vehiculo">
                     <div id="resp"></div>
                      <div class="form-group row">
                             <div class="form-group">
                              <label for="comment">Interior del vehículo:</label>
                              <textarea class="form-control" rows="2" id="interior" name="interior"><?php echo $row['observacionesInterna']; ?></textarea>
                              <input type="hidden" value="<?php echo $idFolio; ?>" name="idVehiculo">
                            </div> 
                        
                            <div class="form-group">
                              <label for="comment">Exterior del vehículo:</label>
                              <textarea class="form-control" rows="2" id="exterior" name="exterior"><?php echo $row['observacionesExterna']; ?></textarea>
                            </div> 
                            
                            <div class="form-group">
                              <label for="comment">Maletera del vehículo:</label>
                              <textarea class="form-control" rows="2" id="maletera" name="maletera"><?php echo $row['observacionesMaletera']; ?></textarea>
                            </div> 
                                  
                             <div class="f1-buttons">
                            <button type="button" name="btnActualizar" id="btnActualizar" class="btn btn-success">actualizar</button>  
   
                           </div>
                          </div><!--end offset -->
                          
                    </form>
                             </div>
                                </div>
     <!-- -------------------------------------------------------------------------------------->                              <!--inicia sobre servicio -->
                    <div class="tab-pane fade" id="messages-pills">
                      
                       <h4>Servicios</h4>
                         
                         <div class="well well-sm">
                     
                        <!--inicia inputs-->
                         <div class="well well-sm">
                 <form method="POST" action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data" id="servicio" name="servicio">
                     <div id="respu"></div>
                        <div class="row"> 
                         
                            <div class="col-md-5">	
                                <div>Servicio:
                                 
                               <input type="hidden" value="<?php echo $idFolio; ?>" name="folio">
                                <select name="cbo_producto" id="cbo_producto" class="col-md-2 form-control">
                                    <option value="0">Seleccione un servicio</option>
                                    <?php
                                   $resultado_producto = $conexionBD->query("SELECT * FROM servicio");  
                                     foreach($resultado_producto as $producto):?>
                                        <option value="<?php echo $producto['idServicio']?>"><?php echo $producto['nombre']?></option>
                                    <?php endforeach;?>
                                </select> 
                                </div> 
                            </div> 
                            <div class="col-md-2">
                                <div style="margin-top: 19px;">
                                <button type="button" class="btn btn-success btn-agregar-producto" name="btnAgregarS" id="btnAgregarS">Agregar</button>
                                </div>
                            </div>
                        </div> 
                      </form>
                         </div>
                          
                      
                        <div class="row"  >
                         
    					<table class="table">
					    <thead>
					        <tr>
					           
                            <th>Descripción</th>
                            <th>Unidad</th>
                            <th>Codigo unidad</th> 
                            <th>Precio</th>
                            <th>Subtotal</th>
					            <th></th>
					        </tr>
					    </thead>
					     
					    <tbody>
					 
			  <?php
       $unidad = $row['idUnidadMovil'];
       $rConcepto=$conexionBD->query("SELECT * FROM concepto WHERE idNotaServicio='$idFolio'");
    
	 while( $conceptoM = $rConcepto->fetch_array()){     
    ?>
                             
	        <tr>
              <td><?php echo $conceptoM['descripcion']; ?></td>
              <td><?php echo $conceptoM['codigoUnidad']; ?></td> 
              <td><?php echo $conceptoM['unidad']; ?></td> 
              <td><?php echo $conceptoM['precioUnitario']; ?></td>
              <td><?php echo $conceptoM['subTotal']; ?></td>
              <td> 
	            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDeleteServicio" data-id="<?php echo $conceptoM['idConcepto']?>" title="eliminar servicio"  >eliminar </button>
	          </td> 
              
            </tr>
                         
            <?php } ?>   
            <tr> <td></td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
	           <td>  
              <div>
              <?php  $s=$conexionBD->query("SELECT sum(subtotal) as suma FROM concepto WHERE idNotaServicio='$idFolio' "); $r=$s->fetch_array(); ?> 
					
               <span>Total</span> 
                <span id="prefix">$</span> <input type="text" id="total" name="total" disabled value="<?php	echo $r['suma']; ?>"  > 
                </div>  
	
                    </td> 
	        </tr>
					    	 
					    </tbody>
                
					</table>
                     
                        </div>
                     
                      
                        </div>
                        
                    </div>
                             
    <!------------------------------------------------------------------------------------ -->
               <!--inicia sobre imagenes -->
                   <div class="tab-pane fade" id="settings-pills">
                  <h4>Imagenes</h4>
                               
                         <div class="well well-sm">
                        <!--inicia inputs-->
                         <div class="well well-sm">
                        <div class="row">
                    <form method="POST" action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data" id="imagen" name="imagen">
                    <div id="respuesta"></div>
                    
                    <input type="hidden" value="<?php echo $idFolio; ?>" name="idNota"> 
                    <div class="col-xs-12">
                        <input id="file-0a" name="Foto[]"   class="file" type="file" multiple>
                         
                         <button type="submit" name="btnActualizarImagen" id="btnActualizarImagen" class="btn btn-success">actualizar</button> 
                     </div> 
                            
   
               
                    </form>
            
             <div class="row">  
             
             <div class="col-xs-6">
                <div class=" table-responsive">  
       
            <table class="table">
				 
					    <tbody>
					     <tr>
                 <?php 
                    
		
       $evidencia = $conexionBD->query("SELECT * FROM evidencia WHERE idNotaServicio='$idFolio' ");
			while( $evide = $evidencia->fetch_array() ){
 
               ?>
               <td>
                    <div  align="center">
                      <a class="example-image-link" href="<?php echo $evide['urlImagen']; ?>/<?php echo $evide['nombreImagen']; ?>" data-lightbox="example-set" data-title="
                      Haga clic en la mitad derecha de la imagen para avanzar."><img class="example-image" src="<?php echo $evide['urlImagen']; ?>/<?php echo $evide['nombreImagen']; ?>" alt=""/></a>

                    </div>
                </td>  
                <td> 
                 
	            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $evide['idEvidencia']?>" title="eliminar imagen"  >eliminar </button>
	               
                </td>
				</tr>
 
					     <?php } ?>
					    </tbody>
					</table>
                 </div>
               </div>
     
             </div>
                 
             
             
                  </div> 
                         </div>  
                            </div>
                                </div>
                                
    <!------------------------------------------------------------------------------------ -->
                    </div>
                        </div>
                    </div>
                </div>
        
     </section><!--fin de la clase wrapper -->
 
      </section><!-- fin del contenido principal-->

      
  </section> <!-- container section start -->

  
   
 
        <!-- javascripts --> 
        <script src="../styles/js/bootstrap.min.js"></script> 
        <script src="../styles/js/bootstrapValidator.min.js"></script>
        <script src="../styles/js/jquery.backstretch.min.js"></script>
        <script src="../styles/js/scriptsWizard.js"></script>
        
        <script src="../styles/js/icheck.min.js"></script> 
        <script src="../styles/js/custom.js"></script>
        
       <script src="../styles/js/scripts.js"></script>      
	  <!-- Alertity --> 
       <script src="../styles/js/alertify/lib/alertify.min.js"></script> 
       <script src="../styles/js/filejs/fileinput.js" type="text/javascript"></script> 
      <script src="../styles/js/validar/jquery.anexsoft-validator.js"></script> 
    
    <script>
            $('#file-0a').fileinput({
                showUpload: false,
                language: 'es',       
                maxFileCount: 10, 
                allowedFileExtensions: ['jpg', 'png', 'gif']
            });
        
        </script>
        
    <script>
            function soloNumeros(e) {
                var key = window.Event ? e.which : e.keyCode;
                return ((key >= 48 && key <= 57) ||(key==8))
            }
        
    function validar(){
         var result;
    console.log();
    if ($('#file-0a').val() == "") {
       result = '<label class="alert alert-dismissible alert-danger">Debe agregar un servicio</label>';
 		document.getElementById('mensaje').innerHTML = result;
        return false;
    }else{ 
      	document.getElementById('mensaje').innerHTML = "";
    }
}; 
        </script>
              <!------------------------------------------------------------------------>
    <script>//validar campos
            $(document).ready(function() {
                $('#validarForm').bootstrapValidator({
                    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                      placa: {
                            message: 'Placa válida',
                            validators: {
                                notEmpty: {
                                    message: 'No debe estar vacío este campo'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 20,
                                    message: 'La placa debe ser más de 4 a 15 characters'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9 ]+$/,
                                    message: 'La placa solo puede consistir de alfabeto y número'
                                }
                            }
                        },
                        nombre: {
                            message: 'Nombre no es válido',
                            validators: {
                                notEmpty: {
                                    message: 'El nombre es requerido y no debe estar vacío'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 30,
                                    message: 'El nombre debe ser más de 6 a 30 characters'
                                },
                                regexp: {
                                    regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
                                    message: 'El nombre solo puede consistir de alfabeto'
                                }
                            }
                        },
                        telefono: {
                            message: 'Apellido no es válido',
                            validators: {
                                notEmpty: {
                                    message: 'El apellido paterno es requerido y no debe estar vacío'
                                },
                                stringLength: {
                                    min: 4,
                                    max: 30,
                                    message: 'El apellido paterno debe ser más de 6 a 30 characters'
                                },
                                regexp: {
                                    regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
                                    message: 'El apellido paterno  solo puede consistir de alfabeto'
                                }
                            }
                        },
                        'interior[]': { 
                            validators: {
                                choice: {
                                    min: 2,
                                    max: 8,
                                    message: 'Seleccione el interior del vehículo'
                                }
                            }
                        },
                        'exterior[]': { 
                            validators: {
                                choice: {
                                    min: 2,
                                    max: 14,
                                    message: 'Seleccione el exterior del vehículo'
                                }
                            }
                        },
                        'maletera[]': { 
                            validators: {
                                choice: {
                                    min: 2,
                                    max: 14,
                                    message: 'Seleccione la maletera del vehículo'
                                }
                            }
                        } 
                     

                    } //termina fields
                });
            });
            $(function() {

                $('#login-form-link').click(function(e) {
                    $("#login-form").delay(100).fadeIn(100);
                    $("#register-form").fadeOut(100);
                    $('#register-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
                $('#register-form-link').click(function(e) {
                    $("#register-form").delay(100).fadeIn(100);
                    $("#login-form").fadeOut(100);
                    $('#login-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });

            });
        </script>
        
    <script src="../styles/js/jsCreadas/appEditarOrde.js"></script>
    					        
		  <!-- Eliminar imagen --> 			            
     <script>
   	$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#id_img').val(id)
		})
 
			$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosServicio/eliminar_img.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					$('#dataDelete').modal('hide');         
				  }
			});
		  event.preventDefault();
		});
         
         
         $('#dataDeleteServicio').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#id_servicio').val(id)
		})
 
			$( "#eliminarDatosServicio" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosServicio/eliminar_Servicio.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					$('#dataDelete').modal('hide');         
				  }
			});
		  event.preventDefault();
		});
     </script>
   

  </body>
</html>

<?php }
} ?>

 
 