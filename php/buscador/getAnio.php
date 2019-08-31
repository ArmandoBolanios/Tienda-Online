<?php

require ('../../connections/conexion.php');

$id_Region = $_POST['id_region'];

$queryM = "SELECT idAnio FROM anio ORDER BY anio DESC";
$resultadoM = $ConexionBD->query($queryM);
$html= " <option value='0'>seleccionar</option>";

while($rowM = $resultadoM->fetch_assoc())
{

    $obtenerAnio = "select distinct(Anio) from anio where idAnio = '".$rowM['idAnio']."'";
    $resultAnio = $ConexionBD->query($obtenerAnio);
    $resAnio = $resultAnio->fetch_array(MYSQLI_ASSOC);

    $html.= "<option value='".$rowM['idAnio']."'>".$resAnio['Anio']."</option>";
}

echo $html;
?>		