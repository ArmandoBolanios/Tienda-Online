<?php
sleep(1);
include_once '../connections/conexion.php';
if($_REQUEST) {
	if(isset($_POST['nomusuario'])) {
		$nomusuario = $_REQUEST['nomusuario'];
		
		$query = $ConexionBD->query("SELECT user FROM dat_cliente WHERE
		user = '$nomusuario' ");
		
		if(mysqli_num_rows(@$query) > 0) {
			echo '<label class="text-danger">¡El usuario ya existe!</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("submit");
					botonEnviar.disabled=true;
			    </script>';
		}else{
			echo '<label class="text-primary">¡Usuario disponible!</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("submit");
					//botonEnviar.disabled=false;
			    </script>';
		}
	}
    
}

# -----------------------------------------------------------------------------------------------
# del módulo para cambiar el nombre de usuario, verifica que el nombre de usuario no se repita
if($_REQUEST) {
	if(isset($_POST['new_name_user'])) {
		$nomusuario1 = $_REQUEST['new_name_user'];
		
		$query = $ConexionBD->query("SELECT user FROM dat_cliente WHERE user = '$nomusuario1' ");
		
		if(mysqli_num_rows(@$query) > 0) {
			echo '<label class="text-danger">¡El usuario ya existe!</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("btnUser");
					//botonEnviar.disabled=true;
			    </script>';
		}else{
			echo '<label class="text-primary">¡Usuario disponible!</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("btnUser");
					//botonEnviar.disabled=false;
			    </script>';
		}
	}
    
}

?>
