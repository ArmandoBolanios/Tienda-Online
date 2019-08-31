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
					<!-- /.col -->
					<div class="col-md-9">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Pedidos que realizaste</h3>
								<input type="hidden" id="idCliente" value="<?php echo $idCliente; ?>" >
								<br><br>
								<!-- =============================================================== -->
								<div id="loader" class="text-center"> <img src="img/gif/load.gif"></div>
								<div class="outer_div"></div><!-- Datos ajax Final -->
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
		<script type="text/javascript">
			$(document).ready(function(){
				load(1);
			});

			function load(page){
				var idCliente = $('#idCliente').val(); //input tiene el idCliente
				var parametros = {"action":"ajax","page":page, "idCliente": idCliente};
				$("#loader").fadeIn('slow');
				$.ajax({
					url:'php/cart_order.php',
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