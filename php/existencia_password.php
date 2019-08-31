<?php
sleep(1);
include_once '../connections/conexion.php';
# ------------------------------  corresponden al formulario para cambiar el nombre de usuario 
if($_REQUEST) {
	if(isset($_POST['passwordUsuario']) && ($_POST['idCliente'])) {

		$idCliente  = 	$_REQUEST['idCliente'];
		$password1 =   $_REQUEST['passwordUsuario'];

		$result = $ConexionBD->query(" SELECT idCliente, pass FROM dat_cliente WHERE idCliente = '$idCliente'
		AND  pass = '" . md5($password1) . "' " );

		if(mysqli_num_rows(@$result) > 0) {
			echo '<label class="text-primary">Contraseña correcta</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("btnUser");
					//botonEnviar.disabled=false;
			    </script>';
		}else{
			echo '<label class="text-danger">¡Contraseña incorrecta!</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("btnUser");
					botonEnviar.disabled=true;
			    </script>';
		}
	} //end isset
} //end REQUEST


# ------------------------------  corresponden al formulario para cambiar la contraseña de usuario 
if($_REQUEST) {
	if(isset($_POST['password2']) && ($_POST['idCliente'])) {
		$idCliente  = 	$_REQUEST['idCliente'];
		$password2 =   $_REQUEST['password2'];

		$result = $ConexionBD->query(" SELECT idCliente, pass FROM dat_cliente WHERE idCliente = '$idCliente'
		AND  pass = '" . md5($password2) . "' " );

		if(mysqli_num_rows(@$result) > 0) {
			echo '<label class="text-primary">Contraseña correcta</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("btnPwd");
					//botonEnviar.disabled=false;
			    </script>';
		}else{
			echo '<label class="text-danger">¡Contraseña incorrecta!</label>';
			echo '<script type="text/javascript">
					var botonEnviar = document.getElementById("btnPwd");
					botonEnviar.disabled=true;
			    </script>';
		}
	} //end isset
} //end REQUEST

?>