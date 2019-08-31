<?php
session_start(); 
require_once 'connections/conexion.php';
require_once 'styles/complemento/sitio.php'; 
$idSocio =$_SESSION['userSession'];
$user = $_SESSION['nameuser'];
$firma = $_SESSION['firma'];

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}else if($firma==""){
?>
<html>
<head>
   <meta charset="utf-8">
   <title>Pagina principal</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function(){
         $("#mostrarmodal").modal("show");
      });
    </script>
</head>
<body>
   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>Bienvenido <?php echo $user ?>, por favor ingrese su firma digital!</h3>
           </div>
             <?php include 'funciones/datosCredenciales/agregarCredenciales.php'; ?>
              <form method="POST" action="" class="form-horizontal f1 success" role="form"  enctype="multipart/form-data">
           <div class="modal-body">
              <h4>Firma</h4>
             <input type="password" name="firma" id="firma"> 
             <input type="hidden" name="idSocio" value="<?php echo $idSocio; ?>">
                
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
          <input type="submit" class="btn btn-primary" value="Enviar" name="enviarF"> 
           </div>
           </form>
      </div>
   </div>
</div>
</body>
</html>

 <?php
                     
} else if($firma != ""){
    
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Monte'Carlo Automotríz</title>

    <!-- Bootstrap CSS -->    
    <link href="styles/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="styles/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="styles/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="styles/css/font-awesome.min.css" rel="stylesheet" />  
    <!-- Custom styles -->
    <link href="styles/css/widgets.css" rel="stylesheet">
    <link href="styles/css/style.css" rel="stylesheet">
    <link href="styles/css/style-responsive.css" rel="stylesheet" />
    <link href="styles/css/jquery-ui-1.10.4.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="styles/css/AdminLTE.min.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="styles/css/Ionicons/css/ionicons.min.css">
    
        <link rel="stylesheet" href="styles/css/stylefooter.css"   type="text/css" media="all">
  </head>

 <body>
 <?php include 'aplicacion/graficaPanel.php'; ?>

  <!-- container principio de la seccion -->
  <section id="container" class="">
     
       <?php headerSocio(); //menu de la cabecera  ?>
       <?php asideSitio(); //menu vertical izquierda  ?>

      <!--inicia main content-->
  <section id="main-content">

            <!-- inicio de la clase wrapper -->
      <section class="wrapper"> 
   
      
      
<div class="row"> 
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php contarEmpleados(); ?> </h3>

              <p>Empleados registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="aplicacion/empleados_lista.php" class="small-box-footer">Más informacíon <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>12<?php //contarChofer();?></h3>

              <p>Pagos</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="aplicacion/vista_ChoferAdm.php" class="small-box-footer">Más informacíon <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>12<?php //contarUnidades();?><sup style="font-size: 20px"></sup></h3>

              <p>Historial de Servicios</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <a href="aplicacion/historial_Servicio.php" class="small-box-footer">Más informacíon  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
           <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <h3><?php contarOrden();?></h3>

              <p>Ordenes de servicio</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="aplicacion/orden_ServicioLista.php" class="small-box-footer">Más informacíon  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
 
          </div>
           <?php //include 'aplicacion/consulta_eo.php'; ?>
            <!-- inicia columna para promociones-->
 <div class="row">
      <div class="col-lg-9 col-md-10">
       <?php include 'aplicacion/promocion.php' ?>
     </div>
       <div class="col-lg-3 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php contarOrden();?></h3>

              <p>Ordenes de servicio</p>
              <p>sin facturar</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="#" class="small-box-footer">Más informacíon  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     <div>
         
     </div>
</div><!-- fin de la fila-->
            
     </section><!--fin de la clase wrapper -->

       <?php footerSitio(); //pie de pagina?> 
   
      </section><!-- fin del contenido principal-->

      
  </section> <!-- container section start -->
        
    <!-- javascripts -->
    <script src="styles/js/jquery.js"></script>
    <script src="styles/js/jquery-ui-1.10.4.min.js"></script>
    <script src="styles/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="styles/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="styles/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="styles/js/jquery.scrollTo.min.js"></script>
    <script src="styles/js/jquery.nicescroll.js" type="text/javascript"></script> 
    <!-- custom select --> 
    <!--custome script for all page-->
    <script src="styles/js/scripts.js"></script>
    <script src="styles/js/jquery.autosize.min.js"></script>
    <script src="styles/js/jquery.placeholder.min.js"></script>
   
    <script src="styles/js/jquery.slimscroll.min.js"></script>
  
          <script type="text/javascript">
            $(document).ready(function(e){
                $('.carousel-indicators li:nth-child(1)').addClass('active') ;
                $('.item:nth-child(1)').addClass('active');
            });
                              
                              
          </script>

  </body>
</html>
 <?php } ?>