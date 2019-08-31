<?php
include 'connections/conexion.php';
$user_id = mysqli_real_escape_string($ConexionBD, $_GET['user_id']);
$activarCuenta = "UPDATE dat_cliente SET aux = '1' WHERE idCliente = '$user_id' ";
$result9 = mysqli_query($ConexionBD, $activarCuenta);

mysqli_query($ConexionBD, $result9);
    echo '
		<label class="text-primary">Cuenta activada satisfactoriamente</label>
		';
?>