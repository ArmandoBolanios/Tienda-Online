<?php
session_start();
$idCliente = $_SESSION['user_id'];
if(!empty($_POST)) {
    require_once '../connections/conexion.php';
    $numeroFila = $_REQUEST['numeroFilaTel'];
    $ConexionBD->query("DELETE FROM cliente_telefono WHERE idClienteTelefono = '$numeroFila' AND idCliente = '$idCliente' ");
    mysqli_close($ConexionBD);
} //end EMPTY _$POST
?>
