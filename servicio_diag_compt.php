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

		<title>Diagnóstico por computadora</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="css/estilos.css"        type="text/css">
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
						<li class="active">Diagnóstico por Computadora</li>
					</ol>
				</div> <!--termina miga-de-pan -->
			</div>
		</section> <!--termina tiraCentral -->

		<!-- ======================================================================================================================================================-->

		<section class="main container tiraCentral">
			<div class="col-lg-12 col-md-12 col-xs-12 titulo tituloServicio">
				<section>
					<h3><span>Servicio de Diagnóstico por Computadora</span></h3>
				</section>
			</div>
		</section>

		<!-- ============================================================= -->
		<div class="about" id="diag_motor">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Diagnóstico de Motor</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_motor.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p align="justify">
							Se inicia al conectar un dispositivo a la computadora a boro del vehículo.
							Las interfaces de dispositivo con el ordenador envían un código de diagnostico que puede hacer referencia a una compilación de posibles problemas para los vehículos de ese fabricante.
						</p>
						<p align="justify">Si el motor está en buenas condiciones de trabajo, el dispositivo informa al usuario, pero si hay un problema, uno o varios códigos pueden aparecer.
							<br>El diagnóstico es el siguiente:</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Prueba de compresión</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Bujía mojada</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Carbonización seca</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Sobrecalentamiento</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>        

		<!-- =========================================================== -->
		<div class="about" id="abs">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Diagnóstico de ABS (Sistema de Frenos Antibloqueo)</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_frenosABS.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4>Frenos antibloqueo</h4>
						<p align="justify">
							La finalidad principal del equipo de frenos de un vehículo es reducir la velocidad a la que se desplaza y, por lo tanto, hacer que las ruedas dejen de dar vueltas.
						</p>
						<p align="justify">
							Quedarnos sin dirección es una de las mayores pesadillas que nos pueden sorprender mientras conducimos. Para evitar este inconveniente y así aumentar la seguridad activa de los automóviles, se empezaron a desarrollar distintos sistemas anti bloqueo para garantizar que pudiéramos dirigir nosotros la trayectoria de nuestro coche.
							<br>El diagnóstico es el siguiente:
						</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Daños en el anillo dentado de la rueda</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Daños en las tuberías rígidas o tubos flexibles del circuito de freno</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Fugas por los sellos de los pistones de pinzas de frenos</li>

						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="transmision">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Diagnóstico de Transmisiones Automáticas</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_transmision_autom.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p>La mayoría de los problemas ocasionales son causados por malas conexiones eléctricas o cableado inadecuado.
							<br>El diagnóstico es el siguiente: </p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Comprobación de aceite</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Fuga de gas</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Prueba de carretera</li> 
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="traccion">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Sistema de Control y Tracción</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_transmision_autom.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem molestiae, adipisci nam temporibus debitis velit fugit provident, reiciendis voluptatum nisi deleniti, quaerat accusamus facilis nihil optio porro soluta id sit.
							<br>El diagnóstico es el siguiente:
						</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Mantenimiento de presión</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Aceleraciones y decelaraciones de las ruedas</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Recnococimiento de las condiciones de rodaje</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="airbag">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Sistema Airbag (Bolsas de Aire)</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_bolsas-de-aire.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p align="justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima sint, facilis impedit iure, nesciunt asperiores eaque iste deserunt alias odit excepturi dolore eius voluptatibus est nemo! Fuga ab, quaerat pariatur.
						</p>
						<p align="justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio aut impedit deleniti beatae, vel hic quibusdam, veritatis ad repudiandae cupiditate. Atque tempora qui fugiat perspiciatis commodi rem, natus reiciendis saepe.
							<br>El diagnóstico es el siguiente:
						</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Problemas en el generador de gas</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Insertar bolsas</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Airbag de cortina</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Airbag lateral</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="carroceria">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Módulos de Carrocería</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_motor.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p aling="justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi quibusdam ullam maiores sapiente inventore, nam expedita itaque consectetur aliquam id recusandae mollitia quod doloremque consequatur explicabo atque, aperiam, ad corrupti.
						</p>
						<p align="justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat amet enim nam, vero recusandae reprehenderit? Reprehenderit, repudiandae velit odio fugit ullam id soluta ab quidem veniam incidunt, a, dolores, eligendi.
						</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Duis aute irure dolor in reprehenderit voluptate </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Excepteur sint occaecat cupidatat non proident</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Sunt in culpa qui officia deserunt mollit </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Duis aute irure dolor in reprehenderit voluptate </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Excepteur sint occaecat cupidatat non proident</li> 
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>

		<!-- =========================================================== -->
		<div class="about" id="laboratorio">
			<div class="container tiraPrincipal">
				<div class="w3-welcome-heading">
					<h3>Laboratorio de Inyectores por Ultrasonido</h3>
				</div>
				<div class="w3ls-about-grids">
					<div class="col-md-6 about-right blog-img-servicios">
						<img src="img/servicios/diagnostico_motor.jpg" alt="NO-IMG">
					</div>
					<div class="col-md-6 about-left"> 
						<h4></h4>
						<p align="justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod fugiat molestiae cumque, autem et ratione eos quibusdam fugit maxime excepturi, dolorem libero sunt. Inventore officia veniam animi magni, quia sapiente.
						</p>
						<ul> 
							<li><span class="glyphicon glyphicon-share-alt"></span> Duis aute irure dolor in reprehenderit voluptate </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Excepteur sint occaecat cupidatat non proident</li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Sunt in culpa qui officia deserunt mollit </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Duis aute irure dolor in reprehenderit voluptate </li>
							<li><span class="glyphicon glyphicon-share-alt"></span> Excepteur sint occaecat cupidatat non proident</li> 
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<section class="post"></section>
		</div>
		
		<!-- ========================================================================================================================-->
		<?php footerSitioNormal(); ?>
		<!-- ========================================================================================================================-->

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>