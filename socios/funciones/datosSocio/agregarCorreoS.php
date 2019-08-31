<?php session_start();


require_once '../../connections/conexion.php';     
$sesionSocio = $_SESSION['userSession']; 

    if(!$conexionBD){
        die("imposible conectarse: ".mysqli_error($conexionBD));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
  if (empty($_POST['email'])) { 
           $errors[] = "Correo vacío";
        }

  else if (!empty($_POST['email'])){
      	$tipoc=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["tipoc"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["email"],ENT_QUOTES))); 
      
      $check_email = $conexionBD->query("SELECT correoElectronico FROM socio_correo WHERE correoElectronico='$email'");
	$count=$check_email->num_rows;
	if ($count==0) {
   
	
      $insertarCorreoS = "INSERT INTO socio_correo(idSocio, tipoCorreo, correoElectronico, fechaDeRegistro, aux) VALUES ('$sesionSocio', '$tipoc', '$email', now(), 1)";
      
      $query_registerC = mysqli_query($conexionBD,$insertarCorreoS );

      
			if ($query_registerC){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";
			} else{
         $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($conexionBD);
			}
		} else {
        $errors [] ="El correo ya existe";
    } //si el email existe
       } //si esta vacio

          else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
 
?>