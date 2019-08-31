<?php

if(!empty($_REQUEST)) {
    require_once '../connections/conexion.php';
    $idCliente  = mysqli_real_escape_string($ConexionBD, $_REQUEST['idClienteFormCorreo']);
    $numeroFila = mysqli_real_escape_string($ConexionBD, $_REQUEST['numeroFilaCorreo']);
    $correo     = mysqli_real_escape_string($ConexionBD, $_REQUEST['correoElectronico']);
    
    $consultaCorreo = "UPDATE cliente_correo SET correoElectronico='$correo' WHERE idClienteCorreo = '$numeroFila' 
                            AND idCliente= '$idCliente' ";
    
    if(mysqli_query($ConexionBD, $consultaCorreo)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST

?>
