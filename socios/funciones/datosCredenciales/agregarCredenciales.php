<?php   
if(isset($_POST['enviarF'])) { 
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['firma'])) {
        $errors[] = "Firma vacía";
        } else if(empty($_POST['idSocio'])) {
         $errors[] = "No existe el socio";
    }else if ( !empty($_POST['firma']) && !empty($_POST['idSocio'])  ){ 
        
        $firma=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["firma"],ENT_QUOTES)));
        $idSocio=mysqli_real_escape_string($conexionBD,(strip_tags($_POST["idSocio"],ENT_QUOTES)));
        
       
        $hashed_firma = password_hash($firma, PASSWORD_DEFAULT); 
        $query = $conexionBD->query("SELECT * FROM dat_socio WHERE idSocio='$idSocio'");
  
    if($query->num_rows >0){
        
    $row = $query->fetch_array(); 
      $sql= "UPDATE dat_socio SET firma ='$hashed_firma'  WHERE idSocio='$idSocio' ";
		 
        
		$query_update = mysqli_query($conexionBD,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";   
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($conexionBD);
			}  
     
    } else{  $errors []= "Los datos son incorrectos!"; }//condicion firma 
        
    }else{ $errors []= "Error desconocido";          } // condicion num row
        
    if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
							
							<a href="http://localhost/Montecarlo05/funciones/logout.php?logout">Inicie sesion dando clik aquí! </a>
				</div>
				<?php
                
			}
}
 
?>