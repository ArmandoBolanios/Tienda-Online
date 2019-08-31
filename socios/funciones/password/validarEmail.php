<?php

if(isset($_POST['cambiarPass'])){
  
require_once("../styles/PHPMailer/PHPMailerAutoload.php");

function generarLinkTemporal($idSocio, $idusuario){
      
   include '../conexion/conexion.php'; 
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
  
   // Se inserta el registro en la tabla tblreseteopass
   $sqlq = "INSERT INTO restablecerpass (idSocio, token, fechaRecuperacion) VALUES('$idSocio','$token',NOW())";
     
  $resultadom = mysqli_query($conexion,$sqlq);
   if($resultadom){
      // Se devuelve el link que se enviara al usuario
    $enlace = 'http://localhost/Montecarlo05/aplicacion/restablecerPass.php?idSocio='.$idSocio.'&token='.$token;
        
    return $enlace;
   }
   else
      return FALSE;
}

function enviarEmail( $email, $link ){
    
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug =0;
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 587;   
$mail->SMTPSecure = 'tls';  
$mail->Username = 'croblescisneros@gmail.com';
$mail->Password = '707pretende12345';
$mail->setFrom('croblescisneros@gmail.com', 'Monte Carlo Automotriz');
$mail->addAddress($email);  
    
$mail->isHTML(true);      
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
     <h1>Hola lo saluda, Monte*carlo Automotriz  </h1>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
    
    $mail->Subject = 'Monte Carlo Automotriz';
$mail->Body = $mensaje; 

  $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->Send();
   
}

 
$email = $_POST['email']; 
$respuesta = new stdClass();
  
if( $email != "" ){ 
     
   include '../conexion/conexion.php'; 
   $sqll = " SELECT * FROM socio_correo WHERE correoElectronico = '$email' ";
   $resultado1 =mysqli_query($conexion,$sqll );
      
    if($resultado1->num_rows > 0){
     $usuario = $resultado1->fetch_assoc();
      
      $linkTemporal = generarLinkTemporal( $usuario['idSocio'], $usuario['idSocioCorreo']);
       
       if($linkTemporal){
        enviarEmail( $email, $linkTemporal );
          
      echo '<div class="alert alert-info"><strong>Revise su cuenta de correo, para restablecer su contraseña! '.$email. '</strong></div>';
       }
        
    }else{
        echo  '<div class="alert alert-warning"><strong> No existe una cuenta asociada a ese correo.</strong> </div>';
    }
    
}else{
    echo '<div class="alert alert-warning">Error desconocido. </div>';
}
    
}
   
    
 



?>