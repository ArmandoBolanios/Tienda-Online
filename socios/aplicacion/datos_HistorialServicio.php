<?php session_start();
require_once '../connections/conexion.php';   
$sesionSocio = $_SESSION['userSession'];
$sesionFirma = $_SESSION['firma'];
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
		$count_query   = mysqli_query($conexionBD,"SELECT count(*) AS numrows FROM nota_servicio WHERE firma='$sesionFirma' ");
		if ($row= mysqli_fetch_array($count_query)){
			$numrows = $row['numrows'];} 
		//$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($conexionBD,"SELECT * FROM nota_servicio_unidad WHERE firma='$sesionFirma' ORDER BY  fechaDeRegistro DESC"); 
		
		if ($numrows>0){
			?>
     
 

 <div class=" table-responsive">     
     
     
          <div class="box">
            <div class="box-header"> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-hoverr">
           
            <thead>
				<tr>  
                  <th>Cliente</th>
                  <th>Empresa</th>
				  <th>Unidad</th>  
				  <th>Estado</th> 
				</tr>
			</thead>
      	<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
                
				?>
				<tr> 		
				<?php
                //comienza chofer
                $chofer = $row['idChofer'];
		        $q= mysqli_query($conexionBD,"SELECT * FROM chofer WHERE idChofer='$chofer'"); 
                while($chof = mysqli_fetch_array($q)){ ?>                
                <td> <?php echo $chof['nombreChofer']; ?></td>
                <?php }  
                //comienza empresa
                $empresa = $row['idEmpresa'];
		        $quEmpresa= mysqli_query($conexionBD,"SELECT * FROM empresa WHERE idEmpresa='$empresa'"); 
                while($empre = mysqli_fetch_array($quEmpresa)){ ?>                
                <td> <?php echo $empre['denominacion']; ?></td>
                <?php } 
                //comienza unidad      
                $unidad = $row['idUnidadMovil'];
		        $quUnidad= mysqli_query($conexionBD,"SELECT * FROM unidad_movil WHERE idUnidadMovil='$unidad'"); 
                while($unid = mysqli_fetch_array($quUnidad)){ ?>                
                <td> <?php echo $unid['placa']; ?></td>
                <?php } ?>
                       
					<td><?php
                if($row['aux']==1){
                    echo '<a href="" class="text-danger">Sin facturar</a>';
                }else{
                    echo '<p class="text-info">Facturado</p>';
                }?></td>
			 
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
      'searching'   : false,
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




