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

		<title>Taller Mecánico Automotriz</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="css/estilos.css"       type="text/css">
		<link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
		<link rel="stylesheet" href="css/transparency.css"  type="text/css">
		<link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
		<link rel="stylesheet" href="css/font-awesome.css">
	</head>

	<body>
		<?php
		if(isset($_SESSION['user_id'])) {
			$page='servicios'; include 'php/lib-sitio_ok.php';    
		} else {
			$page='servicios'; include 'php/lib-sitio.php';
		}
		?>
		<?php contenidoSitio(); ?>
		<!-- ======================================================================================================================================================-->

		<br>	<br>	<br>
		<section class="main container tiraCentral">
			<div class="col-lg-8 col-md-12 col-xs-12">
				<div class="miga-de-pan">
					<ol class="breadcrumb">
						<li class=""><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
						<li class=""><a href="todos_servicios.php">Servicios</a></li>
						<li class="active">Taller Mecánico Automotriz</li>
					</ol>
				</div> <!--termina miga-de-pan -->
			</div>
		</section> <!--termina tiraCentral -->

		<!-- ======================================================================================================================================================-->

		<section class="main container tiraCentral">
			<div class="col-lg-12 col-md-12 col-xs-12 titulo tituloServicio">
				<section>
					<h3><span>Servicio de Taller Mecánico Automotriz</span></h3>
				</section>
			</div>
		</section>


		<!-- ============================================================-->
		<div class="about" id="afmayor">
			<div class="container tiraPrincipal" >
				<div class="w3-welcome-heading">
					<h3>Afinación Mayor</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/slider_promociones/slider_mini-3.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4>Una afinación Mayor</h4>
						<p align="justify">
							Es vital para mantener el motor y otros componentes trabajando de manera óptima y por mayor tiempo. Con el uso, el motor del auto va desgastando las bujías y los diferentes sistemas de inyección y filtración.
						</p>
						<p>Características:</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Lavado de cuepo de aceleración </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Programación de cuerpo de aceleración</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Lavado de Inyectores por ultrasonido</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Cambio de aceites, bujias y filtros de motor</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>
		
		<!-- =========================================================== -->
		<div class="about" id="afmenor">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Afinación Menor</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/afinacion_menor.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4>Una afinación Menor</h4>
						<p align="justify">
							Cambio de aceite y filtro. Cambio de filtro de aire. Cambio de filtro de gasolina (hay coches en que lo lleva dentro del tanque y no se puede cambiar). Inspección de frenos delanteros y traseros
						</p>
						<p>Caracterícticas:</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Lavado de inyectores por sistema pres</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Cambio de aceite, bujias y filtros de motor</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Chequeo de niveles de dirección, frenos</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Sistema de enfriamiento</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="clutch">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Servicio de Clutch</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/clutch.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4>Clutch</h4>
						<p align="justify">
							Es un sistema que permite tanto transmitir como interrumpir la transmisión de una energía mecánica a su acción final de manera voluntaria. En un automóvil, por ejemplo, permite al conductor controlar la transmisión del par motor desde el motor hacia las ruedas.
						</p>
						<p>Características</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Cambio de plato, disco y collarin o embrague</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Rectificado de volante de motor</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Cambio de aceite a transmición</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Revisión y cambio de bombas hidraúlicas</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Purgado del sistema hidraúlico</li> 
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="repa_motor">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Reparación de Motor</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/reparacion_motor.png" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4>Motor</h4>
						<p align="justify">
							Es la parte sistemática de una máquina capaz de hacer funcionar el sistema transformando algún tipo de energía (eléctrica, de combustibles fósiles, etc.), en energía mecánica capaz de realizar un trabajo. En los automóviles este efecto es una fuerza que produce el movimiento.
						</p>
						<p>Características:</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Anillar el motor</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Reparación de cilindros</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Reparación de blocks</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="frenos">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Servicio de Frenos</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/frenos.png" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4>Frenos</h4>
						<p align="justify">Deben tener capacidad para detener el coche en el menor espacio posible. Además deben tener una buena resistencia a la fatiga y ser fácilmente dosificables. A la hora de una frenada de emergencia lo más habitual es frenar todo lo posible (sobre todo al final), aunque no siempre es lo adecuado, especialmente si no se tiene ABS, que evita que se bloqueen la ruedas, reduciendo la distancia de frenado y sobre todo perdiendo la capacidad de dirección.</p>
						<p>Características:</p>
						<ul>
							<li><span class="glyphicon glyphicon-share-alt"></span> Cambio de balatas delanteras y traseras</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Rectificado de discos y tambores</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Purgado de frenos por medio de boya</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Revisión y cambio de repuestos</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="enfriamiento">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Sistema de Enfriamiento</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/sistema_enfriamiento.png" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p align="justify"> Cuando el motor de combustión funciona, solo una parte de la energía calorífica del combustible se convierte en trabajo mecánico a la salida del cigüeñal, el resto se pierde en calor. Una parte del calor perdido sale en los gases de escape pero otra se transfiere a las paredes del cilindro, a la culata o tapa y a los pistones, por lo que la temperatura de trabajo de estas piezas se incrementa notablemente y será necesario refrigerarlos para mantener este incremento dentro de límites seguros que no los afecten. Además las pérdidas por rozamiento calientan las piezas en movimiento, especialmente las rápidas, como cojinetes de biela y puntos de apoyo del cigüeñal.</p>
						<p align="justify">Para refrigerar las piezas involucradas se usan dos vías: </p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> El aceite lubricante para las piezas en movimiento y la cabeza de los pistones</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Usa un fluido en movimiento para refrigerar camisas de cilindros y culata</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Este fluido puede ser aire, o líquido</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>
		
		<!-- =============================================================================================================================-->
		<?php footerSitioNormal(); ?>
		<!-- =============================================================================================================================-->

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			script.addEventListener("touchstart", function(){}, true);
		</script>
	</body>
</html>