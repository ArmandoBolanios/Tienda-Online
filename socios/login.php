<?php
session_start();
require_once 'connections/conexion.php';
require_once 'styles/complemento/sitio.php'; 
require_once 'funciones/generadorID.php';

if (isset($_SESSION['userSession'])!="") {
    header("Location: index_ok.php");
    exit;
}

if (isset($_POST['btn-login'])) {
    $User = strip_tags($_POST['user']);
    $Password = strip_tags( $_POST['password']);
    
    $user = $conexionBD->real_escape_string($User);
    $password = $conexionBD->real_escape_string($Password);
    
    $query = $conexionBD->query("SELECT * FROM dat_socio,socio WHERE user='$user' and dat_socio.idSocio=socio.idSocio");
    $queryEmpleado = $conexionBD->query("SELECT * FROM empleadosocio WHERE user='$user'");
    
    
    if($query->num_rows >0){
        
    $row = $query->fetch_array();
        
      
    if (password_verify($password, $row['password'])) {
        
       if($row['aux']=='1'){ 
              $msg = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp;<strong> Espere por favor 24 horas para su activación, en su cuenta de correo se ha enviado las politicas. Gracias!</strong>
                    
                </div>"; 
       } 
       else{ 
            
        $_SESSION['userSession'] = $row['idSocio']; 
        $idSocio  = $_SESSION['userSession'];   
        $idSesionn =  generarSSesion ( );
        $_SESSION['sesi'] = $idSesionn; 
            
        $sesionn = "INSERT INTO sesionsocio(idSesion, idSocio, fechaDeEntrada, fechaDeSalida) VALUES ('$idSesionn', '$idSocio', now(), now() ) ";
            
		$query_inser = mysqli_query($conexionBD,$sesionn);
         
            
        $_SESSION['userSession'] = $row['idSocio']; 
        $_SESSION['nameuser']= $row['user']; 
        $_SESSION['denominacion']= $row['denominacion'];
        $_SESSION['firma']= $row['firma'];
        $_SESSION['sello']= $row['sello'];
        $_SESSION['certificado']= $row['certificado'];
        $_SESSION['taller']= 'socio';
        $_SESSION['detalle'] = array();
        
        header("Location: index_ok.php");
           
       }
    }
        
    } else if ($queryEmpleado->num_rows > 0){
        $row = $queryEmpleado->fetch_array();
        
        if (password_verify($password, $row['password'])) { 
         
        $_SESSION['userSession'] = $row['idSocio']; 
        $_SESSION['nameuser']= $row['user']; 
        $_SESSION['taller']= 'empleado';
        header("Location: http://localhost/Montecarlo05/aplicacion/ordenServicio.php");
    } 
       
        
    }  else {
        $msg = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Usuario o contraseña invalidos !
                    
                </div>";
    }
    
   $conexionBD->close();
  
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
		<link rel="shortcut icon" href="img/favicon.png">

		<title>inicio de sesion</title>

		<!-- Bootstrap CSS -->    

		<link rel="stylesheet" href="styles/css/bootstra.min.css"   type="text/css"> 
		<link href="styles/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/estilos.css"        type="text/css">
		<link rel="stylesheet" href="../css/font-awesome.css">

		<!-- Custom styles -->
		<link href="styles/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="styles/css/stylefooter.css"   type="text/css" media="all">

	</head>

	<body class="login-img3-body">
		<header>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse">
							<span class="sr-only">Desplegar / Ocultar Menú</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="../img/index/logo_montecarlo.png" alt="Dispute Bills"></a>
					</div> <!-- corresponde al logo -->

					<!-- inicia el MENU -->
					<div class="collapse navbar-collapse large" id="navbarCollapse">
						<ul class="nav navbar-nav">
							<!--<li class=""><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li> -->
							<li><a href="../index.php">Inicio</a></li>
							<li><a href="../venta_refacciones.php"><i class=""></i>Refacciones</a></li>
							<li><a href="../todos_servicios.php"><i class=""></i>Servicios</a></li>

							<li><a href="../promociones.php"><i class=""></i>Promociones</a></li>

							<li>
								<a href="../content_cart.php">Carrito 
									<span class="badge"><?php if(isset($_SESSION["shopping_cartMT"])) { echo count($_SESSION["shopping_cartMT"]); } else { echo '0';}?></span>

								</a>
							</li>				

							<li class="dropdown">
								<?php if(isset($_SESSION['user_id'])) {?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Mi cuenta <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="divider"></li>
									<li><a href="cliente_perfil.php"><i class="fa fa-user"></i>  Perfil</a></li>
									<li class="divider"></li>
									<li><a href="cliente_logout.php.php">Cerrar sesion</a></li>
									<?php } else { ?>
									<li class="divider"></li>
									<li><a href="../cliente_login.php">Inicia sesion</a></li>
									<li><a href="../cliente_registrar.php">Registrate</a></li>
									<li><a href="socios/login.php">Socios</a></li>
									<?php } ?>
								</ul>

							</li> <!--termina li de la sesion -->

						</ul> <!-- termina ulnavbar -->
					</div> <!--termina el MENU -->
				</div> <!--agrega movimeinto al MENU -->
			</nav> <!--todo el MENU -->
		</header>
		<div class="container">

			<form class="login-form" method="post" id="login-form"  >  
				<div id="_AJAX_"></div>      
				<div class="login-wrap">
					<p class="login-img"><i class="icon_lock_alt"></i></p>
					<?php
					if(isset($msg)){
						echo $msg;

					}
					?>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_profile"></i></span>
						<input type="text"  name="user" class="form-control" placeholder="Usuario" required autofocus>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="password"  name="password"  class="form-control" placeholder="Contraseña" required>
					</div>
					<label class="checkbox">
						<input type="checkbox" value="1" id="sesion"> Recuérdame
						<span class="pull-right"> <a href="aplicacion/recuperarPassword.php"> Olvidaste tu contraseña?</a></span>
					</label>
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login" id="btn-login" ><span class="glyphicon glyphicon-log-in"></span> &nbsp; Iniciar sesion</button>
					<a href="registroSocio.php" class="btn btn-info btn-lg btn-block">Regístrate</a>


				</div>

			</form>
		</div>
		<footer>
			<div id="f">
				<div class="container">
					<div class="footer-logo textoFooter">
						<h3><a href="nosotros.php"><span>Monte' Carlo Automotriz</span> &copy;</a></h3>
						<br><br>
					</div>

					<div class="row">
						<div class="col-lg-4 textoFooter">
							<h4>Envíanos un mensaje</h4>
							<p><a href="contactar.php">montecarlo.refacciones@gmail.com <i class="fa fa-envelope"></i></a></p>
							<br>
							<h4>Acerca de nosotros</h4>
							<p><a href="nosotros.php">Información de nuestra empresa</a></p>
						</div>
						<div class="col-lg-4 textoFooter">
							<h4>Contáctanos</h4>
							<p><i class="fa fa-whatsapp"></i> 757 477 30 51</p>
							<p><i class="fa fa-phone"></i> 757 116 42 64</p>
							<p><i class="fa fa-phone"></i> 757 476 70 14</p>

							<br>
						</div>
						<div class="col-lg-4 textoFooter">
							<h4>Dirección</h4>
							<p align="">
								Calle Arcos S/N (Entre Hidalgo y Morelos) <br>Col. San Fancisco, Tlapa de Comonfort, Guerrero
							</p>
							<br>
							<p align="">
								Hildalgo N°380 Col.Tepeyac, Tlapa de Comonfort Guerrero.
							</p>
						</div>
						<br>

					</div> <!-- fin de class row -->
					<div class="agileinfo-social-grids">
						<h4>SÍGUENOS</h4>
						<div class="border"></div> <!-- termina border -->
						<ul>
							<li>
								<a href="https://www.facebook.com/Montecarlo-Automotriz-867296540033474/?fref=ts" target="_blank">
									<br>
									<i class="fa fa-facebook"></i>
								</a>
							</li>

							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						</ul>

					</div> <!-- termina social-grids -->

					<div class="copyright">
						<p>© 2017 Monte' Carlo Automotriz. Todos los derechos reservados.</p>
					</div> <!-- fon de copyright -->
				</div> <!-- fin de class container -->
			</div> <!-- fin de f -->
		</footer>
		<script src="styles/js/jquery.js"></script>
		<script src="styles/js/jquery.min.js"></script>
		<script src="styles/js/bootstrap.min.js"></script>



	</body>
</html>
