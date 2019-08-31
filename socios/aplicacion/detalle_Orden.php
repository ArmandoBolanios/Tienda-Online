<?php 
session_start();   
?>

<?php if(count($_SESSION['detalle'])>0){?>

	<table class="table">
	    <thead>
	        <tr>
	            <th>Descripción</th>
	            <th>Unidad</th>
	            <th>Codigo unidad</th> 
	            <th>Precio</th>
				<th>Subtotal</th>
            <th></th>
	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $k => $detalle){ 
			$total += $detalle['subtotal']; 
	    	?>
	        <tr>
	        	<td><?php echo $detalle['producto'];?></td>
	            <td><?php echo $detalle['unidad'];?></td>
	            <td><?php echo $detalle['codigoU'];?></td>           
	            <td><?php echo $detalle['precio'];?></td>
				<td><?php echo $detalle['subtotal'];?></td>  
				
               				
                <input type="hidden" name="idS[]" value="<?php echo $detalle['id']; ?>">
                <input type="hidden" name="pro[]" value="<?php echo $detalle['producto']; ?>">
                <input type="hidden" name="uni[]" value="<?php echo $detalle['unidad']; ?>">
                <input type="hidden" name="cod[]" value="<?php echo $detalle['codigoU']; ?>">
                <input type="hidden" name="pre[]" value="<?php echo $detalle['precio']; ?>">
                <input type="hidden" name="sub[]" value="<?php echo $detalle['subtotal']; ?>">
				 
	            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
	            
	        </tr>
	        <?php  
            
            }?>
	         
	        <tr>
	         <td colspan="3" class="text-right"></td>
	           <td> 
	            
           
              <div>
               <span>Total</span> 
                <span id="prefix">$</span> <input type="text" id="total" name="total" disabled value="<?php echo $total ;?>"  >
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                
                </div>  
	
                    </td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
       	        	  
<?php }else{?>
                 <div class="alert alert-dismissible alert-danger"> 
                  <strong>No hay servicios agregados!</strong>
                </div>
<?php }?>

  <script src="../styles/js/appAgregarServicio.js"> </script> 
         
 

 