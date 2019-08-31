<?php

require_once '../connections/conexion.php'; 
//$conexion = new mysqli('localhost','root','','test');
$placa = $_GET['term'];
$consulta = "select placa FROM unidad_movil WHERE placa LIKE '%$placa%'";

$result = $conexionBD->query($consulta);

if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$placas[] = $fila['placa'];		
	}
	echo json_encode($placas);
} 

 


?>