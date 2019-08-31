<?php

if(!empty($_REQUEST)) {
    require_once '../connections/conexion.php';
    $idCliente  = mysqli_real_escape_string($ConexionBD, $_REQUEST['idCliente1']);
    $usuario    = mysqli_real_escape_string($ConexionBD, $_REQUEST['new_name_user']);
    $new_User   = strtolower($usuario);
    
    $consultaUsuario = "UPDATE dat_cliente SET user = '$new_User' WHERE idCliente = '$idCliente' ";
    
    if(mysqli_query($ConexionBD, $consultaUsuario)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST

?>
