<?php
/*-----------------------
Autor: Armando Bolaños Dircio
Fecha: 11-10-2018
----------------------------*/
include '../connections/conexion.php';
if(!$ConexionBD){
    die("imposible conectarse: ".mysqli_error($ConexionBD));
}
if (@mysqli_connect_errno()) {
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    include '../php/pagination.php'; //incluir el archivo de paginación
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 4; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $count_query   = mysqli_query($ConexionBD,"SELECT count(*) AS numrows FROM promocionsocio");
    if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
    $total_pages = ceil($numrows/$per_page);
    $reload = '../promociones.php';
    
    $listaPromocion = "SELECT nombreImagen FROM promocionsocio ORDER BY fechaDeRegistro LIMIT $offset, $per_page";
    $query   = mysqli_query($ConexionBD, $listaPromocion);

    if ($numrows>0){
?>
<table class="table table-bordered">
    <thead>
        <tr>

        </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td>
                <?php echo '
                <a class="cm-overlay " href="admin/styles/promocion/'.$row['nombreImagen'].'">
                <img src="admin/styles/promocion/'.$row['nombreImagen'].'" 
                alt="no-img" class="img-responsive tamanioImagenLista">
                </a>
                <script type="text/javascript">
                $(document).ready(function(){
                $(".cm-overlay").cmOverlay();
                });</script>
                ';
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="table-pagination pull-right">
    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
</div>
<?php
    } else {
?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>¡Aviso!</h4> No hay datos para mostrar
</div>
<?php
    }
}
?>