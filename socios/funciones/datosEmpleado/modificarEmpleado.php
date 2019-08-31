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
        } else if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        } else if (empty($_POST['apellidoP'])){
			$errors[] = "Apellido paterno vacío";
		} else if (empty($_POST['apellidoM'])){
			$errors[] = "Apellido materno vacío";
        } else if (
            !empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['apellidoP']) &&
			!empty($_POST['apellidoM']) ){
 
		// escaping, additionally removing everything that could be (html/javascript-) code 
		$nombre=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellidoP=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));
		$apellidoM=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["apellidoM"],ENT_QUOTES))); 
        
		$id=intval($_POST['id']);
		$sql="UPDATE empleadosocio SET  nombreEmpleado='".$nombre."', apellidoPaternoEmpleado='".$apellidoP."',
		apellidoMaternoEmpleado='".$apellidoM."' WHERE idSocioEmpleado='".$id."'";
		$query_update = mysqli_query($conexionBD,$sql);
			if ($query_update){
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