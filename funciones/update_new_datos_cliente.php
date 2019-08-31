<?php
//var_dump($_REQUEST);

if(!empty($_REQUEST)) {
    require_once '../connections/conexion.php';
    $idCliente = mysqli_real_escape_string($ConexionBD, $_REQUEST['idClienteFormDatos']);
    $denom      = mysqli_real_escape_string($ConexionBD, $_REQUEST['denominacion']);
    $nomb       = mysqli_real_escape_string($ConexionBD, $_REQUEST['nombre']);
    $ap         = mysqli_real_escape_string($ConexionBD, $_REQUEST['apellidopaterno']);
    $am         = mysqli_real_escape_string($ConexionBD, $_REQUEST['apellidomaterno']);
    $rfc        = mysqli_real_escape_string($ConexionBD, $_REQUEST['rfc']);
    
    $denominacion = trim($denom);
    $nombre = trim($nomb);
    $apellidoPaterno = trim($ap);
    $apellidoMaterno = trim($am);
    $nuevoRFC = trim($rfc);
    
    $new_DatosCliente = "UPDATE cliente SET denominacion= '$denominacion',nombre='$nombre', apellidoPaterno='$apellidoPaterno', apellidoMaterno='$apellidoMaterno', rfc= '$nuevoRFC' WHERE idCliente= '$idCliente' ";

    if(mysqli_query($ConexionBD, $new_DatosCliente)) {
        echo '1';
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE
    mysqli_close($ConexionBD);
} //end EMPTY _$POST

?>
