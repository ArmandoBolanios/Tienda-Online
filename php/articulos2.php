<?php 
include "../connections/conexion.php";
if(!$ConexionBD){
    die("imposible conectarse: ".mysqli_error($ConexionBD));
}
if (@mysqli_connect_errno()) {
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    //ordenar resultados
    $orden = (isset($_REQUEST['orden']) && !empty($_REQUEST['orden']))?$_REQUEST['orden']:'';
    $ordenar="";
    if($orden=="AZ"){$ordenar="ORDER BY descripcionArticulo ASC";}
    if($orden=="ZA"){$ordenar="ORDER BY descripcionArticulo DESC";}
    if($orden=="CaroBarato"){$ordenar="ORDER BY unidadDeVenta DESC";}
    if($orden=="BaratoCaro"){$ordenar="ORDER BY unidadDeVenta ASC";}
    

    //paginacion
    include 'pagination2.php'; //incluir el archivo de paginación
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 15; //la cantidad de registros que desea mostrar
    $adjacents  = 3; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $count_query   = mysqli_query($ConexionBD,"SELECT count(*) AS numrows FROM articulo");
    if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
    $total_pages = ceil($numrows/$per_page);

    //consulta principal para recuperar los datos
?>

<div class="sub-section-title" id="resultEcontrados"><h4>Se encontraron <?php echo $numrows;?> Articulos</h4></div><br>

<?php if ($numrows>0){
?>

<?php
        //$query = mysqli_query($ConexionBD,"select idArticulo,marca, modelo, descripcionArticulo, unidadDeVenta,unidadesExistentes, (select urlImagen from imagen where imagen.idArticulo = articulo.idArticulo limit 1) as urlImagen from articulo $ordenar LIMIT $offset,$per_page");
        // -----
        $query = mysqli_query($ConexionBD,"select idArticulo,marca, modelo, descripcionArticulo, unidadDeVenta,unidadesExistentes,(select nombreImagen from imagen where imagen.idArticulo = articulo.idArticulo limit 1) as nombreImagen
        ,(select urlImagen from imagen where imagen.idArticulo = articulo.idArticulo limit 1) as urlImagen from articulo
        $ordenar LIMIT $offset,$per_page");
		
		
        while($row = mysqli_fetch_array($query)){
?>
<?php $descr        = $row['descripcionArticulo'];?>
<?php $uniVenta     = $row['unidadDeVenta'];?>
<?php $existen      = $row['unidadesExistentes'];?>
<?php $imagen       = $row['urlImagen'];?>
<?php $id           = $row['idArticulo'];?>
<?php $nombreImg    = $row['nombreImagen'];?>
<?php $marca        = $row['marca'];?>
<?php $modelo       = $row['modelo'];?>

<?php if($existen<1){$existen="Agotado"; }?>

<div class='thumbnail  col-xs-12 col-sm-6 col-md-4' id='tumbnail'>
    <div class='formatoArti formatoArticulo'>
        <div class='ih-item square effect3 bottom_to_top precarga'><a href='details_product.php?idArticulo=<?php echo $id; ?>'>
            <div ><img id= 'imageArticulo' class='img-responsive' src='http://montecarloautomotriz.com/admin/aplicacion/img_articulos/<?php echo $imagen; ?>'></div>
            <div class='info'><p>Existencias : <?php echo $existen; ?>  </p>
            </div></a> 
        </div>
        <h3><?php echo $nombreImg.'<br>'.$marca; ?></h3><h3 id='costoFormat'> MXN $<?php echo number_format($uniVenta, 2); ?></h3>
        <a href='details_product.php?idArticulo=<?php echo $id; ?>' class='btn btn-default transparente-btn' role='button'>Ver Detalles</a>
    </div>
</div>


<?php } ?>

<div class="row"></div>
<div class="table-pagination pull-right" >
    <?php echo paginate($page, $total_pages, $adjacents);?> 
</div>

<?php

    } else {
?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>Aviso!!!</h4> No hay datos para mostrar
</div>
<?php
    }
}
?>