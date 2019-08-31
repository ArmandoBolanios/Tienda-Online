<?php
session_start();


require_once '../../connections/conexion.php';   
   $sesionSocio = $_SESSION['userSession']; 

  
    if(!$conexionBD){
        die("imposible conectarse: ".mysqli_error($conexionBD));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['id_correo'])){
			$errors[] = "ID vacío";
		}   else if (
			!empty($_POST['id_correo']) ){
 
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_correo=intval($_POST['id_correo']);
		
		$sql="DELETE FROM socio_correo WHERE idSocioCorreo='".$id_correo."'";
		$query_deleteC = mysqli_query($conexionBD,$sql);
			if ($query_deleteC){
				$messages[] = "Los datos han sido eliminados satisfactoriamente.";
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
						<strong>¡Perfecto!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
 
?>