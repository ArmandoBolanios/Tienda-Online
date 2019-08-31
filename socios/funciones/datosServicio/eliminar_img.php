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
	 if (empty($_POST['id_img'])){
			$errors[] = "ID vacío";
		}   else if (
			!empty($_POST['id_img']) ){
  
		$id_img=$_POST['id_img'];
		
         
		 $sql="DELETE FROM evidencia WHERE idEvidencia='".$id_img."'";
         
		 $evidencia = mysqli_query($conexionBD,"SELECT * FROM evidencia WHERE idEvidencia='$id_img' "); 
         $row = mysqli_fetch_array($evidencia); 
         $ruta = $row['urlImagen'].'/'.$row['nombreImagen'];    //le damos la direccion exacta del archivo
         unlink('../'.$ruta);
         
		$query_delete = mysqli_query($conexionBD,$sql);       
         
			if ($query_delete){
                echo "<script>jQuery(function(){swal({title: 'Imagen eliminada',type: 'warning',text: '',timer: 1000,showConfirmButton: false});});

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