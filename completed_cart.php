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

		<title>Fin de la compra</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="css/estilos.css"        type="text/css">
		<link rel="stylesheet" href="css/estilosTablas.css" type="text/css">
		<link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
		<link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
		<link rel="stylesheet" href="css/font-awesome.css">

		<link rel="stylesheet" href="css/style_slider.css" type="text/css">
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

	</head>
	<body>
		<?php
		if(isset($_SESSION['user_id'])) {
			$page='cart'; include 'php/lib-sitio_ok.php';

		} else {
			$page='cart'; include 'php/lib-sitio.php';
		}
		?>
		<?php contenidoSitio(); ?>
		<!-- ==================================================================================================-->
		<br>
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="slider-img">
							<img src="img/slider_promociones/slide-4.jpg" class="img-responsive" alt="Manufactory">
						</div>
						<div class="slider-info w3ls-1">
							<h3>ÉXITO</h3>
							<div class="underline"></div>
							<h3>Tu compra ha sido procesada, esperamos tu pago.</h3>
						</div>
					</li>
					<li>
						<div class="slider-img">
							<img src="img/slider_promociones/slide-5.jpg" class="img-responsive" alt="Manufactory">
						</div>
						<div class="slider-info w3ls-1">
							<h3>No olvides revisar tu correo electrónico</h3>
							<div class="underline"></div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!--end slider -->

		<!-- ==================================================================================================-->
		<br>
		<div class="about">
			<div class="container tiraCentral">
				<div class="w3-welcome-heading">
					<h3>Compra Exitosa</h3>
				</div>
				<section class="post"></section>

				<div class="col-md-6">
					<h4>Estimado cliente, tu orden fue recibida correctamente.</h4>
					<h4>En breve recibirás un correo con la información detallada de tu orden.</h4>
				</div>
			</div>
		</div>
				
		<!-- ======================================================================= -->
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