<?php

if(!empty($_REQUEST)) {
    require_once '../connections/conexion.php';
    $idCliente  = mysqli_real_escape_string($ConexionBD, $_REQUEST['idCliente2']);
    $password	= mysqli_real_escape_string($ConexionBD, $_REQUEST['c_new_password']);

    $consultaPass = "UPDATE dat_cliente SET pass = '".md5($password)."' WHERE idCliente = '$idCliente' ";

    if(mysqli_query($ConexionBD, $consultaPass)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST

?>
