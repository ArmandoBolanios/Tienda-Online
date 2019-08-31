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
    }else if(empty($_POST['denominacion'])){
        $errors[] ="Denominación vacia";
    } else if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        } else if (empty($_POST['paterno'])){
			$errors[] = "Apellido paterno vacío";
		} else if (empty($_POST['materno'])){
			$errors[] = "Apellido materno vacío";
        } else if (empty($_POST['alias'])){
			$errors[] = "Alias vacío";
        } else if (empty($_POST['rfc'])){
			$errors[] = "RFC vacío";
        } else if (empty($_POST['observacion'])){
			$errors[] = "Observaciones vacío";
        
        
        } else if (
            !empty($_POST['id']) && !empty($_POST['denominacion']) && !empty($_POST['nombre']) && !empty($_POST['paterno']) && !empty($_POST['materno']) && !empty($_POST['alias']) && !empty($_POST['rfc']) && !empty($_POST['observacion'])){
 
		// escaping, additionally removing everything that could be (html/javascript-) code 
		$denomi=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["denominacion"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apepaterno=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["paterno"],ENT_QUOTES)));
		$apematerno=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["materno"],ENT_QUOTES))); 
		$alias=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["alias"],ENT_QUOTES)));
		$rfc=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["rfc"],ENT_QUOTES)));
		$observa=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["observacion"],ENT_QUOTES)));
        
		$id=intval($_POST['id']);
	 
         $udpSocio = " UPDATE socio SET denominacion='$denomi', nombreSocio='$nombre', apellidoPaternoSocio='$apepaterno', apellidoMaternoSocio='$apematerno', alias='$alias', rfc='$rfc', observaciones='$observa' WHERE idSocio='$sesionSocio' ";
        
		$query_updateS = mysqli_query($conexionBD,$udpSocio);
        
        
			if ($query_updateS){
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