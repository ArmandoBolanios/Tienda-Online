<?php
include 'connections/conexion.php';
if(empty($_GET['user_id'])) {
	header("Location: index.php");
}
$user_id = mysqli_real_escape_string($ConexionBD, $_GET['user_id']);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cambio de contraseña</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
		<link rel="stylesheet" href="css/estilos.css" type="text/css">
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
		<link rel="stylesheet" href="css/stylefooter.css"   type="text/css">

	</head>
	<body>
		<?php $page='inicio'; include 'php/lib-sitio.php'; ?>
		<?php contenidoSitio(); ?>

		<div class="espacio"></div>
		<div class="container tiraCentral">
			<div class="col-md-4">
				<h4>Cambiar contraseña</h4>	
				<form method="POST" action="funciones/update_pass-email.php" enctype="multipart/form-data" 
					  id="FormularioEmailPwd" name="FormularioEmailPwd">
					<fieldset>
						<h5>Introduce tu nueva contraseña:</h5>
						<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
						<input type="password" class="form-control" name="password_email">
						<h5>Confirma tu nueva contraseña</h5>
						<input type="password" class="form-control" name="cpassword_email">
						<br>
						<button type="submit" name="mail_password" class="form-control btn btn-success" >Enviar
						</button>
					</fieldset>
				</form>
			</div> <!-- end col-md-6 -->
		</div>
		<div class="espacio"></div>
		
		<?php footerSitio(); //pie de pagina?>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
		<script type="text/javascript" src="js/validator_form.js"></script>
	</body> 
</html> 