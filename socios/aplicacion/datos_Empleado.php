<?php session_start();
require_once '../connections/conexion.php';   
$sesionSocio = $_SESSION['userSession'];

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
		$count_query   = mysqli_query($conexionBD,"SELECT count(*) AS numrows FROM  empleadosocio WHERE  idSocio='$sesionSocio'");
		if ($row= mysqli_fetch_array($count_query)){
			$numrows = $row['numrows'];} 
		//$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($conexionBD,"SELECT * FROM empleadosocio WHERE idSocio='$sesionSocio' ");
		
		if ($numrows>0){
			?>
     
      <div class="col-lg-12">
				

 
  <div class=" table-responsive">     
     
     
          <div class="box">
            <div class="box-header"> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
		       
              <table id="example1" class="table table-bordered table-striped table-advance table-hover">

			  <thead>
				<tr>
				  <th>Nombre</th>
				  <th>Apellido Paterno</th>
				  <th>Apellido Materno</th>
				  <th>Usuario</th>
				  <th>Fecha de Registro</th>
				  <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr class="success">
					<td><?php echo $row['nombreEmpleado'];?></td>
					<td><?php echo $row['apellidoPaternoEmpleado'];?></td>
					<td><?php echo $row['apellidoMaternoEmpleado'];?></td>
					<td><?php echo $row['user'];?></td>
					<td><?php echo $row['fechaDeRegistro'];?></td>
					<td>
			            <a title="Ver nota"  type="button" class="btn btn-default "
			             href="visualizar_Empleado.php?emple=<?php echo $row['idSocioEmpleado']; ?>" ><i class="fa fa-eye"></i>  </a> 
			              
				       
						
				        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $row['idSocioEmpleado']?>"       data-nombre="<?php echo $row['nombreEmpleado']?>" data-apepaterno="<?php echo $row['apellidoPaternoEmpleado']?>" data-apematerno="<?php echo $row['apellidoMaternoEmpleado']?>" title="Modificar empleado"><i class='icon_pencil'></i> </button>
						

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['idSocioEmpleado']?>" title="Excluir empleado"  ><i class='icon_trash_alt'></i> </button>
						
						
						 
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
 










