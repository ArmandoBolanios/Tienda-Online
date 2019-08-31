
 <?php
if (isset($_SESSION['userSession'])!="") {
	header("Location: principal.php");
    
}

require_once 'connections/conexion.php';
require_once 'funciones/generadorID.php';

if(isset($_POST['btnsignup'])) {
	
    
    //datos del socio
    $Denominacion = strip_tags($_POST['denominacion']);
    $Nombre       = strip_tags($_POST['nombre']);
    $Apellidopaterno     = strip_tags($_POST['apellidopaterno']);
    $Apellidomaterno     = strip_tags($_POST['apellidomaterno']);
    $Alias        = strip_tags($_POST['alias']);
    $Rfc          = strip_tags($_POST['rfc']);    
    $Observacion  = strip_tags($_POST['observacion']);
    
    
    //datos del correo 
    $Tipocorreo   = strip_tags($_POST['tipoCorreo']);
    $Correo       = strip_tags($_POST['correoElectronico']);
    
       //datos telefono
    $Ubicacion    = strip_tags($_POST['ubicacion']);
    $Telefono     = strip_tags($_POST['telefono']);
            
    
    //datos direccion   
 
    $Pais   = strip_tags($_POST['pais']);
    $Estado      = strip_tags($_POST['estado']);
    $Municipio   = strip_tags($_POST['delegacion']);
    $Colonia       = strip_tags($_POST['colonia']);
    $Calle   = strip_tags($_POST['calle']);
    $NumeroIn       = strip_tags($_POST['numerointerior']);
    $NumeroEx   = strip_tags($_POST['numeroexterior']);
    
    //datos de acceso    
	$uname = strip_tags($_POST['nombreusuario']);    
	$upass = strip_tags($_POST['password']); 
    $repass = strip_tags($_POST['reppassword']);
    
    $idSocio  = generarIDSocio ( );
	$denominacion = $conexionBD->real_escape_string($Denominacion);
	$nombre = $conexionBD->real_escape_string($Nombre);
	$apellidopaterno = $conexionBD->real_escape_string($Apellidopaterno);
	$apellidomaterno = $conexionBD->real_escape_string($Apellidomaterno);
	$alias = $conexionBD->real_escape_string($Alias);
	$rfc = $conexionBD->real_escape_string($Rfc);
	$observacion = $conexionBD->real_escape_string($Observacion);

   
	$tipocorreo = $conexionBD->real_escape_string($Tipocorreo);
	$correo = $conexionBD->real_escape_string($Correo);
    
         
	$ubicacion = $conexionBD->real_escape_string($Ubicacion);
	$telefono = $conexionBD->real_escape_string($Telefono);
   
	$pais = $conexionBD->real_escape_string($Pais);
	$estado = $conexionBD->real_escape_string($Estado);
	$municipio = $conexionBD->real_escape_string($Municipio);    
	$colonia = $conexionBD->real_escape_string($Colonia);
	$calle = $conexionBD->real_escape_string($Calle);
	$numeroIn = $conexionBD->real_escape_string($NumeroIn);
	$numeroEx = $conexionBD->real_escape_string($NumeroEx);
     
    
    
	$uname = $conexionBD->real_escape_string($uname); 
	$upass = $conexionBD->real_escape_string($upass);
    $repass = $conexionBD->real_escape_string($repass);
    $sello = $Nombre[0].$Apellidopaterno[0].$Apellidomaterno[0].date("Y-m-j H:i:s" );
    
    $Alias        = strip_tags($_POST['alias']);
    $Rfc          = strip_tags($_POST['rfc']);    
    $Observacion  = strip_tags($_POST['observacion']);
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT);    
	$hashed_repassword = password_hash($repass, PASSWORD_DEFAULT);
	$hashed_sello = password_hash($sello, PASSWORD_DEFAULT);
     
    
	
	$check_email = $conexionBD->query("SELECT denominacion FROM socio WHERE denominacion='$denominacion'");
	$count=$check_email->num_rows;
    
     
	
	if ($count==0) {
		
        
        //Consulta para insertar registro en tabla socio
$query = "INSERT INTO socio(idSocio, claveSocio, denominacion, nombreSocio, apellidoPaternoSocio, apellidoMaternoSocio, alias, rfc, observaciones, fechaDeRegistro, aux) VALUES ('$idSocio',0, '$denominacion', '$nombre', '$apellidopaterno','$apellidomaterno', '$alias', '$rfc', '$observacion', now(), 1) ";

//Consulta para insertar registro en tabla correoSocio
$insertarCorreoS = "INSERT INTO socio_correo(idSocio, tipoCorreo, correoElectronico, fechaDeRegistro, aux) VALUES ('$idSocio', '$tipocorreo', '$correo', now(), 1)";
        
              //Consulta para insertar registro en tabla telefonoSocio
$insertarTelS = "INSERT INTO socio_telefono(idSocio, ubicacion, telefono, fechaDeRegistro, aux) VALUES ('$idSocio', '$ubicacion', '$telefono', now(), 1)";

        
//Consulta para insertar registro en tabla direccionSocio
$insertarDirS = "INSERT INTO socio_direccion(idSocio, calle, numeroInterior, numeroExterior, colonia, delegacion, estado, pais, fechaDeRegistro, aux) VALUES ('$idSocio', '$calle', '$numeroIn', '$numeroEx', '$colonia', '$municipio', '$estado', '$pais', now(), 1)";
        
         
//Consulta para insertar registro de datos socios
$insertarDatoS = "INSERT INTO dat_socio(idSocio, user, password, firma, sello, certificado, fechaDeRegistro, aux) VALUES ('$idSocio', '$uname', '$hashed_password', '------', '$hashed_sello', '-----', now(), 1)";

       
            
        
        
if ($conexionBD->query($query) && $conexionBD->query($insertarCorreoS) && $conexionBD->query($insertarTelS) && $conexionBD->query($insertarDirS) && $conexionBD->query($insertarDatoS)) { 
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Registrado exitosamente  !  </div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error al registrar !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Lo siento el correo electrónico ya existe!
				</div>";
			
	}
  
	
	$conexionBD->close();
} //fin de php////////////////////////////////////////////////////////////////////////
?>
