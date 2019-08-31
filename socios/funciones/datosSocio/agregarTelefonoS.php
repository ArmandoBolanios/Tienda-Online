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
  if (empty($_POST['phone'])) { 
           $errors[] = "Teléfono vacío";
        }
  else if (!empty($_POST['phone'])){

		$tipot=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["tipot"],ENT_QUOTES)));
		$phone=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["phone"],ENT_QUOTES))); 
      
                //Consulta para insertar registro en tabla telefonoSocio
       $insertarTelS = "INSERT INTO socio_telefono(idSocio, ubicacion, telefono, fechaDeRegistro, aux) VALUES ('$sesionSocio', '$tipot', '$phone', now(), 1)";
 
		$query_registerT = mysqli_query($conexionBD,$insertarTelS);
			if ($query_registerT){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";
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