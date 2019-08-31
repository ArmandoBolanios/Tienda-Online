<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index_ok.php");
} // end IF
else { ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Inicio</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/estilos.css"        type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css">
        <link rel="stylesheet" href="css/font-awesome.css">

        <link rel="stylesheet" href="css/style_slider.css" type="text/css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/comboxBuscador.js"> </script>
        <script src="js/jquery-2.1.4.min.js"></script>
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

        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
        <link href="css/owl.theme.css" rel="stylesheet">

    </head>

    <body>
        <?php
    if(isset($_SESSION['user_id'])) {
        $page='inicio'; include 'php/lib-sitio_ok.php';    
    } else {
        $page='inicio'; include 'php/lib-sitio.php';
    }
        ?>
        <?php contenidoSitio(); ?>
        <!-- ==================================================================================================-->
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
                            <img src="img/slider_promociones/slider-promocion42.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                    </li>
                    <li>
                        <div class="slider-img">
                            <img src="img/slider_promociones/slider-promocion6.jpg" class="img-responsive" alt="Manufactory">
                        </div>
                    </li>
                </ul>

            </div>
            <div class="clearfix"></div>
        </div> <!--end slider -->
        <!-- ======================================================================================================== -->
        <div class="container tiraPrincipal">
            <section id="textoMayus" class="titulo tituloServicio">
                <h3><span>Destacados</span></h3>
            </section>
            <div class="agileinfo-about-slide">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    <?php  require_once "php/articuloDestacados.php"; ?>
                </div>
            </div>
        </div> <!--termina detacados -->
        <!-- ============================================================ -->
        <div class="pequenio_espacio"></div>
        <?php include "php/modalBuscar.php"; ?>
        <div class="container tiraPrincipal">
            <div class="agileinfo-about-slide busca">
                <button type="button" class="btn btn-default btn-lg  subs-btn" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-search"></span>
                    Vehiculo
                </button>
            </div>
        </div>
        <div class="pequenio_espacio"></div>
        <!-- ===================================================================================================================================-->
        <div class="container tiraPrincipal">
            <section class="col-lg-12 col-md-12 col-xs-12">
                <div class="sep portfolio" data-stellar-background-ratio="0.5">
                    <div class="pequenio_espacio"></div>
                    <div class="ofertita">
                        <div class="text-center"><div id="typer"></div></div>
                    </div>
                    <div class="espacio"></div><div class="espacio"></div>
                    <img src="img/index/baner5.png" class="img-responsive mapita">
                    <div class="espacio"></div><div class="espacio"></div>
                    <div class="espacio"></div><div class="espacio"></div>
                </div>
            </section>
        </div> <!--termina tiraPrincipal -->
        <!-- ============================================================================================================================= -->
        <div class="pequenio_espacio"></div>
        <div class="container tiraPrincipal">
            <section id="textoMayus" class="titulo tituloServicio">
                <h3><span>Servicios</span></h3>
            </section>
            <!-- agileinfo -->
            <div class="container">
                <div class="flexslider-info">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="banner-info">
                                        <div class="col-md-7 agileinfo-left">
                                            <img src="img/slider_promociones/slider_mini-1.jpg" alt="">
                                        </div>
                                        <div class="col-md-5 agileinfo-grid grid-one">
                                            <h4>Servicios de Taller Mecánico</h4>
                                            <p>Motor<br>Transmisión<br>Suspensión<br>Frenos</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-info">
                                        <div class="col-md-7 agileinfo-left">
                                            <img src="img/slider_promociones/slider_mini-3.jpg" alt="">
                                        </div>
                                        <div class="col-md-5 agileinfo-grid grid-one">
                                            <h4>Diagnóstico por Computadora</h4>
                                            <p>Sistema de motor, Sistema de transmisión<br>Sistema de carrocería,
                                            Sistema de dirección</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="banner-info">
                                        <div class="col-md-7 agileinfo-left">
                                            <img src="img/slider_promociones/slider_mini-2.jpg" alt="">
                                        </div>
                                        <div class="col-md-5 agileinfo-grid grid-one">
                                            <h4>Servicio de grúa</h4>
                                            <p>Sólo autos descompuestos (no accidentes)
                                                <br>(757) 476 7014
                                                <br>Horario de Taller<br>
                                                9:00 a 18:00 hrs. </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- ===================================================================================== -->
        <div class="espacio"></div><div class="espacio"></div>
        <!-- =====================================================================================-->
        <div class="container tiraPrincipal">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <img src="img/promo_ofertas/promo8.jpg" class="img-responsive">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <img src="img/promo_ofertas/promo11.jpg" class="img-responsive">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <img src="img/promo_ofertas/promo9.jpg" class="img-responsive">
                </div>
            </div>
        </div>
        <!-- ====================================================================================-->
        <div class="about">
            <div class="container tiraMarcas">
                <section class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <section id="textoMayus" class="titulo tituloServicio">
                        <h3><span>Marcas</span></h3>
                    </section>
                    <!--efectos de las imagenes -->
                    <div class="pic">
                        <img src="img/index/marcas/Chevrolet_logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/Chrysler-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/daihatsu-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/Ford-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/seat-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/jeep-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/lexus-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/Mazda-Logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/Nissan-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/ram-truck-logo.jpg" class="pic-image" alt="NMO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/Renault-logo.png" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/honda-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/toyota-logo.png" class="pic-image" alt="NO-IMG">
                    </div>

                    <div class="pic">
                        <img src="img/index/marcas/volkswagen-cars-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>
                    <div class="pic">
                        <img src="img/index/marcas/lexus-logo.jpg" class="pic-image" alt="NO-IMG">
                    </div>
                </section> <!-- termina section col-lg-7 -->
            </div> <!-- termina tiraMarcas -->
        </div> <!--end class="about" -->
        <div class="about espacio"></div>

        <?php footerSitio(); ?>
        <!-- ======================================================================-->

        <script src="js/bootstrap.min.js"></script>

        <!--FlexSlider-->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>

        <script src="js/owl.carousel.js"></script>   <!--agregado 15/ag-2017-->

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
        <script type="text/javascript" src="js/jarallax.js"></script>
        <script type="text/javascript" src="js/SmoothScroll.min.js"></script>
        <script type="text/javascript">
            /* init Jarallax */
            $('.jarallax').jarallax({
                speed: 0.5,
                imgWidth: 1366,
                imgHeight: 768
            })
        </script>
        <script type="text/javascript">
            /* init Jarallax */
            $('.sep').jarallax({
                speed: 0.5,
                imgWidth: 1366,
                imgHeight: 768
            })
        </script>

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
        <script type="text/javascript" src="js/jquery.typer.js"></script>
        <script>
            var win = $(window),
                foo = $('#typer');

            foo.typer(['Realizamos envíos a todo México', 'Revisa nuestras promociones', 'Visítanos, te atenderemos de la mejor manera','Tenemos las mejores refacciones']);

            // unneeded...
            win.resize(function(){
                var fontSize = Math.max(Math.min(win.width() / (1 * 10), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));

                foo.css({
                    fontSize: fontSize * .2 + 'px'
                });
            }).resize();
        </script>
    </body>
</html>
<?php
} //end ELSE
?>