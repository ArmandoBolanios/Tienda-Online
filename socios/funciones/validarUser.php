<?php

     $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {   
  
  
 require_once('../connections/conexion.php');
      $sql = mysqli_query($conexionBD, "SELECT * FROM dat_socio WHERE user = '".$b."'");
      $contar = mysqli_num_rows($sql); 

     if($contar == 0){
            echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
           }else{
              echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
          }
      }  
?>