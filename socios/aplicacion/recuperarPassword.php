<?php
require_once '../styles/complemento/sitio.php';
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

    <title>recuperar contraseña</title>

    <!-- Bootstrap CSS -->    

    <link rel="stylesheet" href="../styles/css/bootstra.min.css"   type="text/css"> 
    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../styles/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../styles/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../styles/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="../styles/css/style.css" rel="stylesheet">
    <link href="../styles/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../styles/css/estilos.css">
   
        <link rel="stylesheet" href="../styles/css/stylefooter.css"   type="text/css" media="all">
 
</head>
 
  <body class="login-img3-body">
 
 <?php include '../styles/complemento/headerSocio.php' ?>

    <div class="container">
 
     <form class="login-form" method="post" id="login-form"  > 
          <?php require_once '../funciones/password/validarEmail.php'; ?>     
           <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
              <input type="email"  name="email" class="form-control" placeholder="Correo electronico" required autofocus>
            </div>
         
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="cambiarPass" id="cambiarPass" ><span class="glyphicon glyphicon-log-in"></span> &nbsp; Recuperar contraseña</button> 
          
              
            </div>
   
        </form>
    </div>
       <?php footerSitio(); //pie de pagina?>


       <script src="../styles/js/jquery.js"></script>
        <script src="../styles/js/jquery.min.js"></script>
        <script src="../styles/js/bootstrap.min.js"></script>

        

  </body>
</html>
