<?php
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=0;
}

require_once '../../connections/conexion.php'; 

switch($page){

	case 1: 
		$json = array();
		$json['msj'] = 'Servicio Agregado';
		$json['success'] = true;
	
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				$sql = "SELECT * FROM servicio WHERE idServicio='$producto_id'";

		        $resultado_producto= $conexionBD->query($sql);
                
				$producto = $resultado_producto->fetch_object();
                
				$descripcion = $producto->nombre;
                $unidad = $producto->unidad;
                $codigoU = $producto->codigoUnidad;
				$precio = $producto->precio;
				
				$subtotal = $cantidad * $precio; 
                 
				$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$descripcion, 'unidad'=>$unidad, 'codigoU'=>$codigoU,'precio'=>$precio, 'subtotal'=>$subtotal);
                
         	    $json['success'] = true;

				echo json_encode($json);
	
			} catch (Exception $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un servicio y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 2:
		$json = array();
		$json['msj'] = 'Servicio Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
                $servicio = $_POST['id'];
              //  $folio = $_POST['folio'];
				$json['success'] = true;
          //      $queryNS = "DELETE FROM concepto WHERE idServicio='$servicio' and idNotaServicio='$folio'";
            //    $conexion->query($queryNS);
                  
	
				echo json_encode($json);
	
			} catch (Exception $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
}
?>