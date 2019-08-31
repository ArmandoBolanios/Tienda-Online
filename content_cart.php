<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Carrito</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/estilos.css"       type="text/css">
        <link rel="stylesheet" href="css/estilosTablas.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css"    type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">

        <script src="js/jquery-3.2.1.min.js"></script>
    </head>

    <body>

        <?php
        if(isset($_SESSION['user_id'])) {
            $page='cart'; include 'php/lib-sitio_ok.php';

        } else {
            $page='cart'; include 'php/lib-sitio.php';
        }
        ?>
        <div class="espacio"></div>
        <div class="container tiraPrincipal">
            <div class="col-lg-6 hidden-sm hidden-xs ">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li class=""><a href="index_ok.php"><i class="fa fa-home"></i> Inicio</a></li>
                    <li class=""><a href="venta_refacciones.php"><i class="fa"></i> Refacciones</a></li>
                    <li class="active"><span> Carrito</span></li>
                </ol>
            </div> <!--termina section col-lg-6 -->
        </div> <!--termina tiraPrincipal -->
        <div class="espacio"></div>
        <!-- ====================================================================================================-->

        <div class="container tiraPrincipal">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <h3 class="panel-title">Carrito</h3>
                                </div> <!--end col-xs-6 -->
                            </div> <!--termina row -->
                        </div> <!--termina heading-->

                        <style>
                            .negrita{font-weight: bold; text-align: center;}
                            .textoDescrip {
                                text-align: justify;
                            }
                            .textoMoneda {
                                text-align: center;
                            }
                        </style>
                        <div class="panel-body table-responsive" id="order_table">
                            <table class="table table-striped table-bordered table-list table-hover">
                                <thead >
                                    <tr>
                                        <th data-column-id="commands" data-formatter="commands" class="col-tools">
                                            <span class="fa fa-camera" aria-hidden="true"></span>
                                        </th>
                                        <th class="hidden">idArticulo</th>
                                        <th class="negrita">Clave Articulo</th>
                                        <th class="hidden">Clave Alterna</th>
                                        <th class="negrita">Descripción</th>
                                        <th class="negrita">Precio</th>
                                        <th class="negrita">Unidades</th>
                                        <th class="negrita">Subtotal</th>
                                        <th class="negrita">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="tamanio_resumen">
                                    <?php
                                    if(!empty($_SESSION["shopping_cartMT"])) {
                                        $total = 0;
                                        foreach($_SESSION["shopping_cartMT"] as $keys => $values)  {
                                    ?>
                                    <tr>
                                        <td align="center"><img class="img-responsive" src="admin/aplicacion/img_articulos/<?php echo $values["product_image"]; ?>" width="50px" height="50px" style="border:1px solid #585858;"></td>
                                        <td class="hidden"><?php echo $values["product_id"]; ?></td>
                                        <input type="hidden" name="Articulo" id="Articulo" value="<?php echo $values["product_id"]; ?>" />
                                        <td class="">            <?php echo $values["product_codArticulo"]; ?> </td>
                                        <td class="hidden"><?php echo $values["product_codAlterno"]; ?></td>
                                        <td class="textoDescrip"><?php echo $values["product_descrip"]; ?></td>
                                        <td class="textoMoneda">$ <?php echo $values["product_price"]; ?></td>
                                        <td class="col-lg-2">
                                            <input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" onKeyPress="return soloNumeros(event)" />
                                            <span id="Inform"></span>
                                        </td>

                                        <td class="textoMoneda" align="right">$
                                            <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?>
                                        </td>

                                        <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remover</button> </td>
                                    </tr>

                                    <?php  
                                            $total = $total + ($values["product_quantity"] * $values["product_price"]);
                                            $cantidadArticulos = count($_SESSION["shopping_cartMT"]);

                                        }//end foreach
                                    ?>

                                    <tr>
                                        <td colspan="5" align="right">Total</td>
                                        <td class="textoMoneda">$ <?php echo number_format($total, 2); ?></td>
                                        <td align="center"> <?php echo $cantidadArticulos; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">
                                            <div class="col-lg-9 col-md-3 col-xs-3">
                                                <a href="venta_refacciones.php"><h5>Seguir comprando</h5></a>
                                            </div>
                                            <form method="POST" action="check_out_cart.php">  
                                                <input type="submit" name="check_out" class="btn btn-warning" 
                                                       value="Proceder Compra" id="proceder_compra"/>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    } //end !empty
                                    else {
                                        echo '
									<script type="text/javascript">
									$(document).ready(function(){
										swal({
										title: "¡No hay articulos en el carrito!",
										text: "Te invitamos a ver nuestro almacén",
										type: "info",
										showLoaderOnConfirm: true
										}, function () {
										setTimeout(function () {
										window.location="venta_refacciones.php";
										}, 200

										);
										});

									});
									//window.location="venta_refacciones.php";
									</script>
									';

                                    } //end else
                                    ?>
                                </tbody> 

                            </table> <!--end table striped-->
                        </div> <!--end panel-body -->
                    </div> <!--termina panel default-table -->
                </div> <!--end class="col-lg-12"-->
            </div> <!--end class="row"-->
        </div> <!--end tiraPrincipal -->

        <!-- ============================================================================================================================================---->

        <?php footerSitio(); ?>
        <!-- ======================================================================-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="js/cart_2.js"></script>

        <script>
            /*ACEPTAR SÓLO NÚMEROS*/
            function soloNumeros(e) {
                var key = window.Event ? e.which : e.keyCode;
                return ((key >= 48 && key <= 57) ||(key==8))
            }
        </script>
        <script type="text/javascript" src="js/jarallax.js"></script>
        <script type="text/javascript">
            /* init Jarallax */
            $('.jarallax').jarallax({
                speed: 0.5,
                imgWidth: 1366,
                imgHeight: 768
            })
        </script>
    </body>
</html>
