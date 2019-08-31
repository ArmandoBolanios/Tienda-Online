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
        }else if (empty($_POST['phone'])) {
           $errors[] = "Teléfono vacío";
        }
else if (!empty($_POST['id']) && !empty($_POST['phone'])){
 
		// escaping, additionally removing everything that could be (html/javascript-) code 
		$tipot=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["tipot"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["phone"],ENT_QUOTES)));  
        
		$idTel=intval($_POST['id']);
    
     $udpCorreo = "UPDATE socio_telefono SET ubicacion ='$tipot', telefono ='$telefono'  WHERE idSocioTelefono= '$idTel' ";
     
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