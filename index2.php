<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index_ok.php");
}else {
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/header.css" type="text/css"/>
        <link rel="stylesheet" href="css/responsive.css" type="text/css"/>

        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css">

        <link rel="stylesheet" href="css/style_slider.css" type="text/css">
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: true,
                    speed: 1000, /*velocidad del slider*/
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
            });
        </script>
    </head>
    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-whatsapp"></i> 7574773051</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> montecarlo.refacciones@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="https://www.facebook.com/Montecarlo-Automotriz-867296540033474/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->
            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="logo pull-left ">
                                <a href="index.html"><img src="img/index/logo_montecarlo2.png" alt="NO-IMG"/></a>
                            </div>
                            <a href="index.php" class="logo espacio_logo">Monte' <span class="lite">Carlo</span></a>
                        </div>
                        <div class="col-sm-6">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="content_cart.php">Carrito 
                                        <span class="badge"><?php if(isset($_SESSION["shopping_cartMT"])) { echo count($_SESSION["shopping_cartMT"]); } else { echo '0';}?></span>
                                        </a></li>
                                    <li><a href="cliente_login.php"><i class="fa fa-lock"></i> Inicia sesión</a></li>
                                    <li><a href="cliente_registrar.php"><i class="fa fa-lock"></i> Regístrate</a></li>
                                    <li><a href="socios/login.php"><i class="fa fa-lock"></i> Socios</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->
            <!-- -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="sr-only">Desplegar / Ocultar Menú</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> <!-- corresponde al logo -->

                    <!-- inicia el MENU -->
                    <div class="collapse navbar-collapse large" id="navbarCollapse">
                        <ul class="nav navbar-nav">
                            <!--<li class=""><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li> -->
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="venta_refacciones.php"><i class=""></i>Refacciones</a></li>
                            <li><a href="todos_servicios.php"><i class=""></i>Servicios</a></li>
                            <li><a href="promociones.php"><i class=""></i>Promociones</a></li>				
                        </ul> <!-- termina ulnavbar -->
                    </div> <!--termina el MENU -->
                </div> <!--agrega movimeinto al MENU -->
            </nav> <!--todo el MENU -->
        </header><!--/header-->

        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slide-1.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                        <div class="slider-info w3ls-1">
                            <h3>Bienvenido a Monte'Carlo Automotriz</h3>
                            <div class="underline"></div>
                            <p>Tienda oficial online</p>

                        </div>
                    </li>
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slider-promocion5.png" class="img-responsive" alt="Manufactory">
                        </div>
                    </li>
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slider-promocion3.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                    </li>
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slider-promocion4.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                    </li>
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slider-promocion2.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                    </li>
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slide-5.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                        <div class="slider-info w3ls-1">
                            <h3>Obtén nuestros mejores servicios</h3>
                            <div class="underline"></div>
                            <p>Visítanos ahora</p>

                        </div>
                    </li>
                </ul>

            </div>
            <div class="clearfix"></div>
        </div> <!--end slider -->
        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            //

        </script>
    </body>
</html>


<?php    
      }
?>