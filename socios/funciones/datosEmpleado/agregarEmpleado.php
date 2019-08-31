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
	 if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['apellidoP'])){
			$errors[] = "apellido paterno vacío";
		} else if (empty($_POST['apellidoM'])){
			$errors[] = "apellido materno vacío";
		} else if (empty($_POST['user'])){
			$errors[] = "Usuario vacío";
		} else if (empty($_POST['password'])){
			$errors[] = "Password vacío";
		} else if (empty($_POST['compPass'])){
			$errors[] = "Comprobacion de Password vacío";
		} else if (($_POST['password']) != ($_POST['compPass'])){
			$errors[] = "las contraseñas deben ser iguales";
		}
          else if (
			!empty($_POST['nombre']) && !empty($_POST['apellidoP']) && !empty($_POST['apellidoM']) &&
			!empty($_POST['user']) && !empty($_POST['password']) ){
 
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apePaternoE=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["apellidoP"],ENT_QUOTES)));
		$apeMaternoE=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["apellidoM"],ENT_QUOTES)));
		$user=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["user"],ENT_QUOTES)));
		$password=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["password"],ENT_QUOTES)));
      
	   $hashed_password = password_hash($password, PASSWORD_DEFAULT);  
               
         
         $sql = "INSERT INTO empleadosocio (idSocio, nombreEmpleado, apellidoPaternoEmpleado, apellidoMaternoEmpleado, user, password, fechaDeRegistro, aux) VALUES  ('$sesionSocio', '$nombre', '$apePaternoE', '$apeMaternoE', '$user', '$hashed_password', now(), 1)";
 
         
		$query_update = mysqli_query($conexionBD,$sql);
			if ($query_update){
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