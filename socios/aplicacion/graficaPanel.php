<?php  
function contarEmpleados(){
    
$sesionSocio = $_SESSION['userSession'];
include 'connections/conexion.php'; 
//Cuenta el número total de filas de la tabla*/
		$count_empleado   = mysqli_query($conexionBD,"SELECT count(*) AS numrows FROM empleadosocio WHERE idSocio='$sesionSocio'");
		if ($row= mysqli_fetch_array($count_empleado)){
            $numrows = $row['numrows'];
            echo $numrows;
        }else{
            echo 0;
        }  
    
}

function contarOrden(){
    
$sesionFirma = $_SESSION['firma'];
include 'connections/conexion.php'; 
//Cuenta el número total de filas de la tabla*/
		$count_nota   = mysqli_query($conexionBD,"SELECT count(*) AS numrows FROM nota_servicio WHERE firma='$sesionFirma'  ");
		if ($row= mysqli_fetch_array($count_nota)){
            $numrows = $row['numrows'];
            echo $numrows;
        }else{
            echo 0;
        }  
    
}




    
	 
?>