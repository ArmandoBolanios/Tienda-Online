<?php
session_start(); 
require_once '../connections/conexion.php';
require_once '../styles/complemento/sitio.php'; 

$sesionSocio = $_SESSION['userSession']; 

if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
} else{
    
if(isset($_GET['nro'])){ 
    $idNota=$_GET['nro'];
	$result=$conexionBD->query("SELECT * FROM nota_servicio, nota_servicio_unidad WHERE nota_servicio.idNotaServicio='$idNota'");
	$row = $result->fetch_array();

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
    <!-- bootstrap theme -->
    <link href="../styles/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css font icon -->
    
    <link href="../styles/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../styles/css/font-awesome.min.css" rel="stylesheet" />  
    <!-- Custom styles -->
    <link href="../styles/css/widgets.css" rel="stylesheet">
    <link href="../styles/css/style.css" rel="stylesheet">
    <link href="../styles/css/style-responsive.css" rel="stylesheet" />
    <link href="../styles/css/jquery-ui-1.10.4.min.css" rel="stylesheet"> 
    
        <link rel="stylesheet" href="../styles/css/stylefooter.css" type="text/css" media="all">
        <link href="../styles/css/custom.min.css" rel="stylesheet">
         <!-- iCheck -->
    <link href="../styles/css/flat/green.css" rel="stylesheet">
    
    <link href="../styles/js/autcom/jqueryui.css" type="text/css" rel="stylesheet"/> 
     

    <script type="text/javascript" src="../styles/js/autcom/jquery.min.js"></script>
    <script type="text/javascript" src="../styles/js/autcom/jquery-ui.min.js"></script>
   
     <link href="../styles/css/filecss/fileinput.css" media="all" rel="stylesheet" type="text/css" />
     
	<link rel="stylesheet" href="../styles/js/lightbox/lightbox.min.css">
    <link rel="stylesheet" href="../styles/css/filecss/visualizar.css">
    
  </head>

 <body>
       
  <!-- container principio de la seccion -->
  <section id="container"  >
     
       <?php headerSocio(); //menu de la cabecera  ?>
       <?php asideSitio(); //menu vertical izquierda  ?>

      <!--inicia main content-->
  <section id="main-content">

              <!-- inicio de la clase wrapper llamado de modales -->
      <section class="wrapper"> 
             
         <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">   
                     <li> <a id="imprimir" title="Imprimir" class="btn btn-primary" href=""><i class="icon-print icon-white"></i> Imprimir</a></li>
                      <li><a id="imprimir" title="Editar" class="btn btn-warning btn-lg"  href="pdfOrden.php?pdf=<?php echo $idNota; ?>"><i class="icon-pencil icon-white"></i> PDF</a></li> 
                       <li> <a id="imprimir" title="Editar" class="btn btn-success"  href="editar_orden.php?fol=<?php echo $idNota; ?>"><i class="icon-pencil icon-white"></i> Editar</a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="muestra">
 
                    <!-- End SmartWizard Content -->
         
         <div class="" role="tabpanel" data-example-id="togglable-tabs">
      <header>
           <?php 
                   $cho = $row['idChofer'];
                   $rChofer=$conexionBD->query("SELECT * FROM chofer, chofer_telefono, chofer_correo WHERE chofer.idChofer='$cho'");
                   $chof = $rChofer->fetch_array();  
            ?>  
        <h1>Orden de servicio</h1> 
            <address contenteditable>
              <div class="well well-sm"> 
           <?php  
                    $rSocio=$conexionBD->query("SELECT * FROM socio, socio_direccion,socio_telefono,socio_correo WHERE socio.idSocio='$sesionSocio'");
                    $socio = $rSocio->fetch_array();  
                     ?>
            <h4>Taller</h4> 
           <p><?php echo $socio['denominacion'] ?>.</p>           
           <p><?php echo $socio['nombreSocio'].' '.$socio['apellidoPaternoSocio'] ?>.</p>                     <p><?php echo $socio['correoElectronico'] ?> </p>
           <p><?php echo $socio['telefono'] ?> </p>
           <p><?php echo $socio['estado'].', '.$socio['delegacion'].', '.$socio['calle']  ?> </p>
                </div>
        </address>
            <address contenteditable>
            <div class="well well-sm"> 
            <h4>Cliente</h4> 
           <p><?php echo $chof['nombreChofer'].' '.$chof['apellidoPaternoChofer'] ?>.</p>
           <p><?php echo $chof['correoElectronico'] ?> </p>
           <p><?php echo $chof['telefono'] ?> </p>
            </div>
        </address>
            <address contenteditable>
            <div class="well well-sm"> 
                    
           <?php 
                    $emp = $row['idEmpresa'];
                    $rEmpresa=$conexionBD->query("SELECT * FROM empresa, empresa_direccion WHERE empresa.idEmpresa='$emp'");
                    $empre = $rEmpresa->fetch_array();  
                     ?>
            <h4>Empresa</h4> 
           <p><?php echo $empre['denominacion'] ?>.</p>
           <p><?php echo $empre['estado'].', '.$empre['delegacion'].', '.$empre['calle']  ?> </p>
              </div>
        </address>
        <span class="sp"><img alt="" src="../styles/img/logom.png" /></span>
      </header>
      
      <article> 
           <table class="meta">
              <tr>
                <th><span contenteditable>Folio #</span></th>
                <td><span contenteditable><?php echo $idNota ?></span></td>
              </tr>
              <tr>
                <th><span contenteditable>Fecha Inicial</span></th>
                <td><span contenteditable><?php echo $row['fechaRegistro']; ?></span></td>
              </tr>
                <tr>
                <th><span contenteditable>Fecha Final</span></th>
                <td><span contenteditable><?php echo $row['fechaFinal']; ?></span></td>
              </tr>
              <tr>
        <?php  $s=$conexionBD->query("SELECT sum(subtotal) as suma FROM concepto WHERE idNotaServicio='$idNota' "); $r=$s->fetch_array(); ?> 
                <th><span contenteditable>Total</span></th>
                <td><span id="prefix" contenteditable>$</span><span><?php	echo $r['suma']; ?></span></td>
              </tr>
            </table>
           <?php 
           $unidad = $row['idUnidadMovil'];
           $rUnidad=$conexionBD->query("SELECT * FROM unidad_movil WHERE idUnidadMovil='$unidad'");
           $unidadM = $rUnidad->fetch_array();  
                   ?>
            <table class="inventory">
              <thead>
                <tr>
                  <th><span contenteditable>Placa</span></th>
                  <th><span contenteditable>Marca</span></th>
                  <th><span contenteditable>Modelo</span></th>
                  <th><span contenteditable>Año</span></th>
                  <th><span contenteditable>Color</span></th>
                  <th><span contenteditable>Número de motor</span></th>
                  <th><span contenteditable>Número de serie</span></th>
                  <th><span contenteditable>KM</span></th>
                </tr>

              </thead>

              <tbody>
                <tr>
                  <td><span contenteditable><?php echo $unidadM['placa']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['marca']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['modelo']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['anio']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['color']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['numeroMotor']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['numeroSerie']; ?></span></td>
                  <td><span contenteditable><?php echo $unidadM['km']; ?></span></td> 
                </tr>
              </tbody>
            </table>
            <table class="inventory">
              <thead>
                <tr>
                  <th><span contenteditable>Exterior del vehículo</span></th>
                  <th><span contenteditable>Interior del vehículo</span></th>
                  <th><span contenteditable>Maletera del vehículo</span></th> 
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span contenteditable><?php echo $row['observacionesExterna']; ?></span></td>
                  <td><span contenteditable><?php echo $row['observacionesInterna'];?></span></td>
                  <td><span contenteditable><?php echo $row['observacionesMaletera']; ?></span></td> 
                </tr>
              </tbody>
            </table>
            <table class="inventory">
              <thead>
                <tr> 
                  <th><span contenteditable>Descripcion</span></th>
                  <th><span contenteditable>Codigo unidad</span></th>
                  <th><span contenteditable>Unidad</span></th>
                  <th><span contenteditable>Precio</span></th> 
                  <th><span contenteditable>Subtotal</span></th> 
                </tr>
              </thead>
              <tbody>
                 <?php  
           $rConcepto=$conexionBD->query("SELECT * FROM concepto WHERE idNotaServicio='$idNota'");
            while( $conceptoM = $rConcepto->fetch_array()){  
                   ?>
                <tr>
                  <td><span contenteditable><?php echo $conceptoM['descripcion']; ?></span></td>
                  <td><span contenteditable><?php echo $conceptoM['codigoUnidad']; ?></span></td> 
                  <td><span contenteditable><?php echo $conceptoM['unidad']; ?></span></td> 
                  <td><span data-prefix>$</span><span><?php echo $conceptoM['precioUnitario']; ?></span></td>
                  <td><span data-prefix>$</span><span><?php echo $conceptoM['subTotal']; ?></span></td>

                </tr>
                <?php } ?>
              </tbody>
            </table> 
            <table class="balance">
              <tr>
                <th><span contenteditable>Total</span></th>
                <td><span data-prefix>$</span><span><?php	echo $r['suma']; ?></span></td>
              </tr> 
            </table>
      </article>
      
      <aside>
        <h1><span contenteditable>Notas adicionales</span></h1>
        <div contenteditable> 
                     <div class=" table-responsive">  
             
             <table class="inventory">
          <thead>
            <tr>
              <th><span contenteditable>imagen</span></th> 
          </thead>
          <tbody>
            <tr>
                 <?php 
                    
		
       $evidencia = $conexionBD->query("SELECT * FROM evidencia WHERE idNotaServicio='$idNota' ");
			while( $evide = $evidencia->fetch_array() ){
 
               ?>
              <td><span contenteditable>          
        <div  align="center">
      <a class="example-image-link" href="<?php echo $evide['urlImagen']; ?>/<?php echo $evide['nombreImagen']; ?>"  ><img class="example-image" src="<?php echo $evide['urlImagen']; ?>/<?php echo $evide['nombreImagen']; ?>" alt=""/></a>
   
    </div></span>
           </td>  
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
        </div>
      </aside>
      
             
             
              
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
       
  <script src="../styles/js/lightbox/lightbox-plus-jquery.min.js"></script>
        
 

<script type="text/javascript">
    $(document).ready(function(){
        $("#imprimir").click(function(){         
            PrintElem('#muestra');
        })

        function PrintElem(elem){
            Popup($(elem).html());
        }

        function Popup(data){
            var mywindow = window.open('', 'mydiv', 'height=700,width=800');
            mywindow.document.open();
            mywindow.document.onreadystatechange=function(){
             if(this.readyState==='complete'){
              this.onreadystatechange=function(){};
              mywindow.focus();
              mywindow.print();
              mywindow.close();
             }
            }


            mywindow.document.write('<html><head><title>MonteCarlo Automotriz </title>');
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/bootstra.min.css' />"); 
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/custom.min.css'>");          
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/filecss/visualizar.css'> ");  
                 
          mywindow.document.write("</head><body>");
            mywindow.document.write(data);          
            mywindow.document.write("<p><?php echo $row['firma'].'-----'.$row['certificado']; ?>");
            mywindow.document.write("</p>");     
            
            mywindow.document.write("</body></html>"); 

            mywindow.document.close(); // necessary for IE >= 10


            return true;
        }

    });
</script>
    
  </body>
</html>

<?php } //fin del get
} ?>
 