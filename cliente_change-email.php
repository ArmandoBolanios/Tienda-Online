<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar contraseña</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
        <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons-style.css" type="text/css">
        <link rel="stylesheet" href="css/style-Login_Cliente.css" type="text/css">
        <link rel="stylesheet" href="css/style-responsive.css" type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
    </head>
    <body>
        <?php $page='inicioSC'; include 'php/lib-sitio.php'; ?>
        <div class="espacio"></div><div class="espacio"></div>
        <!-- -->
        <?php
        require_once 'connections/conexion.php';
        require_once 'funciones/conf_email.php';

        $errors = array();
        if(!empty($_POST)) {
            $email = mysqli_real_escape_string($ConexionBD, $_POST['recover_mail']);
            if(!isEmail($email)) {
                $errors[] = "Debe ingresar un email válido";
            } // end isEmail

            if(emailExiste($email)) {
                //hace una consulta a la tabla cliente_correo
                $user_id       = getValor('cliente.idCliente', 'correoElectronico', $email);
                $nombreUsuario = getValor('cliente.nombre', 'correoElectronico', $email);
                $aPaterno      = getValor('cliente.apellidoPaterno', 'correoElectronico', $email);
                $aMaterno      = getValor('cliente.apellidoMaterno', 'correoElectronico', $email);

                date_default_timezone_set("america/mexico_city");

                $url = 'http://montecarloautomotriz.com/cliente_change-password.php?user_id='.$user_id;
                $asunto = 'Recuperar '.utf8_decode('contraseña').'';
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
                <h1 style="color:#3498db;">'.utf8_decode('Soporte técnico').'</h1>
			    </center>
			    <p>Hola '.$nombreUsuario.' '.$aPaterno.' '.$aMaterno.'</p>
			    <p>Has solicitado cambio de clave, para proceder da clic en el siguiente enlace:</p>
			    <a href='.$url.' >Cambio de '.utf8_decode('contraseña').'</a>
			    <p>Fecha y Hora: '.$fecha.'</p>
			    </div>
                ';
                
                if(enviarEmail($email, $nombreUsuario, $asunto, $comentario)) {
                    //echo "Hemos enviado un correo electronico a la direción $email para restablecer tu contraseña";
                    //print "<script>setTimeout(8000); window.location='cliente_login.php';</script>";
                    echo '
                    <script type="text/javascript">
					$(document).ready(function(){
                    swal({
                    title: "Mensaje enviado a:",
                    imageUrl: "img/index/msg_yes2.png",
                    text: "'.$email.'",
                    timer: 2000,
                    showConfirmButton: false
                    }, function () {
                    setTimeout(function () {
                    window.location="cliente_login.php";
                    }, 100);});});
                    </script>
					';
                    exit;
                } else {
                    echo '
                    <script type="text/javascript">
					$(document).ready(function(){
                    swal({
                    title: "Lo sentimos",
                    imageUrl: "img/index/msg_no.png",
                    text: "Tu mensaje no se pudo enviar",
                    timer: 2000,
                    showConfirmButton: false
                    }, function () {
                    setTimeout(function () {
                    window.location="cliente_change-email.php";
                    }, 100);});});
                    </script>
					';
                    $errors[] = "Error al enviar email";
                }
            } else {
                $errors[] = "El email no existe";
            }
        } // end POST

        ?>
        <!-- -->
        <div class="container">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form" 
                  class=" form-horizontal login-form">        
                <fieldset>
                    <div class="login-wrap">
                        <p class="login-img"><i class="icon_lock_alt"></i></p>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_profile"></i></span>
                            <input type="email" name="recover_mail" class="form-control" 
                                   placeholder="Introduce tu correo electrónico" required >
                        </div>
                        <label class="checkbox">
                            <span class="pull-right"> <a href="cliente_login.php"> Regresar al inicio de sesión</a></span>
                        </label>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" 
                                name="enviar_email">Enviar</button>
                    </div>
                    <div class="panel-footer">
                        ¿No te has registrado? <a href="cliente_registrar.php">Registrate ahora</a>
                    </div>
                </fieldset>
            </form>
            <?php echo resultBlock($errors); ?>
        </div>

        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body> 
</html> 