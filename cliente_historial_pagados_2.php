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
		<title>Lista de compras realizadas</title>

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
					$page2 = 'compras';
					include 'php/lib-menu_cliente.php';
					?>
					<!-- consulta para las compras finalizadas -->
					<?php
					$idVenta = $_GET['idVenta'];
					$total = 0;
					$consultaPagados = "
					SELECT DISTINCT detalle_venta.idVenta, detalle_venta.idArticulo,
					detalle_venta.unidades, detalle_venta.precioDeVenta,
					detalle_venta.subTotal,
					imagen.nombreImagen
					FROM detalle_venta
					INNER JOIN articulo
					ON articulo.idArticulo = detalle_venta.idArticulo
					INNER JOIN imagen
					ON imagen.idArticulo = articulo.idArticulo
					WHERE idVenta = '$idVenta';

					";
					$consultaPagadoOk = mysqli_query($ConexionBD, $consultaPagados);
					?>
					<div class="col-md-9">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Clave de compra: <?php echo $idVenta; ?></h3>
								<br><br>
								<?php
								$i=1;
								while($fila = mysqli_fetch_array($consultaPagadoOk)) {
								?>
								<h4><?php echo $i .'. ' ?>Producto: <?php echo $fila['nombreImagen'];?></h4>
								<p>Unidades: <?php echo $fila['unidades']; ?></p>
								<p>Costo: <?php echo $fila['precioDeVenta']; ?></p>
								<p>Subtotal: <?php echo $fila['subTotal']; ?></p>
								<?php $i++; ?>
								<section class="post"></section>
								<?php
									$total = $total + ($fila['unidades'] * $fila['precioDeVenta']);
									$totalFin = $total + 90;
								}
								?>

								<br>

								<p>Se aplicaron costos de envío +$90.00</p>
								<h5 class="text-success">Total: $ <?php echo number_format($totalFin, 2); ?></h5>
								<section class="post"></section>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php footerSitio(); //pie de pagina?>

		<!-- =======================================================================================================================================================-->

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- sirve para minimizar el menu del cliente -->
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