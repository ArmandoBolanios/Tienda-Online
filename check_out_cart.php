<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $idCliente = $_SESSION['user_id'];
} else {
    header("Location: cliente_registrar.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vista del carrito</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="css/check_out_cart.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css" type="text/css">
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
                    <li class=""><a href="content_cart.php"><i class="fa"></i> Carrito</a></li>
                    <li class="active"><span> Proceder compra</span></li>
                </ol>
            </div> <!--termina section col-lg-6 -->
        </div>
        <div class="espacio"></div>
        <?php include 'connections/conexion.php'; ?>

        <div class="container tiraPrincipal">
            <div class="row">
                <div class="col-lg-12 tamanio_resumen">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>1. Información del cliente</h3>
                                <div class="clearfix"></div>
                            </div><!-- end x_title -->
                            <div class="x_content">
                                <div class="dashboard-widget-content">
                                    <ul class="list-unstyled timeline widget">
                                        <li>
                                            <div class="block">
                                                <div class="block_content">
                                                    <h3 class="title"><span class="fa fa-user"></span> Verifica tus datos</h3>
                                                    <br>
                                                    <?php
                                                    $queryNombreImg = $ConexionBD->query("SELECT nombre, apellidoPaterno, apellidoMaterno,calle, numeroInterior, numeroExterior, colonia,
                                                    delegacion, estado, telefono, cliente_telefono.aux FROM cliente INNER JOIN cliente_direccion 
                                                    ON cliente.idCliente = cliente_direccion.idCliente and cliente_direccion.idCliente = '$idCliente' 
                                                    INNER JOIN cliente_telefono
                                                    ON  cliente_telefono.idCliente = cliente.idCliente and cliente_telefono.aux='1';");
                                                    while($rows = mysqli_fetch_array($queryNombreImg)) {
                                                    ?>
                                                    <p>Nombre:
                                                        <?php echo $rows['nombre'].' '.$rows['apellidoPaterno'].' '.$rows['apellidoMaterno']; ?>
                                                    </p>
                                                    <p>Estado: <?php echo $rows['estado']?></p>
                                                    <p>Ciudad:
                                                        <?php echo $rows['delegacion']?></p>
                                                    <p>Colonia: <?php echo $rows['colonia']?></p>
                                                    <p>Calle:
                                                        <?php echo $rows['calle'].' '.$rows['numeroInterior'].' - '.$rows['numeroExterior']?>
                                                    </p>
                                                    <p>Teléfono: <?php echo $rows['telefono']?></p>
                                                    <?php
                                                    }
                                                    ?>

                                                </div><!-- end block_content -->
                                            </div><!-- end class="block" -->
                                        </li>
                                    </ul><!-- end ul -->
                                </div><!-- end dashboard-widget-content -->
                            </div><!-- x_content -->
                        </div><!-- end x_panel -->
                    </div><!--end col-lg-4 -->
                    <!-- -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>2. Forma de pago</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="dashboard-widget-content">
                                    <ul class="list-unstyled timeline widget">
                                        <li>
                                            <div class="block">
                                                <div class="block_content">
                                                    <h3 class="title"><span class="fa fa-bank"></span> Depósito bancario</h3>
                                                    <br>
                                                    <p align="justify">Una vez hayas finalizado la compra, en breve enviaremos a tu correo el número de cuenta para realizar tu pago.</p>
                                                    <p align="justify">Los depósitos en efectivo puedes realizarlos en cualquier sucursal Banamex</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col-md-4 -->
                    <!-- -->
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>3. Resumen de la orden</h3>
                                <div class="clearfix"></div>
                            </div><!-- end x_title -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <br>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><h4>Artículo</h4></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><h4>Cantidad</h4></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><h4>Precio</h4></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><h4>Subtotal</h4></div>
                                </div><!--end col-lg-12-->
                            </div><!-- end row -->
                            <?php
                            if(!empty($_SESSION["shopping_cartMT"])) {
                                $total = 0;
                                $totalArticulos = 0;
                                foreach($_SESSION["shopping_cartMT"] as $keys => $values)  {
                            ?>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <img class="img-responsive" src="admin/aplicacion/img_articulos/<?php echo $values["product_image"];?>" >
                                        <br>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <p align="center">
                                            <?php echo $values["product_quantity"]; ?>
                                        </p>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <p>$
                                            <?php echo $values["product_price"]; ?></p>
                                    </div><!-- end col-lg-5 -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <p>$<?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></p>
                                    </div><!-- end col-lg-5 -->
                                </div><!-- end col-lg-12 -->
                            </div><!-- end class="row" -->
                            <?php
                                    $total =  	$total + ($values["product_quantity"] * $values["product_price"]);
                                    $totalFin = $total;
                                    $cantidadArticulos = count($_SESSION["shopping_cartMT"]);
                                    $totalArticulos = $totalArticulos +($values['product_quantity']);
                                } //end foreach
                            ?>
                            <section class="post"></section>
                            <div class="row tamanio_resumen">
                                <div class="col-lg-12">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                        <p>Articulos: </p>
                                        <!-- <p>Subtotal (carrito)</p> -->
                                        <p>Total a pagar:</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <p>
                                            <?php echo $totalArticulos; ?>
                                        </p>
                                        <!-- <p>$ <?php echo number_format($total, 2); ?>
</p> -->
                                        <p>$ <?php echo number_format($totalFin, 2); ?>
                                        </p>
                                    </div><!--end col-lg-5 -->
                                </div><!-- end col-lg-12 -->
                            </div><!-- end row -->
                            <!-- -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                                        <input type="submit" name="place_order" class="btn btn-info form-control" value="Finalizar Compra" />
                                        <input type="hidden" name="totalGeneral" value="<?php echo number_format($totalFin, 2); ?>" class="form-control">
                                    </form>
                                </div><!-- end col-lg-12 -->
                            </div><!--end row -->
                            <?php
                            } //end SESSION['shopping_cart'];
                            ?>
                        </div><!-- end x_panel -->
                    </div><!-- end class="col-md-4" -->
                </div><!-- end class="col-lg-12"-->
            </div><!-- end class="row" -->
        </div><!-- end tiraPrincipal -->
        <!-- -->
        <?php
        $queryCorreo = $ConexionBD->query("SELECT nombre, apellidoPaterno, apellidoMaterno,correoElectronico FROM cliente INNER JOIN cliente_correo ON cliente.idCliente = cliente_correo.idCliente AND cliente_correo.idCliente = '$idCliente'");
        while($rox = mysqli_fetch_array($queryCorreo)) {
            $correoCliente  = $rox['correoElectronico'];
            $nombre         = $rox['nombre'];
            $ap             = $rox['apellidoPaterno'];
            $am             = $rox['apellidoMaterno'];
        }
        ?>
        <!------------------------- -->
        <?php
        if (isset($_POST['place_order'])) {
            require 'php/lib-generadorID.php';
            require('funciones/encrypt/SED.php');
            // --------------------------------

            $idCarrito 	= mysqli_real_escape_string($ConexionBD,  generarIDCARRITO());
            $idSesion 	= mysqli_real_escape_string($ConexionBD,  generarIDSESSION());
            $idVenta  	= mysqli_real_escape_string($ConexionBD,  generarIDVENTA());
            $codigoVenta= mysqli_real_escape_string($ConexionBD,  codigoVenta());
            $numCuenta  = '330651673681';
            //$cantidadArticulos = count($_SESSION["shopping_cartMT"]);

            $order_details = "";
            $orden_id = "";
			
			$insert_orden = "INSERT INTO ordenpedido(idCliente,estatus,fecha)
            VALUES('$idCliente', 'Pendiente', now())";
			
			if(mysqli_query($ConexionBD, $insert_orden)) {
                $orden_id = mysqli_insert_id($ConexionBD);
            }
			
			$_SESSION["orden_id"] = $orden_id;
            $NumeroPedido  = SED::encryption($orden_id);
            $emailCliente  = SED::encryption($correoCliente);
            $nombreCliente = SED::encryption($nombre);
            $apCliente     = SED::encryption($ap);
            $amCliente     = SED::encryption($am);
			
			
            foreach ($_SESSION["shopping_cartMT"] as $keys => $values) {
                
                $sql_cart = "
      						INSERT INTO carrito (idCarrito,idCliente,idSesion,fechaHora,aux) 
							VALUES ('$idCarrito','$idCliente','$idSesion',NOW(),'1')";

                //--------------

                $sql_venta = "
							INSERT INTO venta (idVenta, idCliente, idSesion, totalArticulos, totalVenta, observaciones, 
							fechaDeRegistro, codigoVenta, aux)
							VALUES('$idVenta', '$idCliente', '$idSesion', '$totalArticulos', '$totalFin',
							'PENDIENTE', NOW(), '$codigoVenta', '1')";

                //--------------
                $order_details .= "

							  	INSERT INTO contenido_carrito (idCarrito,idCliente,
								idSesion,idArticulo,codigoArticulo,codigoAlterno,
								costo,unidades,subTotal,fechaDeRegistro,aux)
								VALUES(
									'$idCarrito',
									'$idCliente',
									'$idSesion',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_id"]) . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_codArticulo"]) . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_codAlterno"])  . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_price"])    . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_quantity"]) . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_quantity"]*$values["product_price"]) . "',
									NOW(),
								   '1'
								  );

								INSERT INTO detalle_venta (idVenta, idArticulo, codigoArticulo, codigoAlterno,
								unidades, precioDeVenta, subTotal, fechaDeRegistro, codigoVenta, aux)
								VALUES(
									'$idVenta',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_id"]) . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_codArticulo"]) . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_codAlterno"])  . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_quantity"])    . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_price"]) . "',
									'" . mysqli_real_escape_string($ConexionBD, $values["product_quantity"]*$values["product_price"]) . "',
									NOW(),
									'$codigoVenta',
								   '1'
								  );

                                  INSERT INTO pedidox(idCliente, idVenta, idArticulo, codigoArticulo, codigoAlterno,
                                  precioDeVenta, unidades, subTotal, fechaDeRegistro, aux)
                                  VALUES(
                                  '$idCliente',
                                  '$idVenta',
                                  '" . mysqli_real_escape_string($ConexionBD, $values["product_id"]) . "',
                                  '" . mysqli_real_escape_string($ConexionBD, $values["product_codArticulo"]) . "',
                                  '" . mysqli_real_escape_string($ConexionBD, $values["product_codAlterno"])  . "',
                                  '" . mysqli_real_escape_string($ConexionBD, $values["product_price"]) . "',
                                  '" . mysqli_real_escape_string($ConexionBD, $values["product_quantity"])    . "',
                                  '" . mysqli_real_escape_string($ConexionBD, $values["product_quantity"]*$values["product_price"]) . "',
                                  NOW(),
                                  '1'
                                  );

								  ";
            } //end foreach
            
            if (mysqli_query($ConexionBD, $sql_cart) === true) {
                mysqli_query($ConexionBD, $sql_venta);
                mysqli_multi_query($ConexionBD, $order_details);
                //$orden_id = mysqli_insert_id($ConexionBD);
                //$_SESSION["orden_id"] = $orden_id;
                
                echo ' 
								<script type="text/javascript">
									$(document).ready(function(){
										swal({
										title: "¡Tu compra fué exitosa!",
										text: "Gracias por comprar",
										type: "info",
										showLoaderOnConfirm: true
										}, function () { 
										setTimeout(function () {
										window.open("http://montecarloautomotriz.com/ticket.php?Paid='.$NumeroPedido.'&Car='.$idCarrito.'&Client='.$idCliente.'&email='.$emailCliente.'&nombre='.$nombreCliente.'&AP='.$apCliente.'&AM='.$amCliente.'", "_blank");
                                        window.location.href="completed_cart.php";
										}, 100
										);
										});
									});
								</script>
							';

                unset($_SESSION["shopping_cartMT"]);
            } else {
                die('Error SQL: ' . mysqli_error($ConexionBD));
            } //termina la insercion para el carrito on-line
        } //end isset

        ?>
        <!-- -->
        <div class="espacio"></div>
        <?php footerSitio(); ?>
        <!-- ======================================================================-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="js/cart_2.js"></script>
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