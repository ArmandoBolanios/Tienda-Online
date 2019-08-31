<?php
if(!empty($_POST)) {
    require_once '../connections/conexion.php';

    $telefono  = mysqli_real_escape_string($ConexionBD, $_REQUEST['new_telefono']);
    $idCliente = mysqli_real_escape_string($ConexionBD, $_REQUEST['clave_cliente']);
    
    $nuevoTelefono = "INSERT INTO cliente_telefono(idCliente, ubicacion, telefono, fechaDeRegistro, aux)
                    VALUES('$idCliente', 'Personal', '$telefono', now(), '2')";
    
    if(mysqli_query($ConexionBD, $nuevoTelefono)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST
?>
