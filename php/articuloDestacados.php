<?php 
require_once 'connections/conexion.php'; 
# conectare la base de datos 
if(!$ConexionBD){
    die("imposible conectarse: ".mysqli_error($ConexionBD));
}
if (@mysqli_connect_errno()) {
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}

//Cuenta el número total de filas de la tabla*/
$count_query   = mysqli_query($ConexionBD,"SELECT detalle_venta.idArticulo, Sum(detalle_venta.unidades) AS destacados, count(*) AS numrows FROM detalle_venta WHERE fechaDeRegistro BETWEEN SYSDATE( ) - INTERVAL 100 DAY AND SYSDATE( ) GROUP BY idArticulo Order by SUM(detalle_venta.unidades) DESC LIMIT 25 ");

?>

<?php
    while($row3 = mysqli_fetch_array($count_query)){  
        
        //$query = "select idArticulo,marca, modelo, descripcionArticulo, unidadDeVenta,unidadesExistentes, (select urlImagen from imagen where imagen.idArticulo = articulo.idArticulo limit 1) as urlImagen from articulo WHERE idArticulo='".$row3['idArticulo']."'"; 
        
        
        
        $query = "SELECT DISTINCT articulo.idArticulo, marca, modelo, descripcionArticulo, unidadDeVenta, unidadesExistentes, urlImagen, nombreImagen
        FROM articulo INNER JOIN imagen
        ON articulo.idArticulo = imagen.idArticulo 
        AND articulo.idArticulo='".$row3['idArticulo']."'";
		
		
        $result = $ConexionBD->query($query);
        $row2 = $result->fetch_array(MYSQLI_ASSOC);

?>

<?php $descr        = $row2['descripcionArticulo'];?>
<?php $uniVenta     = $row2['unidadDeVenta'];?>
<?php $existen      = $row2['unidadesExistentes'];?>
<?php $imagen       = $row2['urlImagen'];?>
<?php $id           = $row2['idArticulo'];?>
<?php $nombreImg    = $row2['nombreImagen']; ?>
<?php $marca        = $row2['marca'];?>
<?php $modelo       = $row2['modelo'];?>

<?php if($existen<1){$existen="Agotado"; }?>
 
  
  
<div class='thumbnail  col-xs-12 col-sm-6 col-md-4' id='tumbnail'>
    <div class='formatoArti formatoArticulo'>
        <div class='ih-item square effect3 bottom_to_top'><a href='details_product.php?idArticulo=<?php echo $id; ?>'>
            <div>
			<img id= 'imageArticulo' src='http://montecarloautomotriz.com/admin/aplicacion/img_articulos/<?php echo $imagen; ?>'></div>
            </a> 
        </div>
        <h3><?php echo '<br>'.$nombreImg.'<br>'.$marca; ?></h3><h3 id='costoFormat'> MXN $<?php echo number_format($uniVenta, 2); ?> </h3>
        <a href='details_product.php?idArticulo=<?php echo $id; ?>' class='btn btn-default transparente-btn' role='button'>Ver Detalles</a>
		<p>Existencias : <?php echo $existen; ?>  </p>
    </div>
</div>

<?php } ?>




<script>
    /*-------------------------------------script Product Destacados--------------*/
    $(document).ready(function() { 
        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            autoPlay:true,
            items : 4,
            itemsDesktop : [640,5],
            itemsDesktopSmall : [414,4]
        });
    }); 
</script>