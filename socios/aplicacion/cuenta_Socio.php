<?php
session_start();
require_once '../connections/conexion.php'; 
require_once '../styles/complemento/sitio.php'; 

$sesionSocio = $_SESSION['userSession'];

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}else{
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
    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../styles/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../styles/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../styles/css/font-awesome.min.css" rel="stylesheet" />  
    <!-- Custom styles -->
    <link href="../styles/css/widgets.css" rel="stylesheet">
    <link href="../styles/css/style.css" rel="stylesheet">
    <link href="../styles/css/style-responsive.css" rel="stylesheet" />
    <link href="../styles/css/jquery-ui-1.10.4.min.css" rel="stylesheet"> 
    
        <link rel="stylesheet" href="../styles/css/stylefooter.css"   type="text/css" media="all">
  </head>

 <body>
   
  <!-- container section start -->
  <section id="container" class="">
   
       <?php headerSocio(); //menu de la cabecera  ?>
       <?php asideSitio(); //menu vertical izquierda  ?>

       <?php include("modal/modal_datosSocio.php");?> 
   <?php     actualizarSocio(); 
             actualizarCorreoSocio();   
             actualizarTelefonoSocio();  
             actualizarSocioDir(); 
             guardarCorreoSocio();
             guardarTelSocio();
             eliminarCorreoSocio();
             eliminarTelSocio();  ?> 
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
        
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4> <?php echo $_SESSION['nameuser'];?></h4>               
                              <div class="follow-ava">
                                  <img src="../styles/img/avatar1_small.png" alt="">
                              </div>
                              <h6>Socio</h6>
                            </div>
                                            
                          </div>
                    </div>
                </div>
              </div>
          
          <!--se manda a traer todo//////////////////////////////////////////////////////////////// -->
             <div id="loader" class="text-center"> <img src="../styles/logos/loader.gif"></div>
        <div class="datos_ajax_deleteCorreo"></div><!-- Datos ajax Final -->
          <div class="datos_ajax_deleteTel"></div><!-- Datos ajax Final -->
        <div class="outer_div"></div><!-- Datos ajax Final -->
    
          </section>
          <?php footerSitio(); //pie de pagina?> 
      </section>
      <!--main content end-->

       
  </section>
 
 
    <!-- javascripts -->
    <script src="../styles/js/jquery.js"></script>
    <script src="../styles/js/jquery-ui-1.10.4.min.js"></script>
    <script src="../styles/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../styles/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="../styles/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../styles/js/jquery.scrollTo.min.js"></script>
    <script src="../styles/js/jquery.nicescroll.js" type="text/javascript"></script> 
    <!-- custom select --> 
    <!--custome script for all page-->
    <script src="../styles/js/scripts.js"></script>
    <script src="../styles/js/jquery.autosize.min.js"></script>
    <script src="../styles/js/jquery.placeholder.min.js"></script>
   
    <script src="../styles/js/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="../styles/js/appCuentaSocios.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>
	           <!------------------------------------------------------------------------>
        <script>//obtener estados
            // Obtener estados
            $.ajax({
                type: "POST",
                url: "http://localhost/Montecarlo05/funciones/procesar-estados.php",
                data: { estados : "Mexico" }
            }).done(function(data){
                $("#jmr_contacto_estado").html(data);
            });
            // Obtener municipios
            $("#jmr_contacto_estado").change(function(){
                var estado = $("#jmr_contacto_estado option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Montecarlo05/funciones/procesar-estados.php",
                    data: { municipios : estado }
                }).done(function(data){
                    $("#jmr_contacto_municipio").html(data);
                    onkeyup="javascript:this.value=this.value.toUpperCase();"
                });
            });

  

        </script>
  

  </body>
</html>
 <?php } ?>