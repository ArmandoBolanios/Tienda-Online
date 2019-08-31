 <?php   
  
require_once '../connections/conexion.php'; 
$sesionSocio = $_SESSION['userSession'];   
 
        

if(isset($_POST['btnEnviar'])) {
    $idNotaSer=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["folio"],ENT_QUOTES)));
    $folio    =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["folio"],ENT_QUOTES))); 
    $firma    =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["firma"],ENT_QUOTES))); 
    $certificado =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["certi"],ENT_QUOTES)));  
    $total  =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["total"],ENT_QUOTES)));  
    
    $idUnidad =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idUnidad"],ENT_QUOTES))); 
    $idEmpresa=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idEmpresa"],ENT_QUOTES))); 
    $idChofer =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idChofer"],ENT_QUOTES))); 
    $tanque =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["tanque"],ENT_QUOTES))); 
    $fechaInicial =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["fechaInicial"],ENT_QUOTES))); 
    $fechaFinal =mysqli_real_escape_string($conexionBD,(strip_tags($_POST["fechaFinal"],ENT_QUOTES))); 
    $inicial=str_replace("/","-",$fechaInicial);
    $final=str_replace("/","-",$fechaFinal);
      
    if($tanque==0){
        $tanq= 'tanque basio';
    } else if($tanque==1){
        $tanq= 'tanque 1/4 L';
    }
    else if($tanque==2){
        $tanq= 'tanque 1/2 L';
    }
    else if($tanque==3){
        $tanq= 'tanque 3/4 L';
    }else if($tanque==4){
        $tanq= 'tanque lleno';
    }
    
 //   $mo = date("Y-m-j" );
   // $newDate = $mod.' '.date("H:i:s" );
   
      //valores del estado del vehículo
     if (is_array($_POST['interior'])) {
        $selectedI = '';
        $num_inter = count($_POST['interior']);
        $current = 0;
        foreach ($_POST['interior'] as $key => $value) {
            if ($current != $num_inter-1)
                $selectedI .= $value.', ';
            else
                $selectedI .= $value.'.';
            $current++;
        }
    }    
     if (is_array($_POST['exterior'])) {
        $selectedE = '';
        $num_exter = count($_POST['exterior']);
        $current = 0;
        foreach ($_POST['exterior'] as $key => $value) {
            if ($current != $num_exter-1)
                $selectedE .= $value.', ';
            else
                $selectedE .= $value.'.';
            $current++;
        }
    }
     if (is_array($_POST['maletera'])) {
        $selectedM = '';
        $num_mal = count($_POST['maletera']);
        $current = 0;
        foreach ($_POST['maletera'] as $key => $value) {
            if ($current != $num_mal-1)
                $selectedM .= $value.', ';
            else
                $selectedM .= $value.'.';
            $current++;
        }
    }
   

      //crear carpeta de anexos
    $micarpeta = '../styles/anexos';
    if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
    }

    $files = array();
    foreach ($_FILES['Foto'] as $k => $l) {
    foreach ($l as $i => $v) {
    if (!array_key_exists($i, $files))
    $files[$i] = array();
    $files[$i][$k] = $v;
    
     }
    } 
    
$caracteres = "1234567890"; //posibles caracteres a usar
$numerodeletras=30; //numero de letras para generar el texto
$claveOp = ""; //variable para almacenar la cadena generada
for($i=0;$i<$numerodeletras;$i++){
    $claveOp .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
entre el rango 0 a Numero de letras que tiene la cadena */
}

  
	
    //compara los datos mandados
	 if(!empty($_POST['folio']) && !empty($_POST['firma']) && !empty($_POST['certi']) && !empty($_POST['idUnidad']) && !empty($_POST['idEmpresa']) && !empty($_POST['idChofer'])   ){
    
       	
 for($i = 0; $i < count($_POST['pro']); $i++){
     
    $idS           = strip_tags($_POST['idS'][$i]); 
    $descripcion   = strip_tags($_POST['pro'][$i]);            
    $unidad        = strip_tags($_POST['uni'][$i]);
    $codigoU       = strip_tags($_POST['cod'][$i]);
    $precio        = strip_tags($_POST['pre'][$i]);
    $subtotal      = strip_tags($_POST['sub'][$i]); 
              
      $queryNS = "INSERT INTO concepto(idNotaServicio, idServicio, folio, unidad, codigoUnidad, descripcion, precioUnitario, subtotal, fechaDeRegistro, aux) VALUES('$folio','$idS','$folio', '$unidad', '$codigoU','$descripcion', '$precio', '$subtotal', now(),1) ";
        $conexionBD->query($queryNS); 
      
            }
         //registro multiple de imagenes
          
        for($i = 0; $i < count($files); $i++) {
        if( !empty($files)){
             $foto = date('ymdhis') . '-' . strtolower($_FILES['Foto']['name'][$i]);
             move_uploaded_file ($_FILES['Foto']['tmp_name'][$i], $micarpeta.'/' . $foto);
            
             //Consulta para insertar registro en tabla evidencia
        $queryEvidencia = "INSERT INTO evidencia(idNotaServicio,folio, contador,urlImagen, nombreImagen,descripcion,fechaDeRegistro,aux) VALUES ('$idNotaSer', '$folio', 1, '$micarpeta', '$foto', 2, now(), 1) ";
         $conexionBD->query($queryEvidencia);
            
      
     }
   }  
         $interna = $selectedI.', '.$tanq;
        //Consulta para insertar registro en tabla nota de servicio
        $queryNS = "INSERT INTO nota_servicio(idNotaServicio, folio, totalNota, observacionesInterna, observacionesExterna, observacionesMaletera, firma, certificado,  claveOperacion,fechaRegistro, fechaFinal, aux) VALUES ('$idNotaSer', '$folio', '$total', '$interna','$selectedE', '$selectedM', '$firma', '$certificado', '$claveOp', '$inicial', '$final', 1) ";
  
          //Consulta para insertar registro en tabla nota servicio unidad
        $queryNSU = "INSERT INTO nota_servicio_unidad(idNotaServicio, folio, idEmpresa, idUnidadMovil,idChofer, firma, fechaDeRegistro, aux) VALUES ('$idNotaSer', '$folio', '$idEmpresa', '$idUnidad', '$idChofer', '$firma', '$inicial', 1) ";
         
         //basía los registros a la bd
         if ($conexionBD->query($queryNS) && $conexionBD->query($queryNSU) )  {
             
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Registrado exitosamente  !  </div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error al registrar !
					</div>" ;
             
		}
		
	} else { 
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Lo siento ocurrio un error en el registro!
				</div>";
			
	}
  
	 
} //fin de php////////////////////////////////////////////////////////////////////////
 
?>