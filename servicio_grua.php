<?php
session_start();
if(isset($_SESSION['user_id'])) {

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>Grúa</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"       type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        <link rel="stylesheet" href="css/font-awesome.css">
    </head>

    <body>
        <?php
        if(isset($_SESSION['user_id'])) {
            $page='servicios'; include 'php/lib-sitio_ok.php';    
        } else {
            $page='servicios'; include 'php/lib-sitio.php';
        }
        ?>

        <!-- ============================================================================================== -->
        <br><br><br>
        <div class="main container tiraCentral">
            <div class="col-lg-6 hidden-xs hidden-sm">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="todos_servicios.php">Servicios</a></li>
                    <li class="active"><span>Grúa</span></li>
                </ol>
            </div>
        </div> <!--termina tiraCentral -->
        <!-- ============================================================================================== -->

        <div class="main container tiraCentral">
            <section class="col-lg-12 col-md-12 col-xs-12 titulo tituloServicio">
                <section>
                    <h3><span>Servicio de Grúa</span></h3>
                </section>
            </section>
        </div>
        <div class="main container tiraCentral">
            <section class="col-lg-12">
                <section class="post">

                </section>
            </section>
        </div>
        <!-- ================================================================================================ -->

        <section class="main container tiraCentral" >
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                <h2>Horario de servicio</h2>
                <h3>Sólo autos descompuestos (no accidentes)</h3>
                <h4>9:00 a 18:00 hrs.</h4>
                <h4>(757) 476 7014</h4>
            </div>
            <div class="col-md-12">
                <img class="img-rounded img-responsive" src="img/servicios/grua.jpg">
            </div>
        </section>
        <div class="espacio"></div>
        <!-- ================================================================================================= -->
        <?php footerSitioNormal(); ?>
        <!-- ================================================================================================= -->

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>