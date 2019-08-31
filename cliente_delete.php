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
        <title>Eliminación de la cuenta</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"   type="text/css">
        <link rel="stylesheet" href="css/menu_cliente.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilosTablas.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">

        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        if(isset($_SESSION['user_id'])) {
            $page='perfil_cliente';
            include 'php/lib-sitio_ok.php';
        } else {
            $page='inicio'; include 'php/lib-sitio.php';
        }
        ?>
        <div class="espacio"></div>
        <!-- ==========================================================================================================================================-->
        <?php
        # ----
        $errors = array();
        if(isset($_POST['delete_account'])) {
            include 'connections/conexion.php';
            require_once 'funciones/conf_email.php';
            date_default_timezone_set("america/mexico_city");
            # ---
            $cliente = $ConexionBD->query(
                "SELECT correoElectronico FROM cliente_correo WHERE idCliente = '$idCliente' ");
            while($fila = mysqli_fetch_array($cliente)) {
                $correo = $fila['correoElectronico'];
            }
            # ---
            $user_id       	= getValor('cliente.idCliente', 'correoElectronico', $correo);
            $nombreUsuario 	= getValor('cliente.nombre', 'correoElectronico', $correo);
            $aPaterno		= getValor('cliente.apellidoPaterno', 'correoElectronico', $correo);
            $aMaterno		= getValor('cliente.apellidoMaterno', 'correoElectronico', $correo);
            # ---
            $url = 'http://montecarloautomotriz.com/cliente_delete-ok.php?user_id='.$user_id;
            $asunto = 'Dar de baja la cuenta ';
            # ---
            $fecha = date("d-m-Y h:i:s");
            $cuerpo='
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
                <h1 style="color:#3498db;">Solicitud recibida</h1>
			</center>
            <p>Hola '.$nombreUsuario.' '.$aPaterno.' '.$aMaterno.'</p>
			<p>Has solicitado eliminar tu cuenta, para proceder, da clic al siguiente enlace:</p>
			<a href='.$url.' >Eliminar cuenta</a>
			<p>Fecha y Hora: '.$fecha.'</p>
			</div>
		';
            # ---
            if(enviarEmail($correo, $nombreUsuario, $asunto, $cuerpo)) {
                //echo "Hemos enviado un correo electronico a la direción $correo para procesar la petición";
                //print "<script>setTimeout(8000); window.location='index.php';</script>";
                echo '
                    <script type="text/javascript">
					$(document).ready(function(){
                    swal({
                    title: "Se ha enviado una notificación a:",
                    imageUrl: "img/index/msg_yes2.png",
                    text: "'.$correo.'",
                    timer: 2000,
                    showConfirmButton: false
                    }, function () {
                    setTimeout(function () {
                    window.location="index.php";
                    }, 100);});});
                    </script>
					';
                if(isset($_SESSION['user_id'])) {
                    session_destroy();
                    unset($_SESSION['user_id']);
                    header("Location: index.php");
                }
                exit;
            } else {
                //echo '<br><br><br><br>No se envió la petición';
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
                    window.location="cliente_perfil.php";
                    }, 100);});});
                    </script>
					';
            }
        }
        ?>
        <div class="container tiraPrincipal">
            <section class="content">
                <div class="row">
                    <?php 
                    $page2='delete_account';
                    include 'php/lib-menu_cliente.php';
                    ?>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <section class="container tiraPrincipal">
                                    <div class="col-lg-6 col-md-8 col-xs-8">
                                        <h4>¿Estás seguro de eliminar tu cuenta?</h4>
                                    </div>
                                    <br>
                                    <div class="col-lg-3 col-md-8 col-xs-8">
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                            <fieldset>
                                                <button type="submit" class="form-control btn btn-info" name="delete_account">Sí</button>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="col-lg-3 col-md-8 col-xs-8">
                                        <form method="POST" action="cliente_perfil.php" >
                                            <fieldset>
                                                <button type="submit" class="form-control btn btn-danger">No</button>
                                            </fieldset>
                                        </form>
                                    </div>
                                </section>								
                            </div>
                        </div>
                        <!-- /. box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>

        <?php footerSitio(); //pie de pagina?>

        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>
        <script src="js/menu_cliente.min.js"></script>
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