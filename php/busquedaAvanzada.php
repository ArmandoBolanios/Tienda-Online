<?php 
require_once 'connections/conexion.php';   

# conectare la base de datos 
if(!$ConexionBD){
    die("imposible conectarse: ".mysqli_error($ConexionBD));
}
if (@mysqli_connect_errno()) {
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}

$reg=mysqli_real_escape_string($ConexionBD,(strip_tags($_POST["cbx_Region"],ENT_QUOTES)));
$anio=mysqli_real_escape_string($ConexionBD,(strip_tags($_POST["cbx_anio"],ENT_QUOTES)));  
$arm=mysqli_real_escape_string($ConexionBD,(strip_tags($_POST["cbx_Armadora"],ENT_QUOTES)));
$mode=mysqli_real_escape_string($ConexionBD,(strip_tags($_POST["cbx_Modelo"],ENT_QUOTES)));  
$cilin=mysqli_real_escape_string($ConexionBD,(strip_tags($_POST["cbx_Clindro"],ENT_QUOTES)));
$litro=mysqli_real_escape_string($ConexionBD,(strip_tags($_POST["cbx_Litro"],ENT_QUOTES)));  

//Cuenta el número total de filas de la tabla*/
$count_query   = mysqli_query($ConexionBD,"SELECT count(*) AS numrows FROM clase WHERE idRegion='$reg' and idAnio='$anio' and idArmadora='$arm' and idModelo='$mode' and idCilindro='$cilin' and idLitro='$litro' ");

if ($row= mysqli_fetch_array($count_query)){ $numrows = $row['numrows'];} ?>

<div id="results"> <h4>Resultados</h4></div>
<div class="sub-section-title" id="resultEcontrados"><h4>Se encontraron <?php echo $numrows; ?> Articulos</h4>

</div><br>

<?php 
if ($numrows>0){
?>
<!-- /.box-header -->
<?php

    $queryProveedor = $ConexionBD->query("select distinct clase.idArticulo, marca, modelo, descripcionArticulo,unidadDeVenta,unidadesExistentes, (select urlImagen from imagen where imagen.idArticulo = clase.idArticulo limit 1) as urlImagen from clase, articulo WHERE clase.idArticulo = articulo.idArticulo and idRegion='$reg' and idAnio='$anio' and idArmadora='$arm' and idModelo='$mode' and idCilindro='$cilin' and idLitro='$litro'");


    while($row = mysqli_fetch_array($queryProveedor)){  ?>

<?php $marca    = $row['marca']; ?>
<?php $modelo   = $row['modelo']; ?>
<?php $descr    = $row['descripcionArticulo'];?>
<?php $uniVenta = $row['unidadDeVenta'];?>
<?php $existen  = $row['unidadesExistentes'];?>
<?php $imagen   = $row['urlImagen'];?>
<?php $id       = $row['idArticulo'];?>
<?php if($existen<1){$existen="Agotado"; }?>

<div class='thumbnail  col-xs-12 col-sm-6 col-md-4' id='tumbnail'>
    <div class='formatoArti formatoArticulo'>
        <div class='ih-item square effect3 bottom_to_top precarga'><a href='details_product.php?idArticulo=<?php echo $id; ?>'>
            <div ><img id= 'imageArticulo' class='img-responsive' src='http://montecarloautomotriz.com/admin/aplicacion/img_articulos/<?php echo $imagen; ?>'></div>
            <div class='info'><p>Existencias : <?php echo $existen; ?>  </p>
            </div></a> 
        </div>
        <h3><?php echo $marca.'<br>'.$modelo; ?></h3><h3 id='costoFormat'> MXN $<?php echo number_format($uniVenta,2); ?></h3>
        <a href='details_product.php?idArticulo=<?php echo $id; ?>' class='btn btn-default transparente-btn' role='button'>Ver Detalles</a>
    </div>
</div>



<?php } ?>


<!-- /.box-body -->


<?php

} else {
?>
<div class="container">   
    <h3>No hay resultados de su busqueda </h3> <br>
    <a href='venta_refacciones.php' class='btn btn-default transparente-btn' role='button'>Seguir Comprando</a>
    <br><br>
</div>
<?php
}
?>

