<?php

if(!empty($_REQUEST)) {
    require_once '../connections/conexion.php';
    $idCliente  = mysqli_real_escape_string($ConexionBD, $_REQUEST['idClienteFormDireccion']);
    $numeroFila = mysqli_real_escape_string($ConexionBD, $_REQUEST['numeroFilaDireccion']);
    $numInt     = mysqli_real_escape_string($ConexionBD, $_REQUEST['numeroInterior']);
    $numExt     = mysqli_real_escape_string($ConexionBD, $_REQUEST['numeroExterior']);
    $estado     = mysqli_real_escape_string($ConexionBD, $_REQUEST['estado']);
    $delegacion = mysqli_real_escape_string($ConexionBD, $_REQUEST['delegacion']);
    $colonia    = mysqli_real_escape_string($ConexionBD, $_REQUEST['colonia']);
    $calle      = mysqli_real_escape_string($ConexionBD, $_REQUEST['calle']);
    $cp         = mysqli_real_escape_string($ConexionBD, $_REQUEST['codigoPostal']);
    
    $estado1 = trim($estado);
    $delegacion1 = trim($delegacion);
    $colonia1 = trim($colonia);
    $calle1 = trim($calle);
    
    $consultaDireccion = "UPDATE cliente_direccion SET calle= '$calle1', numeroInterior='$numInt', numeroExterior='$numExt', colonia='$colonia1', delegacion='$delegacion1', estado='$estado1', codigoPostal='$cp'
    WHERE idClienteDireccion = '$numeroFila' AND idCliente= '$idCliente' ";
    
    if(mysqli_query($ConexionBD, $consultaDireccion)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST

?>
