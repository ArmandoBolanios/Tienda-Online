<?php
require ('../../connections/conexion.php');

$id_anio = $_POST['id_anio'];
$id_Region = $_POST['id_region'];

$query = "SELECT  DIstinct (idArmadora) FROM clase WHERE idAnio = '$id_anio' AND idRegion ='$id_Region'  ORDER BY idArmadora";
$resultado=$ConexionBD->query($query);


$html= "<option value='0'>seleccionar</option>";
while($rowM = $resultado->fetch_assoc())
{
    $obtenerArm = "select Armadora from armadora where idArmadora = '".$rowM['idArmadora']."' ";
    $resultArm = $ConexionBD->query($obtenerArm);
    $resArmadora = $resultArm->fetch_array(MYSQLI_ASSOC);

    $html.= "<option value='".$rowM['idArmadora']."'>".$resArmadora['Armadora']."</option>";
}
echo $html;
?>