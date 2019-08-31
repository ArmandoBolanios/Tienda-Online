<?php    
$sesionSocio = $_SESSION['userSession'];   
 
if(isset($_POST['btnActualizarImagen'])) {
    $folio=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idNota"],ENT_QUOTES)));

            
          //crear carpeta de anexos
    $micarpeta = '../styles/anexos';
    
         
    $files = array();
    foreach ($_FILES['Foto'] as $k => $l) {
    foreach ($l as $i => $v) {
    if (!array_key_exists($i, $files))
    $files[$i] = array();
    $files[$i][$k] = $v;
    
     }
    }
  
    //compara los datos mandados
	 if(!empty($_POST['idNota']) ){  
      //registro multiple de imagenes
          
        for($i = 0; $i < count($files); $i++) {
        if( !empty($files)){
             $foto = date('ymdhis') . '-' . strtolower($_FILES['Foto']['name'][$i]);
             move_uploaded_file ($_FILES['Foto']['tmp_name'][$i], $micarpeta.'/' . $foto);
            
             //Consulta para insertar registro en tabla evidencia
        $queryEvidencia = "INSERT INTO evidencia(idNotaServicio,folio, contador, urlImagen, nombreImagen, descripcion,fechaDeRegistro,aux) VALUES ('$folio', '$folio', 1, '$micarpeta', '$foto', 2, now(), 1) ";
        if($conexionBD->query($queryEvidencia)){
            echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Registro actualizado\", \"success\");});</script>";
        }else {
             echo "<script>jQuery(function(){swal(\"¡Error!\", \"Registro no actualizado\", \"danger\");});</script>";
        }
            
      
     }
   } 
   //basía los registros a la bd
       
		
	} else { 
	 echo "<script>jQuery(function(){swal(\"¡Error!\", \"Algo salio mal\", \"danger\");});</script>";
			
	}
}
 
?>