<?php
include_once '../connections/conexion.php';

if(isset($_POST['mail_password'])) {
    $userId  	= mysqli_real_escape_string($ConexionBD, $_POST['user_id']);
    $password	= mysqli_real_escape_string($ConexionBD, $_POST['password_email']);
    $cpassword	= mysqli_real_escape_string($ConexionBD, $_POST['cpassword_email']);

    $consultaPass = "UPDATE dat_cliente SET pass = '".md5($password)."' WHERE idCliente = '$userId' ";
    $result6 = mysqli_query($ConexionBD, $consultaPass);

    echo '
		<label class="text-primary">Tu contraseña se ha modificado</label>
		';
    /*print "<script>
				setTimeout(3000);
				window.location='../cliente_login.php';
			</script>";
            */
}

?>	