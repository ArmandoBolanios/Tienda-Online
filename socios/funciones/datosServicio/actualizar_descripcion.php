<?php   
  session_start();
require_once '../../connections/conexion.php'; 
$sesionSocio = $_SESSION['userSession'];   
 
            
    $idNota=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idVehiculo"],ENT_QUOTES))); 
    $interior =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["interior"],ENT_QUOTES)));
    $exterior =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["exterior"],ENT_QUOTES))); 
    $maletera =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["maletera"],ENT_QUOTES)));  
   
    //compara los datos mandados
	 if(!empty($_POST['idVehiculo']) && !empty($_POST['interior']) && !empty($_POST['exterior']) && !empty($_POST['maletera'])){   
         
      $sql="UPDATE nota_servicio SET  observacionesInterna='".$interior."', observacionesExterna='".$exterior."',
		observacionesMaletera='".$maletera."' WHERE idNotaServicio='".$idNota."'";
 
  
         //basía los registros a la bd
         if ($conexionBD->query($sql) )  {
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro actualizado\", \"success\");});</script>";
		}else {
			 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Registro no actualizado\", \"danger\");});</script>";
		}
		
	} else { 
	 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Algo sali mal\", \"danger\");});</script>";
			
	}
   
 
?>