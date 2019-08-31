<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $idCliente = $_SESSION['user_id'];

} else {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historial pedidos</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"   type="text/css">
        <!-- estilos menu del cliente -->
        <link rel="stylesheet" href="css/menu_cliente.min.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
    </head>
    <body>
        <?php
        if(isset($_SESSION['user_id'])) {
            $page='perfil_cliente'; 
            include 'php/lib-sitio_ok.php';
            include 'php/lib-generadorID.php';
            include 'connections/conexion.php';
        } else {
            $page='inicio'; include 'php/lib-sitio.php';
        }
        ?>

        <!-- =======================================================================================================================================================-->

        <?php contenidoSitio(); ?>

        <br><br><br><br>

        <!-- =======================================================================================================================================================-->
        <div class="container tiraPrincipal">
            <section class="content">
                <div class="row">
                    <?php
                    $page2='pedidos';
                    include 'php/lib-menu_cliente.php';
                    ?>

                    <!-- consulta para los pedidos -->
                    <?php 
                    $idCarrito = $_GET['idCarrito'];
                    $total = 0;
                    $consultaPedidos =  "
					SELECT DISTINCT contenido_carrito.idCarrito, contenido_carrito.idCliente, 
					contenido_carrito.idArticulo,
					contenido_carrito.costo, contenido_carrito.unidades, contenido_carrito.subTotal,
					imagen.nombreImagen
					FROM contenido_carrito 
					INNER JOIN articulo 
					ON articulo.idArticulo = contenido_carrito.idArticulo
					INNER JOIN imagen
					ON imagen.idArticulo = articulo.idArticulo
					INNER JOIN cliente
					ON contenido_carrito.idCliente = cliente.idCliente
					WHERE contenido_carrito.idCliente = '$idCliente'
					AND contenido_carrito.idCarrito = '$idCarrito';

					";

                    $consultaPedidoSi = mysqli_query($ConexionBD, $consultaPedidos);
                    ?>

                    <div class="col-md-9">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pedido: <?php echo $idCarrito; ?></h3>
                                <br><br>
                                <?php
                                while($fila = mysqli_fetch_array($consultaPedidoSi)) {
                                ?>
                                <h4>Producto: <?php echo $fila['nombreImagen']; ?></h4>
                                <p>Costo: <?php echo $fila['costo']; ?></p>
                                <p>Unidades: <?php echo $fila['unidades']; ?></p>
                                <p>Subtotal: $ <?php echo $fila['subTotal']; ?></p>
                                <section class="post"></section>
                                <?php
                                    $total =  	$total + ($fila["unidades"] * $fila["costo"]);
                                    $totalFin = $total;
                                }
                                ?>
                                <!-- =============================================================== -->
                                <section class="post"></section>
                                <!-- <p>Se aplican costos de envío +$90.00</p> -->
                                <h5 class="text-danger">Total: $ <?php echo number_format($totalFin, 2); ?></h5>
                            </div>
                        </div>
                    </div>


                </div> <!--  end class="row" -->
            </section> <!-- end section class="content" -->
        </div>

        <?php footerSitio(); //pie de pagina?>

        <!-- =======================================================================================================================================================-->

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/menu_cliente.min.js"></script>
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