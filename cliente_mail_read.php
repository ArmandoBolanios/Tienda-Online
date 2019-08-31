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
		<title>Mensaje</title>

		<link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos.css"   type="text/css">
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

		<!-- ===============================================================================================================================================-->

		<?php contenidoSitio(); ?>

		<br><br><br><br>

		<!-- =====================================================================================================================================================-->
		<div class="container tiraPrincipal">
			<section class="content">
				<div class="row">
					<?php 
					$page2='mail';
					include 'php/lib-menu_cliente.php';
					?>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Mensaje</h3>

								<div class="box-tools pull-right">
									<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
									<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<div class="mailbox-read-info">
									<h3>Operador</h3>
									<h5>De: montecarlo.refacciones@gmail.com
										<?php $fechaMensaje = $_GET['fechaDeRegistro']; 
										echo '
										<span class="mailbox-read-time pull-right">'.$fechaMensaje.'</span>
										';
										?>
									</h5>
								</div>
								<!-- /.mailbox-read-info -->
								<div class="mailbox-controls with-border text-center">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
											<i class="fa fa-trash-o"></i></button>
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
											<i class="fa fa-reply"></i></button>
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
											<i class="fa fa-share"></i></button>
									</div>
									<!-- /.btn-group -->
									<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
										<i class="fa fa-print"></i></button>
								</div>
								<!-- /.mailbox-controls -->
								<div class="mailbox-read-message">
									<?php
									$query = $ConexionBD->query("SELECT buzon_cliente.operador, buzon_cliente.mensaje, buzon_cliente.fechaDeRegistro, nombre, apellidoPaterno
									FROM cliente
									INNER JOIN buzon_cliente
									WHERE cliente.idCliente = buzon_cliente.idCliente
									AND cliente.idCliente = '$idCliente' AND fechaDeRegistro='$fechaMensaje' ");
									while($row = $query->fetch_assoc()) {
										echo '
										<p>Hola '.$row['nombre'].' '.$row['apellidoPaterno'].'
										<p aling="justify">'.$row['mensaje'].'</p>

										';
									}
									//update ...
									$updateBuzon = "UPDATE buzon_cliente SET aux= '2' WHERE idCliente= '$idCliente' 
									AND aux= '1' AND fechaDeRegistro = '$fechaMensaje' ";
									$result1 = mysqli_query($ConexionBD, $updateBuzon);
									?>
									<p align="justify">Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwaveput
										a bird
										on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
										master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
										gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
										asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
										blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
										Apparel.</p>
									<br>
									<p>No responder a este mensaje</p>
									<p>Gracias</p>
								</div> <!-- /.mailbox-read-message -->
							</div> <!-- /.box-body -->

							<!-- /.box-footer -->
							<div class="box-footer">
								<div class="pull-right">
									<a href="cliente_mail.php"><button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Regresar</button>
									</a>
								</div>
								<button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
								<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
							</div>
							<!-- /.box-footer -->
						</div>
						<!-- /. box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</div>

		<!-- =======================================================================================================================================================-->

		<?php footerSitio(); //pie de pagina?>

		<!-- =======================================================================================================================================================-->

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
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