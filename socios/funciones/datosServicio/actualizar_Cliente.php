<?php   
  session_start();
require_once '../../connections/conexion.php'; 
$sesionSocio = $_SESSION['userSession'];   
 
            
    $nota=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idNota"],ENT_QUOTES))); 
    $placa=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["placa"],ENT_QUOTES)));   
    $chofer=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idChofer"],ENT_QUOTES)));  
   
    //compara los datos mandados
	 if(!empty($_POST['idNota']) && !empty($_POST['placa']) && !empty($_POST['idChofer']) ){   
       
         $unidad=$conexionBD->query("SELECT * FROM unidad_movil WHERE placa='$placa'");
         $unidadMo = $unidad->fetch_array(); 
         $idUnidad = $unidadMo['idUnidadMovil'];
         $idEmpresa = $unidadMo['idEmpresa'];
         
         $chofer=$conexionBD->query("SELECT * FROM chofer_unidad WHERE idUnidadMovil='$idUnidad'");
         $choferU = $chofer->fetch_array(); 
         $idChofer = $choferU['idChofer'];
         
      $sql="UPDATE nota_servicio_unidad SET  idUnidadMovil='".$idUnidad."', idEmpresa='".$idEmpresa."',  idChofer='".$idChofer."' WHERE idNotaServicio='".$nota."'";
 
  
         //basía los registros a la bd
         if ($conexionBD->query($sql) )  {
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro actualizado\", \"success\");});</script>";
		}else {
			 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Registro no actualizado\", \"danger\");});</script>";
		}
		
	} else { 
	 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Algo salio mal\", \"danger\");});</script>";
			
	}
   
 
?>