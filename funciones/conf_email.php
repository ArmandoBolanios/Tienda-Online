<?php
//------------------------------------------ para mostrar los errores
function resultBlock($errors){
    if(count($errors) > 0) {
        echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
        foreach($errors as $error) {
            echo "<li>".$error."</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

//-------------------------------------------- valida si es un email
function isEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}
//---------------------------------------------- si el email existe
function emailExiste($email) {
    require 'connections/conexion.php';
    $stmt = $ConexionBD->prepare("SELECT idCliente FROM cliente_correo WHERE correoElectronico = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->close();

    if ($num > 0){
        return true;
    } else {
        return false;	
    }
}

//---------------------------- obtiene el correo de la base de datos
function getValor($campo, $campoWhere, $valor) {
    require 'connections/conexion.php';
    $stmt = $ConexionBD->prepare("SELECT $campo FROM cliente_correo INNER JOIN cliente
	ON cliente_correo.idCliente = cliente.idCliente
	WHERE $campoWhere = ? LIMIT 1");
    $stmt->bind_param('s', $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if ($num > 0) {
        $stmt->bind_result($_campo);
        $stmt->fetch();
        return $_campo;
    }
    else {
        return null;	
    }
}

//enviar email al cliente
function enviarEmail($email, $nombreUsuario, $asunto, $cuerpo){
	require 'funciones/PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer();
	//$mail->isSMTP();
	$mail->Charset = 'UTF-8';
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

//--------------------------------enviar email al administrador
function enviarAdjunto($email, $nombreUsuario, $asunto, $cuerpo){
    require 'funciones/PHPMailer/PHPMailerAutoload.php';
	
    $mail = new PHPMailer();
    //$mail->isSMTP();
    $mail->Charset = 'UTF-8';
    $mail->SMTPDebug = 0; //mostrar los errores
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; // Modificar
    $mail->Host = 'smtp.live.com'; // Modificar
    $mail->Port = 25; // Modificar
    $mail->Username = 'tucorreoelectronico@outlook.com'; // Modificar
    $mail->Password = 'tucontraseña'; // Modificar

    $mail->setFrom($email, $nombreUsuario);
    $mail->addAddress('tucorreoelectronico@outlook.com', 'Monte Carlo Automotriz');

    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->IsHTML(true);

    //envio con attachment, datos del fichero
    if ($_FILES['archivoAdj']) {
        $mail->AddAttachment($_FILES['archivoAdj']['tmp_name'], $_FILES['archivoAdj']['name']);
    } 
    //ENVIO DEL EMAIL ...
    if($mail->send() ) {
        return true;
    }
    else {
        return false;
    }
}

// ------------------------------------- enviar mensaje simple al administrador
function sendMSG($email, $nombreUsuario, $asunto, $cuerpo){
    require 'funciones/PHPMailer/PHPMailerAutoload.php';
	
    $mail = new PHPMailer();
    //$mail->isSMTP();
    $mail->Charset = 'UTF-8';
    $mail->SMTPDebug = 0; //mostrar los errores
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; // Modificar
    $mail->Host = 'smtp.live.com'; // Modificar
    $mail->Port = 25; // Modificar
    $mail->Username = 'tucorreoelectronico@outlook.com'; // Modificar
    $mail->Password = 'tucontraseña'; // Modificar

    $mail->setFrom($email, $nombreUsuario);
    $mail->addAddress('tucorreoelectronico@outlook.com', 'Monte Carlo Automotriz');

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