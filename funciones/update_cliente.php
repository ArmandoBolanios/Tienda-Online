<?php
function con(){
	return new mysqli("localhost","montecar","4W8vxB4h6m","montecar_bd");
}

//$calle 			= mysqli_real_escape_string($ConexionBD, $_POST['calle']);
function edt_datos_cliente() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];

	if(isset($_POST['update'])) {
		$denom =         mysqli_real_escape_string($ConexionBD, $_POST['denominacion']);
		$nombre =        mysqli_real_escape_string($ConexionBD, $_POST['nombre']);
		$ap =            mysqli_real_escape_string($ConexionBD, $_POST['apellidopaterno']);
		$am =            mysqli_real_escape_string($ConexionBD, $_POST['apellidomaterno']);
		$rfc =           mysqli_real_escape_string($ConexionBD, $_POST['rfc']);

		$consulta = "UPDATE cliente SET denominacion= '$denom',nombre='$nombre', apellidoPaterno='$ap', apellidoMaterno='$am',
            				rfc= '$rfc' WHERE idCliente= '$idCliente' ";


		$result1 = mysqli_query($ConexionBD, $consulta);
		echo '<h4 class="text-primary">Datos Actualizados</h4>';
		//echo '<label class="text-primary">Contraseña correcta!</label>';
	}
}

function edt_correo_cliente() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];

	if(isset($_POST['update_correo'])) {

		$tipoCorreo         = mysqli_real_escape_string($ConexionBD, $_POST['tipoCorreo']);
		$correoElectronico  = mysqli_real_escape_string($ConexionBD, $_POST['correoElectronico']);

		$consultaMail = "UPDATE cliente_correo SET tipoCorreo= '$tipoCorreo', correoElectronico='$correoElectronico' WHERE idCliente= '$idCliente' ";
		$result2 = mysqli_query($ConexionBD, $consultaMail);
		
		echo '<h4 class="text-primary">Datos Actualizados</h4>';
	}
}

function edt_direccion_cliente() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];

	if(isset($_POST['update_direccion'])) {

		$calle           = mysqli_real_escape_string($ConexionBD, $_POST['calle']);
		$numeroInterior  = mysqli_real_escape_string($ConexionBD, $_POST['numeroInterior']);
		$numeroExterior  = mysqli_real_escape_string($ConexionBD, $_POST['numeroExterior']);
		$colonia         = mysqli_real_escape_string($ConexionBD, $_POST['colonia']);
		$delegacion      = mysqli_real_escape_string($ConexionBD, $_POST['delegacion']);
		$estado          = mysqli_real_escape_string($ConexionBD, $_POST['estado']);
		//$pais            = $_POST['pais'];
		$codigoPostal    = mysqli_real_escape_string($ConexionBD, $_POST['codigoPostal']);
		
		$consultaDireccion = "UPDATE cliente_direccion SET calle= '$calle', numeroInterior='$numeroInterior', numeroExterior='$numeroExterior', colonia='$colonia', delegacion='$delegacion', estado='$estado', codigoPostal='$codigoPostal'
		WHERE idCliente= '$idCliente' ";
		$result3 = mysqli_query($ConexionBD, $consultaDireccion);
		
		echo '<h4 class="text-primary">Datos Actualizados</h4>';
	}
}

function edt_telefono_cliente() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];

	if(isset($_POST['update_telefono'])) {

		$ubicacion = mysqli_real_escape_string($ConexionBD, $_POST['ubicacion']);
		$telefono  = mysqli_real_escape_string($ConexionBD, $_POST['telefono']);

		$consultaTelefono = "UPDATE cliente_telefono SET ubicacion= '$ubicacion', telefono='$telefono' WHERE idCliente= '$idCliente' ";
		$result4 = mysqli_query($ConexionBD, $consultaTelefono);
		
		echo '<h4 class="text-primary">Datos Actualizados</h4>';
	}
}

function edt_user_cliente() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];
	
	if(isset($_POST['change_user'])) {
		$usuario = mysqli_real_escape_string($ConexionBD, $_POST['nomusuario13']);
		
		$consultaUsuario = "UPDATE dat_cliente SET user = '$usuario' WHERE idCliente = '$idCliente' ";
		$result5 = mysqli_query($ConexionBD, $consultaUsuario);
		echo '
			<label class="text-success">El nombre de usuario ha sido ¡Actualizado!</label>
			';
	}
}

function edt_password() {
	$ConexionBD = con();
	$idCliente = $_SESSION['user_id'];
	
	if(isset($_POST['change_password'])) {
		$password	= mysqli_real_escape_string($ConexionBD, $_POST['password']);
		$cpassword	= mysqli_real_escape_string($ConexionBD, $_POST['cpassword']);
		
		$consultaPass = "UPDATE dat_cliente SET pass = '".md5($password)."' WHERE idCliente = '$idCliente' ";
		$result6 = mysqli_query($ConexionBD, $consultaPass);
		echo '
		<label class="text-success">Tu contraseña se ha modificado!!</label>
		';
	}
}

?>




