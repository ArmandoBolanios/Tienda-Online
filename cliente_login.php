<?php
session_start();
if(isset($_SESSION['user_id']) != "") {
    header("Location: index_ok.php");
}

require_once 'connections/conexion.php';
include_once 'funciones/insert_sesiones.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $usuario = mysqli_real_escape_string($ConexionBD, $_POST['usuario']);
    $password = mysqli_real_escape_string($ConexionBD, $_POST['contrasenia']);
    $result = mysqli_query($ConexionBD, "SELECT * FROM dat_cliente WHERE user = '" . $usuario. "' and pass = '" . md5($password) . "' and aux='1' ");
    /*$result = mysqli_query($ConexionBD, "SELECT DISTINCT correoElectronico, pass FROM cliente_correo 
	INNER JOIN dat_cliente WHERE cliente_correo.idCliente = dat_cliente.idCliente and pass = '" . md5($password) . "'");*/

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['idCliente'];
        $_SESSION['user_name'] = $row['user'];
        $_SESSION['user_aux']	 = $row['aux'];

        insert_inicio_sess();
        header("Location: index_ok.php");
    } else {
        $errormsg = "<h6>¡Datos incorrectos: Email  o Contraseña!</h6>";
        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Cliente</title>
        <link rel="stylesheet" href="css/estilos.css" type="text/css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/style_login.css" type="text/css"/>
    </head>
    <body>
        
        <div class="espacio"></div><div class="espacio"></div>
        
        <div class="main">
            <div class="main-w3l">
                <div class="w3layouts-main">
                    <h2><span><i class="icon_lock_alt">Iniciar sesión</i></span></h2>
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" role="form" class=" form-horizontal login-form">
                        <input placeholder="Nombre de usuario" name="usuario" type="text" required>
                        <input placeholder="Contraseña" name="contrasenia" type="password" required>
                        <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                        <input type="submit" value="Entrar" name="login">
                    </form>
                    <h6 class="pull-right"><a href="cliente_change-email.php">¿Olvidaste tu contraseña?</a></h6>
                    <h6 class="pull-left"><i class="fa fa-mail-reply"></i> <a href="index.php">Regresar</a></h6>
                </div>
                <!-- //main -->
                
                <!--footer-->
                <div class="footer-w3l">
                    <p>&copy; 2018 Monte'Carlo Automotriz. Todos los derechos reservados</p>
                </div>
                <!--//footer-->
                
            </div>
        </div>
        

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body> 
</html> 