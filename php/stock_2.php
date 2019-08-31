<?php
//sleep(1);
include_once '../connections/conexion.php';
if($_REQUEST) {

	if(isset($_POST['product_quantity']) && ($_POST['product_id'])) {

		$product_id =         $_REQUEST['product_id'];
		$product_quantity =   $_REQUEST['product_quantity'];
		
		$stock   = $ConexionBD->query("SELECT unidadesExistentes, unidadDeVenta, idArticulo FROM articulo 
					WHERE idArticulo = '$product_id' ");
		
		while($rows = mysqli_fetch_array($stock)) {
			$valor = $rows['unidadesExistentes'];
			//echo $valor;

			if($valor < $product_quantity ){
				echo '<h5 class="text-danger">No disponible</h5>';
				echo '
				<script type="text/javascript">
						var botonEnviar = document.getElementById("proceder_compra");
						botonEnviar.disabled=true;
			    </script>';
			}else {
				//echo "<div> Disponible</div>";
				
			}
		}

	} //end isset

} //end REQUEST
?>