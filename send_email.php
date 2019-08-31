<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enviar correo</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"   	type="text/css">
        <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" 	type="text/css">
        <link rel="stylesheet" href="css/estilos.css"   		type="text/css">
        <link rel="stylesheet" href="css/menu_cliente.min.css" 		type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" 	type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css"    	type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   	type="text/css">
        <link rel="stylesheet" href="css/cliente_mail_write.min.css" type="text/css">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript"  src="js/sweetalert.min.js"></script>
    </head>

    <body>
        <?php 
        if(isset($_SESSION['user_id'])) {
            $page='inicio'; include 'php/lib-sitio_ok.php';    
        } else {
            $page='inicio'; include 'php/lib-sitio.php';
        }
        ?>
        <!-- =================================================================================================== -->
        <div class="espacio"></div>
        <div class="main container tiraCentral">
            <div class="col-lg-6 hidden-sm hidden-xs">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li class=""><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                    <li class="active"><span>Contacto</span></li>
                </ol>
            </div> <!--termina col-lg-8 -->
        </div> <!--termina tiraCentral -->
        <!-- =================================================================================================  -->
        <?php
        require_once 'connections/conexion.php';
        require 'funciones/PHPMailer/PHPMailerAutoload.php';
        $errors = array();
        date_default_timezone_set("america/mexico_city");
        $fecha = date("d-m-Y h:i:s");

        if(isset($_POST['enviarCorreo'])) {
            $nombre = mysqli_real_escape_string($ConexionBD, $_POST['nombreRemitente']);
            $correoCliente = mysqli_real_escape_string($ConexionBD, $_POST['correo']);
            $email = 'tucorreoelectronico@outlook.com';
            $asunto = mysqli_real_escape_string($ConexionBD, $_POST['asunto']);
            $bod = mysqli_real_escape_string($ConexionBD, $_POST['cuerpo']);

            $mail = new PHPMailer();
            //$mail->isSMTP();
            $cuerpo='
			<p>Hola Monte Carlo Automotriz</p>
			<p>Un cliente no registrado con nombre: '.$nombre.' ha enviado un mensaje:</p>
			<p>'.$bod.'</p>
            <br><br>
			<p>Fecha y Hora: '.$fecha.'</p>
			<p>Correo electronico: '.$correoCliente.'</p>
			</div>
            ';

            $mail->SMTPDebug = 0; //mostrar los errores
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; // Modificar
            $mail->Host = 'smtp.live.com'; // Modificar
            $mail->Port = 25; // Modificar
            $mail->Username = 'tucorreoelectronico@outlook.com'; // Modificar
            $mail->Password = '**************'; // Modificar

            $from_name = "Monte Carlo Automotriz";

            $mail->setFrom($mail->Username,$nombre);

            $mail->addAddress($email, $nombre); // DESTINATARIO

            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->IsHTML(true);

            $exito = $mail->Send();
            $intentos=1;
            while((!$exito) && ($intentos < 5)) {
                sleep(5);
                $exito = $mail->Send();
                $intentos = $intentos+1;
            }
            if(!$exito) {
                //echo "Hay problemas al enviar el correo electronico";
                echo '<script type="text/javascript">
                $(document).ready(function(){
                swal({
                title: "Lo sentimos",
                imageUrl: "img/index/msg_no.png",
                text: "Tu mensaje no se pudo enviar",
                timer: 2000,
                showConfirmButton: false
                }, function () {
                setTimeout(function () {
                window.location="send_email.php";
                }, 100);});});
                </script>
				';
                echo "<br>".$mail->ErrorInfo;
            } else {
                //echo "Hemos enviado tu mensaje";
                //print "<script>setTimeout(8000); window.location='index.php';</script>";
                echo '<script type="text/javascript">
                $(document).ready(function(){
                swal({
                title: "Tu mensaje se ha enviado",
                imageUrl: "img/index/msg_yes2.png",
                timer: 2000,
                showConfirmButton: false
                }, function () {
                setTimeout(function () {
                window.location="index.php";
                }, 100);});});
                </script>
				';
                exit;
            }
        }
        ?>
        <!-- =================================================================================================  -->
        <div class="container tiraPrincipal">
            <section class="content">
                <div class="row">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form" 
                          enctype="multipart/form-data"  id="validaEnvioCorreo" name="validaEnvioCorreo">
                        <div class="col-md-9">
                            <div class="box box-armando">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Escribe tu mensaje</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre completo" name="nombreRemitente">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Correo electrónico" name="correo" type="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Asunto" name="asunto" />
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="cuerpo" 
                                                  style="height: 300px"></textarea>
                                    </div>
                                </div> <!-- /.box-body -->

                                <div class="box-footer">
                                    <div class="pull-right">
                                        <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Borrador</button> -->
                                        <button type="submit" class="btn btn-primary" name="enviarCorreo"><i class="fa fa-envelope-o"></i> &nbsp;Enviar</button>
                                    </div>
                                    <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Descartar</button> -->
                                </div> <!-- /.box-footer -->
                            </div> <!-- /. box -->
                        </div> <!-- /.col-md-9 -->
                    </form>
                </div> <!-- /.row -->
            </section>
        </div>
        <!-- ===============================================================================================================-->
        <?php
        footerSitioNormal();
        ?>
        <!-- =================================================================================================================-->
        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>
        <script src="js/validator_form.js"></script>
        <script src="js/cliente_mail_write.min.js"></script>
        
    </body>
</html>