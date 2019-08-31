<?php   
  session_start();
require_once '../../connections/conexion.php'; 
$sesionSocio = $_SESSION['userSession'];   
 
            
    $idFolio =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["folio"],ENT_QUOTES))); 
    $idServicio=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["cbo_producto"],ENT_QUOTES))); 
   
    //compara los datos mandados
	 if(!empty($_POST['folio']) ) {   
        
         $servicio = $conexionBD->query("SELECT * FROM servicio WHERE idServicio='$idServicio'");
         $servicioId = $servicio->fetch_array();  
         $unidad = $servicioId['unidad'];
         $codigo = $servicioId['codigoUnidad'];
         $descripcion = $servicioId['descripcion'];
         $prec = $servicioId['precio']; 
         $sub = 1 * $prec; 
         
         
         $queryNS = "INSERT INTO concepto(idNotaServicio, idServicio, folio, unidad, codigoUnidad, descripcion, precioUnitario, subtotal, fechaDeRegistro, aux) VALUES('$idFolio','$idServicio','$idFolio', '$unidad', '$codigo','$descripcion', '$prec', '$sub', now(),1) ";

  
         //basía los registros a la bd
         if ($conexionBD->query($queryNS))  {
          echo "<script>jQuery(function(){swal({title: 'Servicio agregado',type: 'warning',text: '',timer: 1000,showConfirmButton: false});});
                setTimeout('window.location = self.location;',1000);
                </script>"; 
		}else {
			 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Registro no actualizado\", \"danger\");});</script>";
		}
		
	} else { 
	 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Algo sali mal\", \"danger\");});</script>";
			
	}
   
 
?>