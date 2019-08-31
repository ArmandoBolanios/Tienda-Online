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
    }else if(empty($_POST['estado'])){
        $errors[] ="Seleccione el estado";
    } else if (empty($_POST['delegacion'])) {
           $errors[] = "Seleccione delegación";
        } else if (empty($_POST['colonia'])){
			$errors[] = "Colonia vacío";
		} else if (empty($_POST['numeroi'])){
			$errors[] = "Número interno vacío";
        } else if (empty($_POST['numeroe'])){
			$errors[] = "Número externo vacío";
        } else if (empty($_POST['calle'])){
			$errors[] = "Calle vacío";
        }  else if (
            !empty($_POST['id']) && !empty($_POST['colonia']) && !empty($_POST['numeroi']) && !empty($_POST['numeroe']) && !empty($_POST['calle']) ){
 
		// escaping, additionally removing everything that could be (html/javascript-) code 
     $estado=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["estado"],ENT_QUOTES)));
     $delegacion=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["delegacion"],ENT_QUOTES)));
	 $colonia=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["colonia"],ENT_QUOTES)));
	 $numeroi=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["numeroi"],ENT_QUOTES))); 
	 $numeroe=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["numeroe"],ENT_QUOTES)));
	 $calle=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["calle"],ENT_QUOTES))); 
        
          $udpDir = "UPDATE socio_direccion SET calle='$calle', numeroInterior='$numeroi', numeroExterior='$numeroe', colonia='$colonia', delegacion='$delegacion', estado='$estado' WHERE idSocio= '$sesionSocio' ";
         
		$query_updateD = mysqli_query($conexionBD,$udpDir);
        
        
			if ($query_updateD){
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