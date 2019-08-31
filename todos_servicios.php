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

        <title>Servicios</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"        type="text/css">

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
        <style>
            body {
                background:
                    linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
                    linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
                    linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
                    linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
                    linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
                    linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
                background-color: #131313;
                background-size: 20px 20px;; background:
                    linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
                    linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
                    linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
                    linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
                    linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
                    linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
                background-color: #131313;
                background-size: 20px 20px;
            }
        </style>
        <!-- =========================================================================================== -->
        <br><br><br>
        <div class="main container tiraCentral">
            <div class="col-lg-6">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                    <li class="active"><span>Servicios</span></li>
                </ol>
            </div>
        </div> <!--termina tiraCentral -->
        <!-- ===================================================================================== -->

        <div class="main container tiraCentral">
            <section class="col-lg-12 col-md-12 col-xs-12">

                <!--====================================================================================-->
                <div class="sepServicios portfolioServicios" data-stellar-background-ratio="0.5" id="envios">
                    <section class="titulo tituloServicio">
                        <h3><span>Servicios de Taller Mecánico</span></h3>
                    </section>

                    <div class="wrapper row3 bgded">
                        <div class="overlay">
                            <div id="intro" class="clear">
                                <section class="parallax">
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <article class="one_third">
                                            <a href="servicio_tma.php#afmayor">
                                                <i><img src="img/servicios/af_mayor2.png"></i>
                                                <h3 class="heading">Afinación Mayor</h3>
                                            </a>
                                        </article>
                                        <br>

                                        <article class="one_third">
                                            <a href="servicio_tma.php#afmenor">
                                                <i><img src="img/servicios/af_menor.png"></i>
                                                <h3 class="heading">Afinación Menor</h3>
                                            </a>
                                        </article>
                                        <br>
                                    </div> <!--termina col-lg-4-->

                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <article class="one_third">
                                            <a href="servicio_tma.php#frenos">
                                                <i><img src="img/servicios/frenos2.png"></i>
                                                <h3 class="heading">Servicio de Frenos</h3>
                                            </a>
                                        </article>
                                        <br>

                                        <article class="one_third">
                                            <a href="servicio_tma.php#repa_motor">
                                                <i><img src="img/servicios/reparacion_motor2.png"></i>
                                                <h3 class="heading">Reparación de Motor</h3>
                                            </a>
                                        </article>
                                        <br>
                                    </div> <!--termina col-lg-4-->

                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <article class="one_third">
                                            <a href="servicio_tma.php#clutch">
                                                <i><img src="img/servicios/clutch.png"></i>
                                                <h3 class="heading">Servicio de Clutch</h3>
                                            </a>
                                        </article>
                                        <br>

                                        <article class="one_third">
                                            <a href="servicio_tma.php#enfriamiento">
                                                <i><img src="img/servicios/sistema_enfriamiento2.png"></i>
                                                <h3 class="heading">Sistema de Enfriamiento</h3>
                                            </a>
                                        </article>
                                        <br>
                                    </div> <!--termina col-lg-4-->
                                </section> <!--termina parallax-->
                            </div> <!--termina intro-->
                        </div> <!--termina overlay -->
                    </div> <!--termina wrapper -->
                </div>


                <!--====================================================================================-->
                <div class="sepServicios portfolioServicios" data-stellar-background-ratio="0.5" id="envios">
                    <section class="titulo tituloServicio">
                        <h3><span>Diagnóstico por Computadora</span></h3>
                    </section>

                    <div class="wrapper row3 bgded">
                        <div class="overlay">
                            <div id="intro" class="clear">
                                <section class="parallax">
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <br>
                                        <article class="one_third first">
                                            <a href="servicio_diag_compt.php#diag_motor">
                                                <i><img src="img/servicios/diagnostico_motor.png"></i>
                                                <h3 class="heading">Diagnóstico de Motor</h3>
                                            </a>
                                        </article>

                                       <br>
                                        <article class="one_third first">
                                           <br><br>
                                            <a href="servicio_diag_compt.php#abs">
                                                <i><img src="img/servicios/abs.png"></i>
                                                <h3 class="heading">Diagnóstico de ABS</h3>
                                            </a>
                                        </article>
                                    </div> <!--termina col-lg-4-->

                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <br>
                                        <article class="one_third first">
                                           
                                            <a href="servicio_diag_compt.php#transmision">
                                                <i><img src="img/servicios/transmision_autom.png"></i>
                                                <h3 class="heading">Transmisiones Automáticas</h3>
                                            </a>
                                        </article>
                                        <br>
                                        <article class="one_third first">
                                           <br><br>
                                            <a href="servicio_diag_compt.php#traccion">
                                                <i><img src="img/servicios/traccion.png"></i>
                                                <h3 class="heading">Control y Tracción</h3>
                                            </a>
                                        </article>
                                    </div> <!--termina col-lg-4 -->

                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <br>
                                        <article class="one_third first">
                                            <a href="servicio_diag_compt.php#airbag">
                                                <i><img src="img/servicios/airbag.png"></i>
                                                <h3 class="heading">Sistema Airbag</h3>
                                            </a>
                                        </article>
                                        <br>
                                        <article class="one_third first">
                                           <br><br>
                                            <a href="servicio_diag_compt.php#carroceria">
                                                <i><img src="img/servicios/carroceria.png"></i>
                                                <h3 class="heading">Módulos de Carrocería</h3>
                                            </a>
                                        </article>
                                    </div> <!--termina col-lg-4 -->
                                </section> <!--termina parallax-->
                            </div> <!--termina intro -->
                        </div> <!--termina overlay-->
                    </div> <!--termina wrapper -->
                </div>


                <!--====================================================================================-->
                <div class="sepServicios portfolioServicios" data-stellar-background-ratio="0.5" id="envios">
                    <div class="wrapper row3 bgded">
                        <div class="overlay">
                            <div id="intro" class="clear">
                                <section class="parallax">
                                    <div class="col-lg-12 col-md-12 col-xs12">
                                       <br><br>
                                        <article class="one_third first">
                                            <a href="servicio_grua.php">
                                                <i><img src="img/servicios/grua.png"></i>
                                                <h3 class="heading">Grúa</h3>
                                            </a>
                                        </article>
                                        <br>

                                    </div> <!--termina col-lg-12 -->
                                </section> <!--termina parallax -->
                            </div> <!--termina intro -->
                        </div> <!--termina overlay-->
                    </div> <!--termina wrapper -->
                </div>

            </section> <!--termina col-lg-12 -->
        </div> <!--termina tiraCentral -->


        <!-- =========================================================================================== -->
        <div class="espacio"></div>
        <?php
        footerSitioNormal();
        ?>
        <!-- ========================================================================================= -->

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <!-- ------------------------------- para el scroll-------------------------- -->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        <script type="text/javascript" src="js/SmoothScroll.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                /*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
        </script>
    </body>
</html>