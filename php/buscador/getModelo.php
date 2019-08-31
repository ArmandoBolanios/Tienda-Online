<?php

require ('../../connections/conexion.php');

$id_region = $_POST['id_region'];
$id_anio = $_POST['id_anio'];
$id_armadora = $_POST['id_armadora'];


$query = "SELECT  DIstinct (idModelo) FROM clase WHERE idRegion ='$id_region' AND idAnio = '$id_anio' AND idArmadora = '$id_armadora'   ORDER BY idModelo";
$resultado=$ConexionBD->query($query);


$html= "<option value='0'>seleccionar</option>";
while($rowM = $resultado->fetch_assoc())
{
    $obtenerMod = "select modelo from modelo where idModelo = '".$rowM['idModelo']."' ";
    $resultMod = $ConexionBD->query($obtenerMod);
    $resModelo = $resultMod->fetch_array(MYSQLI_ASSOC);

    $html.= "<option value='".$rowM['idModelo']."'>".$resModelo['modelo']."</option>";
}
echo $html;
?>