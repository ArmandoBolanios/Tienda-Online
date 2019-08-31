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

        <title>Nosotros</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"        type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        <link rel="stylesheet" href="css/font-awesome.css">
    </head>

    <body>
        <?php 
        if(isset($_SESSION['user_id'])) {
            $page='inicio'; include 'php/lib-sitio_ok.php';    
        } else {
            $page='inicio'; include 'php/lib-sitio.php';
        }
        ?>
        <!-- =================================================================================================== -->
        <div class="espacio"></div>
        <div class="main container tiraCentral">
            <div class="col-lg-6 hidden-sm hidden-xs">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li class=""><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                    <li class="active"><span>Acerca de la empresa</span></li>
                </ol>
            </div> <!--termina col-lg-8 -->
        </div> <!--termina tiraCentral -->
        <!-- =================================================================================================  -->
        <div class="espacio"></div>
        <div class="container tiraCentral">
            <div class="text-center disminuirLogo">
                <img src="img/index/logo_mt.png">
            </div>
        </div>
        <div class="main container tiraCentral">
            <section class="col-lg-12 col-md-12 col-xs-12">
                <div class="sepNosotros portfolioNosotros" data-stellar-background-ratio="0.5" id="envios">
                    <section class="titulo tituloServicio">
                        <h3><span>Misión</span></h3>
                        <div class="pequenio_espacio"></div>
                        <article class="">
                            <p align="justify">Satisfacer las necesidades de nuestros clientes mediante la comercialización de refacciones automotrices basada en marcas de clase mundial, así como ofrecer servicios adicionales para el correcto mantenimiento de los vehículos en la región, siendo capaces de responder a las más altas expectativas de nuestros clientes.
                            </p>
                        </article>
                    </section>
                </div>

                <div class="sepNosotros portfolioNosotros" data-stellar-background-ratio="0.5" id="envios">
                    <section class="titulo tituloServicio">
                        <h3><span>Visión</span></h3>
                        <div class="pequenio_espacio"></div>
                        <article class="">
                            <p align="justify">Ser la empresa líder en el mercado regional de refacciones automotrices, garantizando la satisfacción de las demandas de nuestros productos y servicios, teniendo un compromiso con el cliente con la mejor relación amabilidad, honestidad y calidad.
                            </p>
                        </article>
                    </section>
                </div>
            </section>
        </div>
        <!-- ===============================================================================================================-->

        <?php
        footerSitioNormal();
        ?>
        <!-- =================================================================================================================-->

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>