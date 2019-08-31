<?php
require ('../../connections/conexion.php');

$id_region = $_POST['id_region'];
$id_anio = $_POST['id_anio'];
$id_armadora = $_POST['id_armadora'];
$id_modelo = $_POST['id_modelo'];
$id_cilindro = $_POST['id_cilindro'];


$query = "SELECT  DIstinct (idLitro) FROM clase WHERE idRegion ='$id_region' AND idAnio = '$id_anio' AND idArmadora = '$id_armadora' AND idModelo = '$id_modelo' AND idCilindro = '$id_cilindro' ORDER BY idLitro";

$resultado=$ConexionBD->query($query);


$html= "<option value='0'>seleccionar</option>";
while($rowM = $resultado->fetch_assoc())
{
    $obtenerArm = "select litro from litro where idLitro = '".$rowM['idLitro']."' ";
    $resultArm = $ConexionBD->query($obtenerArm);
    $resArmadora = $resultArm->fetch_array(MYSQLI_ASSOC);

    $html.= "<option value='".$rowM['idLitro']."'>".$resArmadora['litro']."</option>";
}
echo $html;
?>