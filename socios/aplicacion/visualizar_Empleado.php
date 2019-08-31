<?php
session_start(); 
require_once '../connections/conexion.php';
require_once '../styles/complemento/sitio.php';

$sesionSocio = $_SESSION['userSession']; 

if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
} else{
if(isset($_GET['emple'])){ 
    $idEmpleado=$_GET['emple'];
	$result=$conexionBD->query("SELECT * FROM empleadosocio WHERE idSocioEmpleado='$idEmpleado'");
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
                    <h2>Orden de servicio <small>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">   
                     <li> <a id="imprimir" title="Imprimir" class="btn btn-mini btn-inverse" href=""><i class="icon-print icon-white"></i> Imprimir</a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="muestra">
 
                    <!-- End SmartWizard Content -->
         
         <div class="" role="tabpanel" data-example-id="togglable-tabs">
             <div class="well well-sm"> 
                 <div class="row">
                   
                   <div class="col-xs-12 col-sm-6 col-md-4">
                    <hr> 
                   
                <h3>Empleado</h3>
                <h4>Nombre: <?php echo $row['nombreEmpleado'] ?> </h4>
                <h4>Apellidos: <?php echo $row['apellidoPaternoEmpleado'].' '.$row['apellidoMaternoEmpleado'] ?>  </h4>
                <h4>Usuario: <?php echo $row['nombreEmpleado'] ?></h4>
                <h4>Fecha de registro: <?php echo $row['fechaDeRegistro'] ?></h4>
                   <h4></h4>
                   <h4></h4>
                    </div>
                   
                 
                     
                 </div>
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
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/bootstra.min.css' ");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/bootstrap-theme.css' ");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/sass-compile.css'"); 
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/styleWizard.css' ");
          
              mywindow.document.write("<link rel='stylesheet' href='../styles/css/elegant-icons-style.css' ");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/font-awesome.min.css' ");
              mywindow.document.write("<link rel='stylesheet' href='../styles/css/widgets.css' ");
              mywindow.document.write("<link rel='stylesheet' href='../styles/css/stylefooter.css' ");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/custom.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/jquery-ui-1.10.4.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='../styles/css/style-responsive.css' />");           
        
            mywindow.document.write("</head><body >");
            mywindow.document.write(data);          
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
 