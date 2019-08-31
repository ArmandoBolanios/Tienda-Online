<?php 

if(isset($_POST['cambiarPass'])){
  
include '../connections/conexion.php'; 

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idSocio = $_POST['idSocio'];
$token = $_POST['token'];

if( $password1 != "" && $password2 != "" && $idSocio != "" && $token != "" ){
     $sqlR = " SELECT * FROM restablecerpass WHERE token = '$token' ";
     $resultadoR = mysqli_query($conexionBD,$sqlR);
    if( $resultadoR->num_rows > 0 ){
        $socio = $resultadoR->fetch_assoc();
        
		if( $socio['idSocio'] === $idSocio  ){
        
			if( $password1 === $password2 ){
                
	            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);  
                
                  $udpPass = "UPDATE dat_socio SET password ='$hashed_password' WHERE idSocio= '$idSocio' ";
                
                   $resultadoPass = mysqli_query($conexion,$udpPass);
                 
                
				   if($resultadoPass){
                       
					$sqlDelete = "DELETE FROM restablecerpass WHERE token = '$token';";
                     $resultadoDelete = mysqli_query($conexionBD,$sqlDelete);
                       
                     echo '<div class="alert alert-info success"><strong>La contraseña se actualizo correctamente! <a href=" http://localhost/Montecarlo05/login.php"><p>iniciar sesion</p></a></strong></div>'; 
                   }else{
                     echo '<div class="alert alert-danger"><strong>Error en la actualización!</strong></div>';
                   }
            }else{
                
            echo '<div class="alert alert-danger"><strong>Las contraseñas deben ser iguales!</strong></div>';
                
            }
        }else{
            echo '<div class="alert alert-danger"><strong>Error en la actualización!</strong></div>';
        }
        
    }else{
         echo '<div class="alert alert-danger"><strong>Error en la actualización!</strong></div>';
    }
    
}else{
    echo '<div class="alert alert-warning"><strong>Los campos no deben estar vacios! </strong></div>';
}
    
}
?>  
		 