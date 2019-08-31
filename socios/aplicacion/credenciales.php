<?php
session_start();
require_once '../connections/conexion.php';  
$sesionSocio = $_SESSION['idS']; 
if (!isset($_SESSION['nameuser'])) {
	header("Location: index.php");
}else{
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
   <script src="../styles/js/jquery-1.8.3.min.js"></script>
   <script src="../styles/js/bootstrap.min.js"></script>  
       <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../styles/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css font icon -->
    <link href="../styles/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../styles/css/font-awesome.min.css" rel="stylesheet" />  
    <!-- Custom styles --> 
        
  <link rel="stylesheet" href="../styles/css/AdminLTE.min.css">
  
    
    <script src="../styles/js/jquery.js"></script> 
    <script src="../styles/js/bootstrap.min.js"></script>
    <script src="../styles/js/adminlte.min.js"></script>

   <script>
       $(document).ready(function(){
         $("#credenciales").modal("show");
      });
    </script>
 
</head>
<body>

  <div class="container body">

      
    <?php include("modal/modal_Credenciales.php");?> 
   <?php verificarDatSocio(); 
      error(); ?>        
      
   
        <div id="loader" class="text-center"> <img src=" http://localhost/Montecarlo05/styles/logos/loader.gif"></div> 
        <div class="outer_div"></div><!-- Datos ajax Final -->
    
      
    </div>
    
   
 
  <script src="../styles/js/appCredenciales.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>      
</body>
</html>
<?php } ?>