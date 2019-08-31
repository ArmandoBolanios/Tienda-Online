<?php
//enviar email al cliente
function enviarEmail($email, $nombreUsuario, $asunto, $cuerpo){
	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();
	//$mail->isSMTP();
	$mail->SMTPDebug = 0; //mostrar los errores
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls'; // Modificar
	$mail->Host = 'smtp.live.com'; // Modificar
	$mail->Port = 25; // Modificar
	$mail->Username = 'tucorreoelectronico@outlook.com'; // Modificar
	$mail->Password = 'tucontraseña'; // Modificar

	$from_name = "Monte Carlo Automotriz";
	
	//$mail->setFrom('pruebasmontecarlo@gmail.com'); // Modificar REMITENTE 
	$mail->setFrom($mail->Username,$from_name);
	$mail->addAddress($email, $nombreUsuario); // DESTINATARIO

	$mail->Subject = $asunto;
	$mail->Body    = $cuerpo;
	$mail->IsHTML(true);
	
	//ENVIO DEL EMAIL ...
	if($mail->send() ) {
		return true;
	}
	else {
		return false;
	}
}

?>