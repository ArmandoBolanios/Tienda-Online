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

        <title>Promociones</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"       type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/cm-overlay.css" type="text/css">
    </head>

    <body>
        <?php 
        if(isset($_SESSION['user_id'])) {
            $page='promociones'; include 'php/lib-sitio_ok.php';    
        } else {
            $page='promociones'; include 'php/lib-sitio.php';
        }

        ?>
        <?php contenidoSitio(); ?>

        <!-- ===================================================================================================-->
        <br><br><br>
        <div class="container tiraCentral">
            <div class="row">
                <div class="col-lg-6">
                    <ol class="breadcrumb breadcrumb-arrow">
                        <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active"><span>Promociones</span></li>
                    </ol>
                </div>
            </div>
        </div> <!--termina tiraCentral -->
        <!-- ========================================================================================================-->

        <div class="container tiraCentral">
            <div class="row">
                <section class="col-lg-4 col-md-4 col-xs-4">
                    <aside>
                        <img class="img-responsive" src="img/promo_ofertas/edecan_sexy2.png">
                    </aside>
                    <aside>
                        <img class="img-responsive" src="img/promo_ofertas/oferta.jpg">
                    </aside> <aside>
                    <img class="img-responsive" src="img/promo_ofertas/oferta2.jpg">
                    </aside>
                </section>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div id="loader" class="text-center"> <img src="img/gif/load.gif"></div>
                    <div class="outer_div"></div><!-- Mostrar datos vía ajax -->                   
                </div>
            </div>
        </div>
        <div class="espacio"></div>
        <style>.tamanioImagenLista{width: 800px;height: 400px;}</style>
        <!-- ===================================================================================================-->
        <?php footerSitioNormal(); ?>

        <!-- ====================================================================================================-->

        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                load(1);
            });
            function load(page){
                var parametros = {"action":"ajax","page":page};
                $("#loader").fadeIn('slow');
                $.ajax({
                    url:'php/lista_promociones.php',
                    data: parametros,
                    beforeSend: function(objeto){
                        $("#loader").html("<img src='img/gif/load.gif'>");
                    },
                    success:function(data){
                        $(".outer_div").html(data).fadeIn('slow');
                        $("#loader").html("");
                    }
                })
            }
        </script>
		
        <script src="js/jquery.mobile.custom.min.js"></script>
        <script src="js/jquery.cm-overlay.js"></script>
    </body>
</html>