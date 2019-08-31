<?php
if(!empty($_POST)) {
    require_once '../connections/conexion.php';
    require '../php/lib-generadorID.php';
    require 'activar_email.php';
	date_default_timezone_set("america/mexico_city");
	
    //datos del cliente ...
    $idCliente			= generarIDCLIENTE ();
    $clavecliente     	= 0;
    $denominacion 		= mysqli_real_escape_string($ConexionBD, $_POST['denominacion']);
    $nuevaDenominacion  = trim($denominacion);
    $nombre 			= mysqli_real_escape_string($ConexionBD, $_POST['nombre']);
    $nuevoNombre        = trim($nombre);
    $apellidopaterno 	= mysqli_real_escape_string($ConexionBD, $_POST['apellidopaterno']);
    $nuevoAP            = trim($apellidopaterno);
    $apellidomaterno	= mysqli_real_escape_string($ConexionBD, $_POST['apellidomaterno']);
    $nuevoAM            = trim($apellidomaterno);
    /*$fechaRegistro		= now();*/
    $rfc 				= mysqli_real_escape_string($ConexionBD, $_POST['rfc']);
    $nuevoRFC           = trim($rfc);
    $aux				= 1;

    //datos de cliente_correo ...
    $correoElectronico = mysqli_real_escape_string($ConexionBD, $_POST['correoElectronico']);

    //datos cliente_direccion ..
    $calle 			= mysqli_real_escape_string($ConexionBD, $_POST['calle']);
    $nuevaCalle     = trim($calle);
    $numerointerior = mysqli_real_escape_string($ConexionBD, $_POST['numerointerior']);
    $numeroexterior = mysqli_real_escape_string($ConexionBD, $_POST['numeroexterior']);
    $colonia 		= mysqli_real_escape_string($ConexionBD, $_POST['colonia']);
    $nuevaColonia   = trim($colonia);

    $delegacion 	= mysqli_real_escape_string($ConexionBD, $_POST['delegacion']);
    $estado 		= mysqli_real_escape_string($ConexionBD, $_POST['estado']);
    $estado1        = mb_strtoupper($estado);
    $municipio      = mb_strtoupper($delegacion);

    $codigoPostal 	= mysqli_real_escape_string($ConexionBD, $_POST['codigoPostal']);
    //datos cliente_telefono ...
    $telefono  		= mysqli_real_escape_string($ConexionBD,  $_POST['telefono']);
    //datos de inicio de sesion ...
    $nomusuario     = mysqli_real_escape_string($ConexionBD, $_POST['nomusuario']);
    $nombreUser     = strtolower($nomusuario);

    $password       = mysqli_real_escape_string($ConexionBD, $_POST['password']);
    $cpassword      = mysqli_real_escape_string($ConexionBD, $_POST['cpassword']);

    //insercion de registros ...
    $sql = "INSERT INTO cliente (idCliente, claveCliente, denominacion, nombre, apellidoPaterno,
					apellidoMaterno,fechaRegistro, rfc, aux)
                    VALUES('$idCliente' , '$clavecliente', '$nuevaDenominacion', '$nuevoNombre', '$nuevoAP',
					'$nuevoAM', now(), '$nuevoRFC', '$aux') ";

    $sql2 = "INSERT INTO cliente_correo(idCliente, tipoCorreo, correoElectronico, fechaDeRegistro, aux)
                    VALUES ('$idCliente', 'Personal', '$correoElectronico', now(), '$aux')";

    $sql4 = "INSERT INTO cliente_direccion(idCliente, calle, numeroInterior, numeroExterior, colonia, 
					delegacion, estado, pais, codigoPostal, fechaDeRegistro, aux)
			        VALUES('$idCliente', '$nuevaCalle', '$numerointerior', '$numeroexterior', '$nuevaColonia', '$municipio', 
					'$estado1', 'MEXICO', '$codigoPostal', now(), '$aux')";

    $sql5 = "INSERT INTO cliente_telefono(idCliente, ubicacion, telefono, fechaDeRegistro, aux)
                    VALUES('$idCliente', 'Personal', '$telefono', now(), '$aux')";

    $sqlSesion = "INSERT INTO dat_cliente(idCliente, user, pass, firma, fechaDeRegistro, aux)
                    VALUES('$idCliente', '$nombreUser', '".md5($password)."', '000000000000000', now(), '0')";


    $url = 'http://montecarloautomotriz.com/activarCliente-ok.php?user_id='.$idCliente;
    $asunto = 'Registro Monte Carlo Automotriz';
	$fecha = date("d-m-Y h:i:s");
    $comentario='
			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				<img src="http://montecarloautomotriz.com/img/index/logo_mt.png" width="300px" heigth="250px">
				<h1 style="text:center;">Monte Carlo Automotriz</h1>
                <h1 style="color:#3498db;">Activar cuenta</h1>
			</center>
			<p>Hola '.$nuevoNombre.' '.$nuevoAP.' '.$nuevoAM.'</p>
			<p>Te has registrado en Monte Carlo Automotriz; para proceder a la activacion de tu cuenta, da clic en el siguiente enlace:</p>
			<a href='.$url.' >Activar cuenta</a>
			<br>
			<p>Fecha y Hora: '.$fecha.'</p>
			</div>

		';

    if(mysqli_query($ConexionBD, $sql)) {
        mysqli_query($ConexionBD, $sql2);
        mysqli_query($ConexionBD, $sql4);
        mysqli_query($ConexionBD, $sql5);
        mysqli_query($ConexionBD, $sqlSesion);
        echo '1';
        //datos para verificar que se envian en console
        if(enviarEmail($correoElectronico, $nuevoNombre, $asunto, $comentario)) {
			//echo "Siiii";
            //echo '1';
		} else {
			echo "Nooooo";
		}
        //var_dump ($_POST);
    } else {
        die('Error: ' . mysqli_error($ConexionBD));
    } //end ELSE


    mysqli_close($ConexionBD);
} //end EMPTY _$POST
?>
