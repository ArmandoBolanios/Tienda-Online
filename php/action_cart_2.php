<?php  
session_start();
//action.php
//require_once '../connections/conexion.php';

if(isset($_POST["product_id"]))  {
	$order_table = '';
	$message = '';  
	if($_POST["action"] == "add")  {
		if(isset($_SESSION["shopping_cartMT"]))  {
			$is_available = 0;  
			foreach($_SESSION["shopping_cartMT"] as $keys => $values)  {
				if($_SESSION["shopping_cartMT"][$keys]['product_id'] == $_POST["product_id"])  {
					$is_available++;  
					$_SESSION["shopping_cartMT"][$keys]['product_quantity'] = 
						$_SESSION["shopping_cartMT"][$keys]['product_quantity'] + $_POST["product_quantity"];  
				}  
			}
			if($is_available < 1)  {
				$item_array = array(  
					'product_id'               =>     $_POST["product_id"],
					'product_image'            =>     $_POST["product_image"],
					'product_codArticulo'      =>     $_POST["product_codArticulo"],
					'product_codAlterno'       =>     $_POST['product_codAlterno'],
					'product_descrip'          =>     $_POST["product_descrip"], 
					'product_price'            =>     $_POST["product_price"],  
					'product_quantity'         =>     $_POST["product_quantity"]
				);  
				$_SESSION["shopping_cartMT"][] = $item_array;
			}
		}
		else  {
			$item_array = array(
				'product_id'               =>     $_POST["product_id"],
				'product_image'            =>     $_POST["product_image"],
				'product_codArticulo'      =>     $_POST["product_codArticulo"],
				'product_codAlterno'	   =>     $_POST['product_codAlterno'],
				'product_descrip'          =>     $_POST["product_descrip"], 
				'product_price'            =>     $_POST["product_price"],  
				'product_quantity'         =>     $_POST["product_quantity"]
			);  
			$_SESSION["shopping_cartMT"][] = $item_array;
		}
	} //end POST["action"]

	if($_POST["action"] == "remove")  {
		foreach($_SESSION["shopping_cartMT"] as $keys => $values)  {
			if($values["product_id"] == $_POST["product_id"])  { 
				unset($_SESSION["shopping_cartMT"][$keys]);  
				//$message = '<label class="text-success">Articulo Removido</label>'; 
			}
		}
	}

	if($_POST["action"] == "quantity_change")  {
		foreach($_SESSION["shopping_cartMT"] as $keys => $values)  {
			if($_SESSION["shopping_cartMT"][$keys]['product_id'] == $_POST["product_id"])  {

				$_SESSION["shopping_cartMT"][$keys]['product_quantity'] = $_POST["quantity"];
			}
		}
	}


	$order_table .= '  
           '.$message.'  
           <table class="table table-striped table-bordered table-list table-hover">  
                 <thead><tr> 
					 <th data-column-id="commands" data-formatter="commands" class="col-tools">
					 <span class="fa fa-camera" aria-hidden="true"></span></th>
                     <th class="hidden">idArticulo</th>
					 <th class="negrita">Clave Articulo</th>
					 <th class="hidden">Clave Alterna</th>
					 <th class="negrita">Descripcion</th>
                     <th class="negrita">Precio</th>  
                     <th class="negrita">Unidades</th>  
                     <th class="negrita">Subtotal</th>  
                     <th class="negrita">Acción</th>  
                  </tr></thead>  
           ';  
	if(!empty($_SESSION["shopping_cartMT"]))  {
		$total = 0;  
		foreach($_SESSION["shopping_cartMT"] as $keys => $values)  {
			$order_table .= '  
                     <tbody class="tamanio_resumen"><tr>  
						  <td align="center"><img class="img-responsive" src="../admin/aplicacion/img_articulos/'.$values["product_image"].' "
							 width="50px" height="50px" style="border:1px solid #585858;" ></td>
						  <td class="hidden">'.$values["product_id"].'</td>
						  <input type="hidden" name="Articulo" id="Articulo" value="'.$values["product_id"].'" />
						  <td>               '.$values["product_codArticulo"].' </td>
						  <td class="hidden">'.$values["product_codAlterno"].' </td>
						  <td class="textoDescrip"> '.$values["product_descrip"].' </td>
						  <td class="textoMoneda">$ '.$values["product_price"].'</td>
                          <td class="col-lg-2">
						  <input type="text" name="quantity[]" id="quantity'.$values["product_id"].'"  value="'.$values["product_quantity"].'" class="form-control quantity"
						  data-product_id="'.$values["product_id"].'" onKeyPress="return soloNumeros(event)" />
						  </td>
                          <td class="textoMoneda" align="right">$ 
						  '.number_format($values["product_quantity"] * $values["product_price"], 2).'
						  </td>  
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remover</button></td>

                     </tr>  
                ';  
			$total = $total + ($values["product_quantity"] * $values["product_price"]);
			$totalFin = $total + 90;
			$cantidadArticulos = count($_SESSION["shopping_cartMT"]);
		}  
		$order_table .= '  
                <tr>			
					 <td colspan="5" align="right"><span id="Inform"></span> Total</td>  
                     <td class="textoMoneda">$ '.number_format($total, 2).'</td>  
                     <td align="center"> '.$cantidadArticulos.'</td>  
                </tr>  
                <tr>  
                     <td colspan="7" align="right">
					 	<div class="col-lg-9 col-md-3 col-xs-3">
							<a href="venta_refacciones.php"><h5>Seguir comprando</h5></a>
						</div>
                          <form method="post" action="check_out_cart.php">  
                               <input type="submit" name="check_out" class="btn btn-warning" value="Proceder Compra" id="proceder_compra"/>  
                          </form>  
                     </td>
                </tr></tbody>
           ';

	}
	$order_table .= '</table>';

	$output = array( 
		'order_table'     =>     $order_table,  
		'cart_item'       =>     count($_SESSION["shopping_cartMT"])  
	);  
	echo json_encode($output);  
} //end ISSET product_id
?>