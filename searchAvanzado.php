<?php
require ('connections/conexion.php');
if (!isset($_POST['cbx_Region'])) {
    header("Location: venta_refacciones.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>MonteCarloAutomotriz</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"        type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        <link rel="stylesheet" href="css/font-awesome.css">  
        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">  <!--agregado 15/ag-2017-->
        <link href="css/owl.theme.css" rel="stylesheet">  <!--agregado 15/ag-2017-->
        <link rel="stylesheet" href="css/ihover.css" type="text/css"> <!--agregado 10/07/17--->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/comboxBuscador.js"> </script>
    </head>

    <body >
        <?php 
    if(isset($_SESSION['user_id'])) {
        $page='vref'; include 'php/lib-sitio_ok.php';

    } else {
        $page='vref'; include 'php/lib-sitio.php';
    }
        ?>
        <?php contenidoSitio(); ?>

        <!-- =============================================================-->
        <br><br><br>
        <div class="main container tiraCentral">
            <div class="col-lg-6">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="venta_refacciones.php">Refacciones</a></li>
                    <li class="active"><span>Articulos</span></li>
                </ol>

            </div>

        </div> <!--termina tiraCentral -->
        <!-- =======================================================================================-->
        <div class="container">
            <section class="col-lg-4 col-md-10 col-xs-12">
                <form class="" method="get" action="search.php" target="_top">
                    <div class="input-group">
                        <input class="input form-control" type="text" placeholder="Su Búsqueda" name="q" id="buscar" autocomplete="off" >
                        <span class="input-group-btn">
                            <button class="btn btn-warning"  type="submit"><span class="fa fa-search"></span></button>
                        </span>
                    </div>
                </form>  
            </section>
        </div> <!--termina botón BUSCAR -->

        <div class="container">
            <!---------------------------PRIMERA COMLUMNA---------------------------------------------------------->
            <section class="col-lg-4 col-md-4 col-xs-12" acccion = ""><br> 
                <div id="busquedaAvanz"><h4><span class="glyphicon glyphicon-search"></span>Búsqueda Avanzada</h4></div><br>
                <section class="col-lg-12 col-md-12 col-xs-12 " >
                    <form class="form-horizontal" method="POST" action="searchAvanzado.php" target="_top" name="formBuscarAvanzado">
                        <div class="form-group">
                            <label class="control-label col-sm-1" for="email"></label>
                            <div class="col-sm-10">
                                <?php 
    $query = "SELECT DISTINCT (idRegion) FROM region ORDER BY idRegion";
    $resultado=$ConexionBD->query($query); 
                                ?>

                                <select name="cbx_Region" id="cbx_Region" class="form-control" required >
                                    <option value="0">REGIÓN</option>

                                    <?php 
    while($row = $resultado->fetch_assoc()) {
        $obtenerReg = "select region from region where idRegion = '".$row['idRegion']."' ";
        $resultReg = $ConexionBD->query($obtenerReg);
        $resRegion = $resultReg->fetch_array(MYSQLI_ASSOC);
                                    ?>
                                    <option value="<?php echo $row['idRegion']; ?>"><?php echo $resRegion['region']; ?></option>
                                    <?php } ?>
                                </select>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-1" for="anio"></label>
                            <div class="col-sm-10"> 
                                <select name="cbx_anio" id="cbx_anio" class="form-control" required>
                                    <option value='0'>AÑO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="armad"></label>
                            <div class="col-sm-10"> 
                                <select name="cbx_Armadora" id="cbx_Armadora"  class="form-control block"  required>
                                    <option value='0'>ARMADORA</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="modelo"></label>
                            <div class="col-sm-10"> 
                                <select name="cbx_Modelo" id="cbx_Modelo" class="form-control" required>
                                    <option value='0'>MODELO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="cilindro"></label>
                            <div class="col-sm-10"> 
                                <select name="cbx_Clindro" id="cbx_Cilindro" class="form-control" required>
                                    <option value='0'>CILINDRO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="litro"></label>
                            <div class="col-sm-10"> 
                                <select name="cbx_Litro" id="cbx_Litro" class="form-control" required>
                                    <option value='0' >LITRO</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group"> 
                            <label class="control-label col-sm-1" for="pwd"></label>
                            <div class="col-sm-10 col-sm-10">
                                <button type="submit" class="btn btn-warning btn-block" name="buscarAvanzado" id="buscarAvanzado">Buscar</button>
                            </div>
                        </div>
                    </form>
                </section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <!---------------------TERMINA COMBOX BUSCADOR AVANZADO------------------->
                <aside>
                    <br>
                    <div class="" >
                        <h4 id="ofertas"><span class="glyphicon glyphicon-certificate"></span> Ofertas</h4>
                        <img src="img/promo_ofertas/oferta.jpg" class="img-responsive">
                    </div>
                </aside>
            </section>

            <!-- ----------------SEGUNDA COLUMNA MOSTRAR LOS ARTICULOS------------------------------->
            <section class="col-lg-8 col-md-8 col-xs-8" ><br>
                <div class="form-group" >
                    <div class="row">
                        <div id="lista">
                            <?php include "php/busquedaAvanzada.php"; ?>
                        </div> 
                    </div> 
                </div> 
            </section> <!--termina col-lg-8 -->
        </div>

        <!--CAROUSEL PRODUCTOS MAS VENDIDOS -->

        <div class="container">
            <h3 class="text-center"> D e s t a c a d o s</h3>
            <div class="agileinfo-about-slide">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    <?php  include ("php/articuloDestacados.php"); ?>
                </div>
            </div>
        </div>



        <?php footerSitio(); //pie de pagina ?>
        <!-- ======================================================================================================================================================-->

        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.js"></script>   <!--agregado 15/ag-2017-->

        <script>
            /*-------------------------------------script Product Destacados--------------*/
            $(document).ready(function() { 
                $("#owl-demo").owlCarousel({
                    autoPlay: 3000, //Set AutoPlay to 3 seconds
                    autoPlay:true,
                    items : 3,
                    itemsDesktop : [640,5],
                    itemsDesktopSmall : [414,4]
                });
            }); 
        </script>

    </body>
</html>

<?php } ?>