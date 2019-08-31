<?php
require ('../../connections/conexion.php');

$id_region = $_POST['id_region'];
$id_anio = $_POST['id_anio'];
$id_armadora = $_POST['id_armadora'];
$id_modelo = $_POST['id_modelo'];

$query = "SELECT  DIstinct (idCilindro) FROM clase WHERE idRegion ='$id_region' AND idAnio = '$id_anio' AND idArmadora = '$id_armadora' AND idModelo = '$id_modelo' ORDER BY idCilindro";

$resultado=$ConexionBD->query($query);


$html= "<option value='0'>seleccionar</option>";
while($rowM = $resultado->fetch_assoc())
{
    $obtenerCil = "select cilindro from cilindro where idCilindro = '".$rowM['idCilindro']."' ";
    $resultCil = $ConexionBD->query($obtenerCil);
    $resCilindro = $resultCil->fetch_array(MYSQLI_ASSOC);

    $html.= "<option value='".$rowM['idCilindro']."'>".$resCilindro['cilindro']."</option>";
}
echo $html;
?>