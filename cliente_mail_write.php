<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $idCliente = $_SESSION['user_id'];
} else {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escribir Correo</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"   	type="text/css">
        <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" 	type="text/css">
        <link rel="stylesheet" href="css/estilos.css"   		type="text/css">
        <link rel="stylesheet" href="css/menu_cliente.min.css" 		type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" 	type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css"    	type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   	type="text/css">
        <link rel="stylesheet" href="css/cliente_mail_write.min.css" type="text/css">

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        if(isset($_SESSION['user_id'])) {
            $page='perfil_cliente'; 
            include 'php/lib-sitio_ok.php';

            include 'connections/conexion.php';
        } else {
            $page='inicio'; include 'php/lib-sitio.php';
        }
        ?>

        <!-- ===============================================================================================================================================-->

        <?php contenidoSitio(); ?>

        <br><br><br><br>
        <?php
        require 'funciones/PHPMailer/PHPMailerAutoload.php';
        date_default_timezone_set("america/mexico_city");
        $fecha = date("d-m-Y h:i:s");

        if(isset($_POST['enviarAdj'])) {
            $query = "SELECT cliente_correo.correoElectronico, nombre, apellidoPaterno, apellidoMaterno FROM cliente
			INNER JOIN cliente_correo WHERE cliente_correo.idCliente = '$idCliente' 
            AND cliente.idCliente = '$idCliente' ";
            $result = mysqli_query($ConexionBD, $query);
            while($row = mysqli_fetch_array($result)) {
                $emailCliente = $row["correoElectronico"];
                $nombreUsuario = $row["nombre"];
                $aPaterno = $row['apellidoPaterno'];
                $aPMaterno = $row['apellidoMaterno'];
                $correoCliente = $row['correoElectronico'];
            }

            // ----
            $mail = new PHPMailer();
            //$mail->isSMTP();
            $asunto = mysqli_real_escape_string($ConexionBD, $_POST['asunto']);
            $bod = mysqli_real_escape_string($ConexionBD, $_POST['cuerpo']);
            $cuerpo='
			<p>Hola Monte Carlo Automotriz</p>
			<p>'.$nombreUsuario.' '.$aPaterno.' '.$aPMaterno.' te ha enviado un mensaje:</p>
			<p>'.$bod.'</p>
            <br>
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
            $mail->Password = '****************'; // Modificar

            $from_name = "Monte Carlo Automotriz";

            $mail->setFrom($mail->Username,$nombreUsuario);

            $email = 'tucorreoelectronico@outlook.com';
            $mail->addAddress($email, $nombreUsuario); // DESTINATARIO

            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->IsHTML(true);

            //envio con attachment, datos del fichero
            if ($_FILES['archivoAdj']) {
                $mail->AddAttachment($_FILES['archivoAdj']['tmp_name'], $_FILES['archivoAdj']['name']);
            } 
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
                window.location="index_ok.php";
                }, 100);});});
                </script>
				';
                echo "<br>".$mail->ErrorInfo;
            } else {
                //echo "Hemos enviado tu mensaje";
                //print "<script>setTimeout(8000); window.location='cliente_perfil.php';</script>";
                echo '<script type="text/javascript">
                $(document).ready(function(){
                swal({
                title: "Mensaje enviado",
                imageUrl: "img/index/msg_yes2.png",
                text: "En breve avisaremos a soporte técnico",
                timer: 2000,
                showConfirmButton: false
                }, function () {
                setTimeout(function () {
                window.location="cliente_perfil.php";
                }, 100);});});
                </script>
				';
                exit;
            }

            $mensaje = mysqli_real_escape_string($ConexionBD, $_POST['cuerpo']);
            $SQLBuzonOperador = "INSERT INTO buzon_operador(idCliente, operador, mensaje,
					estado, fechaDeRegistro, aux)
					VALUES('$idCliente', 'DELL', '$mensaje', '1', NOW(), '1')";

            mysqli_query($ConexionBD, $SQLBuzonOperador);
        }
        ?>
        <!-- =====================================================================================================================================================-->
        <div class="container tiraPrincipal">
            <section class="content">
                <div class="row">
                    <?php 
                    $page2='mail_write';
                    include 'php/lib-menu_cliente.php';
                    ?>
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
                                        <input type="hidden" class="form-control" name="remitente">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Asunto:" name="asunto" />
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="cuerpo" style="height: 300px"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> Adjuntar archivo
                                            <input name="archivoAdj" type="file" />
                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>
                                </div> <!-- /.box-body -->

                                <div class="box-footer">
                                    <div class="pull-right">
                                        <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Borrador</button> -->
                                        <button type="submit" class="btn btn-primary" name="enviarAdj"><i class="fa fa-envelope-o"></i> &nbsp;Enviar</button>
                                    </div>
                                    <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Descartar</button> -->
                                </div> <!-- /.box-footer -->
                            </div> <!-- /. box -->
                        </div> <!-- /.col-md-9 -->
                    </form>
                </div> <!-- /.row -->
            </section>
        </div>

        <!-- =======================================================================================================================================================-->

        <?php footerSitio(); //pie de pagina?>

        <!-- =======================================================================================================================================================-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>
        <script src="js/validator_form.js"></script>
        <script src="js/menu_cliente.min.js"></script>
        <script src="js/cliente_mail_write.min.js"></script>
        <script>
            $(function () {
                //Add text editor
                //$("#cuerpo").wysihtml5();
            });
        </script>
        
        <script type="text/javascript" src="js/jarallax.js"></script>
        <script type="text/javascript">
            /* init Jarallax */
            $('.jarallax').jarallax({
                speed: 0.5,
                imgWidth: 1366,
                imgHeight: 768
            })
        </script>
    </body>
</html>