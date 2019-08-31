<?php session_start();
require_once '../connections/conexion.php';   
$sesionSocio = $_SESSION['userSession'];
$firma   = $_SESSION['firma'];


	# conectare la base de datos 
    if(!$conexionBD){
        die("imposible conectarse: ".mysqli_error($conexionBD));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		 
	 
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($conexionBD,"SELECT count(*) AS numrows FROM nota_servicio WHERE firma='".$firma."' ");
		if ($row= mysqli_fetch_array($count_query)){
			$numrows = $row['numrows'];} 
		//$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($conexionBD,"SELECT * FROM nota_servicio WHERE firma='".$firma."' ORDER BY  fechaRegistro DESC");
		
		if ($numrows>0){
			?>
     
 

 <div class=" table-responsive">     
     
     
          <div class="box">
            <div class="box-header"> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-advance table-hover">
           
            <thead>
				<tr> 
				  <th>ClaveOperacion</th> 
				  <th>Total de Nota</th> 
				  <th>Fecha inicial</th>
				  <th>Fecha final</th>
				  <th>Estado</th>
				  <th>Accion</th>
				</tr>
			</thead>
      	<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr class="success"> 				
					<td><?php echo $row['claveOperacion'];?></td>						
					<td><?php echo $row['totalNota'];?></td>  
					<td><?php echo $row['fechaRegistro'];?></td>
					<td><?php echo $row['fechaFinal'];?></td>
					<td><?php
                if($row['aux']==1){
                    echo '<p class="text-danger">Sin facturar</p>';
                }else{
                    echo '<p class="text-info">Facturado</p>';
                }?>
                </td>
					<td>
			            <a title="Ver nota"  type="button" class="btn btn-default "
			             href="visualizar_orden.php?nro=<?php echo $row['idNotaServicio']; ?>" ><i class="fa fa-eye"></i>  </a> 
			             <a></a>
			             
			              <a title="Modificar nota"  type="button" class="btn btn-success "
			             href="editar_orden.php?fol=<?php echo $row['idNotaServicio']; ?>" ><i class='icon_pencil'></i>  </a> 
			             <a></a>
			               
						 
					</td>
				</tr>
				<?php
			}
			?>
			</tbody> 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
   
      
     
     
         </div>
  
 
  
<script src="../styles/js/appOrdenServicio.js"> </script>
<script src="../styles/js/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
 
  
            
		
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




