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
		<title>Perfil Cliente</title>

		<link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
		<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
		<link rel="stylesheet" href="css/estilos.css"   type="text/css">
		<link rel="stylesheet" href="css/menu_cliente.min.css" type="text/css">
		<link rel="stylesheet" href="css/estilosTablas.css" type="text/css">
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
		<div class="espacio"></div>
		<!-- ==========================================================================================================================================-->
		<div class="container tiraPrincipal">
			<section class="content">
				<div class="row">
					<?php 
					$page2='perfil';
					include 'php/lib-menu_cliente.php';
					?>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3>Resumen de tus datos</h3>
								<!-- ============================================================================-->
								<section class="container tiraCentral">
									<div class="col-lg-6 col-md-8 col-xs-8">
										<?php
										$cliente = $ConexionBD->query("SELECT * FROM cliente WHERE idCliente = '$idCliente' ");
										while($fila = mysqli_fetch_array($cliente)) {
										?>
										<h5>Denominacion: <?php echo $fila['denominacion']; ?></h5>
										<h5>Nombre:       <?php echo $fila['nombre']; ?></h5>
										<h5>Apellido Paterno: <?php echo $fila['apellidoPaterno']; ?></h5>
										<h5>Apellido Materno: <?php echo $fila['apellidoMaterno']; ?> </h5>
										<h5>RFC: 		  <?php echo $fila['rfc']; ?> </h5>
										<?php
										}
										?>
									</div>
								</section>

								<!-- ============================================================================-->
								<section class="container tiraCentral">
									<section class="lineaDiv"></section>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
										<h4>Correo electrónico</h4>
										<?php
										$cliente = $ConexionBD->query("SELECT * FROM cliente_correo WHERE idCliente = '$idCliente' ");
										while($fila = mysqli_fetch_array($cliente)){
										?>
										<h5>Correo:      <?php echo $fila['correoElectronico']; ?></h5>
										<?php
										}
										?>
									</div>
								</section>

								<!-- ============================================================================-->
								<section class="container tiraPrincipal">
									<section class="lineaDiv"></section>
									<div class="col-lg-6 col-md-8 col-xs-8">
										<h4>Dirección</h4>
										<?php
										$cliente = $ConexionBD->query("SELECT * FROM cliente_direccion WHERE idCliente = '$idCliente' ");
										while($fila = mysqli_fetch_array($cliente)) {
										?>
										<h5>Calle: <?php echo $fila['calle']; ?></h5>
										<h5>Número Interior: <?php echo $fila['numeroInterior']; ?></h5>
										<h5>Número Exterior: <?php echo $fila['numeroExterior']; ?></h5>
										<h5>Colonia: <?php echo $fila['colonia']; ?></h5>
										<h5>Delegación: <?php echo $fila['delegacion']; ?></h5>
										<h5>Estado:  <?php echo $fila['estado']; ?></h5>
										<h5>Código Postal: <?php echo $fila['codigoPostal']; ?></h5>

										<?php
										}
										?>
									</div>
								</section>

								<!-- ============================================================================-->
								<section class="container tiraPrincipal">
									<section class="lineaDiv"></section>
									<div class="col-lg-6 col-md-8 col-xs-8">
										<h4>Teléfono</h4>
										<?php
										$cliente = $ConexionBD->query("SELECT * FROM cliente_telefono WHERE idCliente = '$idCliente' ");
										while($fila = mysqli_fetch_array($cliente)) {
										?>
										<h5>Teléfono: <?php echo $fila['telefono']; ?></h5>
										<?php
										}
										?>
									</div>
								</section>								
							</div>
						</div>
						<!-- /. box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</div>

		<?php footerSitio(); //pie de pagina?>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrapValidator.min.js"></script>
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