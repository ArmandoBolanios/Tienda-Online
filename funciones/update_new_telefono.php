<?php
if(!empty($_POST)) {
    require_once '../connections/conexion.php';

    $telefono  = mysqli_real_escape_string($ConexionBD, $_REQUEST['update_telefono']);
    $idCliente = mysqli_real_escape_string($ConexionBD, $_REQUEST['client_telefono']);
    $numeroFila = mysqli_real_escape_string($ConexionBD, $_REQUEST['numeroFila']);
    
    $consultaTelefono = "UPDATE cliente_telefono SET telefono='$telefono' WHERE 
    idClienteTelefono = '$numeroFila' AND idCliente= '$idCliente' ";
    
    if(mysqli_query($ConexionBD, $consultaTelefono)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST
?>
