<?php
include 'connections/conexion.php';
$user_id = mysqli_real_escape_string($ConexionBD, $_GET['user_id']);
$eliminarCuenta = "UPDATE dat_cliente SET aux = '2' WHERE idCliente = '$user_id' ";
$result6 = mysqli_query($ConexionBD, $eliminarCuenta);

mysqli_query($ConexionBD, $result6);
    echo '
		<label class="text-primary">Cuenta eliminada satisfactoriamente</label>
		';
?>