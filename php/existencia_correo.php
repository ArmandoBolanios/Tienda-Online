<?php
sleep(1);
include_once '../connections/conexion.php';
if($_REQUEST) {
    $correoElectronico = $_REQUEST['correoElectronico'];
    $query = "SELECT correoElectronico FROM cliente_correo WHERE correoElectronico = '".strtolower($correoElectronico)."' ";
    $results = mysqli_query($ConexionBD, $query) or die('ok');

    if(mysqli_num_rows(@$results) > 0)
        echo '
			<div id="Error">El correo ya existe!</div>
			<script type="text/javascript">
				    	var botonEnviar = document.getElementById("btnTres");
						botonEnviar.disabled=true;
			</script>
		';
    else
        echo '
			<script type="text/javascript">
				    	var botonEnviar = document.getElementById("btnTres");
						//botonEnviar.disabled=false;
			</script>
		';

}

?>
