<?php
session_start();
$_SESSION['detalle'] = array();
require_once '../connections/conexion.php';
require_once '../styles/complemento/sitio.php';
require_once '../funciones/generadorID.php';
$_SESSION['folio']= generarIDNotaServicio ( );
$folio = $_SESSION['folio'];

$sesionSocio = $_SESSION['userSession'];
$firma   = $_SESSION['firma'];
$sello   = $_SESSION['sello'];
$certi   = $_SESSION['certificado'];

if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
} else{
 

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
    <link href="../styles/css/bootstra.min.css" rel="stylesheet">
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
       <link rel="stylesheet" href="../styles/css/datetime/bootstrap-datetimepicker.min.css">
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
                            
    <link rel="stylesheet" href="../styles/css/tanque/customize-presets.css">
    <link rel="stylesheet" href="../styles/css/tanque/p1.css"> 
                             
 
  </head>

 <body>
        

  <!-- container principio de la seccion -->
  <section id="container"  >
     
       <?php headerSocio(); //menu de la cabecera  ?>
       <?php asideSitio(); //menu vertical izquierda  ?>
       
           <?php   require_once 'modal/modal_Orden.php';
                  // verificarOrden(); ?>
      <!--inicia main content-->
  <section id="main-content">

              <!-- inicio de la clase wrapper llamado de modales -->
      <section class="wrapper"> 
       
       <div class="col-md-12 col-sm-12 col-xs-12">
  

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Orden de pedido<small>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox"> 
                  <li><label class="control-label">Folio: <?php echo $folio; ?></label></li> 
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 
                    <!-- End SmartWizard Content -->   
      
         <div class="" role="tabpanel" data-example-id="togglable-tabs">
      
     <div class="col-md-12   form-box" style="text-align:center">
    
     <?php include '../funciones/datosServicio/guardar_Orden.php'; ?>

      
 
    
    <form method="POST" action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data" id="validarForm" name="validarF">
    <!-- inicia formulario -->
                    <div class="f1-steps form_wizard wizard_verticle" id="wizard_verticle">
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Cliente</p>
                            </div>
                          <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa  fa-cab"></i></div>
                                <p>Vehículo</p>
                            </div>
                             <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa  fa-cab"></i></div>
                                <p>Servicio</p>
                            </div>
                             <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa  fa-cab"></i></div>
                                <p>Evidencia</p>
                            </div>
                          
                            
                         
                        </div> <!--end class f1-steps -->

                        <fieldset>
                            <h4>Datos del cliente y de la unidad movíl</h4>
                            <br>

            <?php  if (isset($msg)) {  echo $msg;  }  ?>
                    <div>
            
                         <div class="well well-sm">
                        <!--inicia inputs-->
                         <div class="well well-sm">
                        <div class="row"  >
                              
                          <div class="form-group col-md-4">
                           <label class="col-xs-1 control-label">Placa</label>
                            <input type="text"  required name="placa" id="placa" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                            <input type="hidden" name="idUnidad" id="idUnidad"/>  
                            <input type="hidden" name="idEmpresa" id="idEmpresa"/>
                            <input type="hidden" name="idChofer" id="idChofer"/>
                            <input type="hidden" name="folio" id="folio" value="<?php echo $folio; ?>" />
                            <input type="hidden" name="firma" value="<?php echo $firma; ?>" />
                            <input type="hidden" name="sello" value="<?php echo $sello; ?>" />
                            <input type="hidden" name="certi" value="<?php echo $certi; ?>" />
          
                          </div>

                          <div class="form-group col-md-4">
                            <label class="col-xs-1 control-label">Nombre</label>

                                <input type="text"  required name="nombre" id="nombre" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>

                          </div>
                             <div class="col-md-4">
                               <label class="col-xs-2 control-label">Teléfono</label>   
                                <input type="text"  required name="telefono" id="telefono" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    
                                </div>
                            <div class="col-md-6"> 
                              <label class="col-xs-2 control-label">Dirección</label>
                              <input type="text"  required name="direccion" id="direccion" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>

                             </div>
                  
                              </div>
                         </div>
                          
                         <div class="well well-sm">
                        <div class="row" >
                        
                                  <div class="col-md-3">
                               <label class="col-xs-2 control-label">Marca</label>
                                 <input type="text"  required name="marca" id="marca" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                               
                                </div>
                                 
                                  <div class="col-md-3">
                                    <label class="col-xs-2 control-label">Modelo</label>
                                    <input type="text"  required name="modelo" id="modelo" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    
                                </div>
                         
                        <div class="col-md-3">
                                  <label class="col-xs-2 control-label">Año</label>
                                 
                                    <select class="form-control" name="anio" id="anio" required>
                                    <option value="0" selected>Seleccione</option>
                                    <?php $year = date("Y");
                                            for ($i=1945; $i<=$year; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                      ?>
                                        </select>    
                                 
                                </div>
                                
                                <div class="col-md-3">
                                 <label class="col-xs-2 control-label">Color</label>
                                  <input type="text"  required name="color" id="color" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                     
                                    
                                </div> 
                                
                                    <div class="col-md-4">
                                    <label class="col-xs-5 control-label">Núm. motor</label>
                                        <input type="text"  required name="motor" id="motor" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    
                                   </div>
                                   
                                   <div class="col-md-4">
                                     <label class="col-xs-5 control-label">Núm. seríe</label>
                                     <input type="text"  required name="serie" id="serie" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                     
                                       
                                   </div>
                                
                                   <div class="col-md-2">
                                   <label class="col-xs-1 control-label">KM</label>     
                                    <input type="text"  required name="km" id="km"  class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                    
                                   </div>
                              </div>
                         </div> 
                         
                            </div>
                                
                                       <div class="f1-buttons"> 
                                      <button type="button" class="btn btn-primary btn-next" >Siguiente</button> 
                                     </div>
                                
                            
                            </div><!--end offset -->

                        </fieldset>
                        <!---------------------------------------------------------------------------------------------------------------------->
                         <fieldset>
                            <h4></h4>
                            <br><br>
 
                     <div class="well">    
                        
                    
                  <div class="form-group row">
                         
                    <div class="col-xs-12 col-sm-6 col-md-3">
	      
                       <label class="control-label">Interior del vehículo</label>
                   
                      <div class="well well-sm">
                         
                           <input type="checkbox" value="Espejos" name="interior[]" checked class="flat" />  <label>Espejos</label><br/>
                           <input type="checkbox" value="Antenas" name="interior[]" class="flat" />  <label>Antenas</label><br/>
                           <input type="checkbox" value="Aros" name="interior[]" class="flat" />  <label>Aros</label><br/> 
                           <input type="checkbox" value="Vasos" name="interior[]" class="flat" />  <label>Vasos</label><br/> 
                           <input type="checkbox" value="Plumillas" name="interior[]" class="flat" />  <label>Plumillas</label><br/> 
                           <input type="checkbox" value="Brazos" name="interior[]" class="flat" />  <label>Brazos</label><br/>
                           <input type="checkbox" value="Neblineros" name="interior[]" class="flat" />  <label>Neblineros</label><br/>
                           
                          
                            <label class="col-xs-1 control-label">Faros</label>
                            <input type="text" onKeyPress="return soloNumeros(event)" required value="Faros " autofocus name="interior[]" class="form-control"/><br>
               

                    <div class="sidebar-widget">
                       <h4>Tanque</h4>
                        
        <input class="preset1" type="range" data-width="150" data-height="150" data-angleOffset="270" data-angleRange="190" data-labels="0,1/4,1/2,3/4,1" name="tanque" />
                   
                    </div>
                  </div> 
                      </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">

                        <label class="control-label">Exterior del vehículo</label>
                                <div class="well well-sm"> 
                                <input type="checkbox" value="Espejos" name="exterior[]" checked class="flat" />   <label>Espejos</label><br/> 
                                <input type="checkbox" value="Llavero" name="exterior[]" class="flat" />   <label>Llavero</label><br/>
                                <input type="checkbox" value="Parasoles" name="exterior[]" class="flat" />   <label>Parasoles</label><br/>
                                <input type="checkbox" value="Pisos" name="exterior[]" class="flat" />   <label>Pisos</label><br/>
                                <input type="checkbox" value="Encendedor" name="exterior[]" class="flat" />   <label>Encendedor</label><br/>
                                <input type="checkbox" value="Cabezales" name="exterior[]" class="flat" />   <label>Cabezales</label><br/>
                                <input type="checkbox" value="Radio" name="exterior[]" class="flat" />   <label>Radio</label><br/>
                                <input type="checkbox" value="Marca" name="exterior[]" class="flat" />   <label>Marca</label><br/>
                                <input type="checkbox" value="" name="exterior[]" class="flat" />   <label>Mascara</label><br/>
                                <input type="checkbox" value="" name="exterior[]" class="flat" />   <label>Ecualizador</label><br/>
                                <input type="checkbox" value="Parlantes" name="exterior[]" class="flat" />   <label>Parlantes</label><br/>
                                <input type="checkbox" value="Amplificador" name="exterior[]"class="flat" />   <label>Amplificador</label><br/>
                                <input type="checkbox" value="Bajos" name="exterior[]" class="flat" />   <label>Bajos</label><br/>
                                <input type="checkbox" value="Caja de CD" name="exterior[]" class="flat" />   <label>Caja de CD</label>
                                
                         </div>

                     </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">

                     <label class="control-label">Maletera del Vehículo</label>
                    <div class="well well-sm">
                     
                      <input type="checkbox" value="Seguros de ruedas" name="maletera[]" checked class="flat" />   <label>Seguros de ruedas</label><br/>
                      <input type="checkbox" value="Llave de ruedas" name="maletera[]" class="flat" />   <label>Llave de ruedas</label><br/>
                      <input type="checkbox" value="Llantas de repuesto" name="maletera[]" class="flat" />   <label>Llantas de repuesto</label><br/>
                      <input type="checkbox" value="Triangulo" name="maletera[]" class="flat" />   <label>Triangulo</label><br/>
                      <input type="checkbox" value="Extinguidor" name="maletera[]" class="flat" />   <label>Extinguidor</label><br/>
                      <input type="checkbox" value="Gato" name="maletera[]" class="flat" />   <label>Gato</label><br/>
        
                            
                    </div>
                       <div class="well well-sm">
                                <!-- Date --> 
                     <div class="form-group">
                                <label>Fecha Inicial:</label> 
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="fechaInicial" class="form-control pull-right" id="datepicker" value="<?php echo date("m/j/Y"); ?>" > 
                                

                                </div>
                                    <label>Fecha Final:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="fechaFinal" class="form-control pull-right" id="datepicker1">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <!-- /.form group -->
                      </div>
                        
                     </div>
                        
              
                   
                     <div class="f1-buttons">
                             <button type="button" class="btn btn-warning btn-previous">Anterior</button>
                            <button type="button" class="btn btn-primary btn-next">Siguiente</button>
                    </div>
                            </div><!--end offset -->
                             </div>

                        </fieldset>
                        <!-- ------------------------------------------------------------------- -->
                      <fieldset>
                            <h4>Servicio</h4>
                            <br> 
                            
                    <div>
            
                         <div class="well well-sm">
                        <!--inicia inputs-->
                         <div class="well well-sm">
                        <div class="row"> 
                         
                            <div class="col-md-5">	
                                <div>Servicio:
                                 
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
                                <button type="button" class="btn btn-success btn-agregar-producto">Agregar</button>
                                </div>
                            </div>
                        </div> 
                         </div>
                          
                         <div class="well well-sm">
                        <div class="row" >
                        <div class="detalle-producto"> 
                     <?php if(count($_SESSION['detalle'])>0){?>
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
					    	foreach($_SESSION['detalle'] as $k => $detalle){ 
					    	?>
					        <tr>
                                    <td><?php echo $detalle['producto'];?></td>
                                    <td><?php echo $detalle['unidad'];?></td>
                                    <td><?php echo $detalle['codigoU'];?></td>           
                                    <td><?php echo $detalle['precio'];?></td>
                                    <td><?php echo $detalle['subtotal'];?></td>  
					            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
				<?php }else{ ?>
				<div class="alert alert-dismissible alert-danger"> 
                              <strong>No hay servicios agregados!</strong>
                          
                            </div> 
				<?php }?>
                           
                                
                            </div>
                            </div>
                         </div> 
                         
                            </div>
                                
                             <div class="f1-buttons">
                             <button type="button" class="btn btn-warning btn-previous">Anterior</button>
                            <button type="button" class="btn btn-primary btn-next" >Siguiente</button> 
                           </div>
                                
                            
                            </div><!--end offset -->

                        

                        </fieldset>
                    <!--///////////////////////////////////////////////// -->           
                      <fieldset>
                            <h4>Evidencia</h4>
                            <br> 
                             
                         <div class="well well-sm">
                        <!--inicia inputs-->
                         <div class="well well-sm">
                          <div class="row">  
                        
                           <div class="col-xs-12"> 
                        <input id="file-0a" name="Foto[]"   class="file" type="file" multiple > 
                        </div>
                          </div> 
                         </div> 
                         
                          <div id="mensaje"></div>
                         </div>
                                
                             <div class="f1-buttons">
                             <button type="button" class="btn btn-warning btn-previous">Anterior</button>
                             
         
                            <button type="submit"   name="btnEnviar" id="btnEnviar" class="btn btn-primary">Enviar</button> 
                             
   
                           </div>
                  

                        </fieldset> 
                        
          </div>
          
        
    </form>
          </div>
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
       <script src="../styles/js/appAgregarServicio.js"> </script>       
	  <!-- Alertity --> 
       <script src="../styles/js/alertify/lib/alertify.min.js"></script> 
       
       <script src="../styles/js/filejs/fileinput.js" type="text/javascript"></script> 
       <script src="../styles/js/validar/jquery.anexsoft-validator.js"></script> 
       <script src="../styles/js/datetime/bootstrap-datetimepicker.min.js"></script>
       <script src="../styles/js/datetime/bootstrap-datetimepicker.min.js"></script>
       <script src="../styles/js/datetime/bootstrap-datetimepicker.es.js"></script>
       <script src="../styles/js/datetime/moment.min.js"></script>
         <!-- Chart.js -->
       <script src="../styles/js/datetime/Chart.min.js"></script> 
          <!-- gauge.js -->
       <script src="../styles/js/datetime/gauge.min.js"></script>
       
    <script type="text/javascript" src="../styles/js/tanque/knob.js"></script>
    <script type="text/javascript" src="../styles/js/tanque/p1.js"></script>  
       
       <script>
    //Date picker
    $('#datepicker').datepicker({
    autoclose: true
    })
        $('#datepicker1').datepicker({
    autoclose: true
    })
  
  
   </script>
   
 
 
   <script type="text/javascript">
 
  for (var i = 1; i < 6; i++) {
        Array.prototype.slice.call(document.getElementsByClassName('preset' + i)).forEach(function(el) {
            new Knob(el, new Ui['P' + i]());
            el.addEventListener('change', function  () {
              console.log(el.value)
            })
        })
    }

   

</script>
<svg>
    <filter id="dropshadow" height="250%" width="250%">
        <feGaussianBlur in="SourceAlpha" stdDeviation="2"/>
        <feOffset dx="0" dy="6" result="offsetblur"/>
        <feMerge>
            <feMergeNode/>
            <feMergeNode in="SourceGraphic"/>
        </feMerge>
    </filter>
 
</svg>
     
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
  
 
    
  </body>
</html>

<?php } ?>





















