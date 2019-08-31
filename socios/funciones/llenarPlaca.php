
<?php
/*programador:erubiel cisneros robles
fecha:21/08/2017*/
 
require_once '../connections/conexion.php'; 
//$conexion = new mysqli('localhost', 'root', '', 'proyectomontecarlo'); 
  
 
	$placa = $_POST['placa'];


//	$consulta = "select chofer.nombreChofer FROM chofer, chofer_unidad, unidad_movil WHERE  placa = '$placa'"; 
    $consulta = " SELECT * from chofer, chofer_unidad, chofer_telefono, unidad_movil, empresa_direccion WHERE chofer_unidad.idChofer=chofer.idChofer and  chofer_telefono.idChofer=chofer.idChofer and    unidad_movil.idEmpresa=empresa_direccion.idEmpresa   and unidad_movil.placa='$placa' ";

	$result = $conexionBD->query($consulta);
   
	
	$respuesta = new stdClass();
	if($result->num_rows > 0){
		$fila = $result->fetch_array();
        $idUnidad = $fila['idUnidadMovil'];
        
        $respuesta->idUnidad = $idUnidad;
        $respuesta->idEmpresa = $fila['idEmpresa'];  
    
        
    $consultaC=$conexionBD->query("SELECT * FROM unidad_movil, chofer, chofer_unidad, chofer_telefono  WHERE chofer_unidad.idChofer= chofer.idChofer and chofer_unidad.idChofer=chofer_telefono.idChofer and chofer_unidad.idUnidadMovil='$idUnidad'");
    $chofer = $consultaC->fetch_array();
        
        
            
        $respuesta->idChofer = $chofer['idChofer'];  
		$respuesta->nombre = $chofer['nombreChofer'];
        $respuesta->direccion = $fila['calle'];
        $respuesta->telefono = $chofer['telefono'];
        $respuesta->marca = $fila['marca'];
        $respuesta->modelo = $fila['modelo'];
        $respuesta->anio = $fila['anio'];
        $respuesta->color = $fila['color'];
        $respuesta->motor = $fila['numeroMotor'];
        $respuesta->serie = $fila['numeroSerie'];
        $respuesta->km = $fila['km'];
        
        
	    echo json_encode($respuesta);
    }

?> 
	 
	
 
 