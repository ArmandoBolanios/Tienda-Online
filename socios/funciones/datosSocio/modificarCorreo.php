<?php session_start();

# conectare la base de datos 
require_once '../../connections/conexion.php';   
   $sesionSocio = $_SESSION['userSession']; 
 
	
    if(!$conexionBD){
        die("imposible conectarse: ".mysqli_error($conexionBD));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['email'])) {
           $errors[] = "Correo vacío";
        }
else if (!empty($_POST['id']) && !empty($_POST['email'])){
 
		// escaping, additionally removing everything that could be (html/javascript-) code 
		$tipoc=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["tipoc"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["email"],ENT_QUOTES)));  
        
	     $idSCorreo=intval($_POST['id']);
	     
     $udpCorreo = "UPDATE socio_correo SET tipoCorreo ='$tipoc', correoElectronico ='$email'  WHERE idSocioCorreo= '$idSCorreo' ";
     
		$query_updateC = mysqli_query($conexionBD,$udpCorreo);
    
			if ($query_updateC){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($conexionBD);
			}
		} else {
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