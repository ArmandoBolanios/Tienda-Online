<?php
function con(){
	return new mysqli("localhost","montecar","4W8vxB4h6m","montecar_bd");
}

function insert_inicio_sess() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];
	
	$fechaInicio = date('Ymd').date('His');
	
	
	$primeraSesion = "INSERT INTO sesiones(idCliente, fechaHoraInicio, fechaHoraSalida)
	VALUES('$idCliente', now(), now() ) ";
	
	mysqli_query($ConexionBD, $primeraSesion);
}

function finalizar_salida_sess() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];
	
	
	$fechaSalida = date('Ymd').date('His');
	
	$actualizarSesion = "UPDATE sesiones SET fechaHoraSalida = now() 
	WHERE idCliente ='$idCliente' ";
	
	mysqli_query($ConexionBD, $actualizarSesion);
}
?>