<?php
session_start();

require_once '../../connections/conexion.php';  
  
   $sesionSocio = $_SESSION['userSession']; 

  
    if(!$conexionBD){
        die("imposible conectarse: ".mysqli_error($conexionBD));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['id_servicio'])){
			$errors[] = "ID vacío";
		}   else if (
			!empty($_POST['id_servicio']) ){
  
		$id_servicio=$_POST['id_servicio'];
		
         
		 $sqlServicio="DELETE FROM concepto WHERE idConcepto='".$id_servicio."'";
         
	      $query_deleteServicio = mysqli_query($conexionBD,$sqlServicio);       
         
			if ($query_deleteServicio){
                echo "<script>jQuery(function(){swal({title: 'Servicio eliminado',type: 'warning',text: '',timer: 1000,showConfirmButton: false});});

                setTimeout('window.location = self.location;',1000);
                </script>"; 
			} else{
                echo "<script>jQuery(function(){swal(\"¡Error!\", \"Intenta nuevamente\", \"info\");});
                     
                     </script>";  
			}
		} else {
		echo "<script>jQuery(function(){swal(\"¡Error!\", \"Sucedio un error\", \"danger\");});</script>"; 
		}


?>