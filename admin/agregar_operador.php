<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Administrador</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/font-awesome.css" />

	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<h2>Operador</h2>
					<br><br>
					<?php
					if(isset($_POST['btn_operador'])) {
						require_once '../connections/conexion.php';
						require '../php/lib-generadorID.php';
						//include 'class.upload.php';

						//datos para la categoria
						$idOperador = generarIDOPERADOR();
						$claveOperador = 0;
						$nombreOperador = mysqli_real_escape_string($ConexionBD, $_POST['nombreOperador']);
						$apellidoPaternoOperador = mysqli_real_escape_string($ConexionBD, $_POST['apellidoPaternoOperador']);
						$apellidoMaternoOperador = mysqli_real_escape_string($ConexionBD, $_POST['apellidoMaternoOperador']);
						$alias = mysqli_real_escape_string($ConexionBD, $_POST['alias']);
						$observaciones = mysqli_real_escape_string($ConexionBD, $_POST['observaciones']);
						$aux = 1;

						$sqlOperador = "INSERT INTO operador (idOperador, claveOperador, nombreOperador, 
						apellidoPaternoOperador, apellidoMaternoOperador, alias, observaciones, fechaDeRegistro, aux)
						VALUES('$idOperador', '$claveOperador', '$nombreOperador', '$apellidoPaternoOperador',  '$apellidoMaternoOperador','$alias', '$observaciones', NOW(),'$aux')";
						mysqli_query($ConexionBD, $sqlOperador);
						echo 'Registrado';
						print '
						<script type="text/javascript">
						window.location="agregar_operador.php";
						</script>
						';
						
						mysqli_close($ConexionBD);
					} //fin de isset
					?>

					<form enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']?>"
						  class="form-horizontal" role="form">
						<fieldset>

							<div class="form-group">
								<label class="col-lg-4 control-label">Nombre Operador</label>
								<div class="col-lg-6">
									<input type="text" name="nombreOperador" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-4 control-label">Apellido Paterno</label>
								<div class="col-lg-6">
									<input type="text" name="apellidoPaternoOperador" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-4 control-label">Apellido Materno</label>
								<div class="col-lg-6">
									<input type="text" class="form-control" name="apellidoMaternoOperador"
										   onkeyup="javascript:this.value=this.value.toUpperCase();" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-4 control-label">Alias</label>
								<div class="col-lg-6">
									<input type="text" name="alias" class="form-control"/>
								</div>
							</div> <!--termina descripcion -->

							<div class="form-group">
								<label class="col-lg-4 control-label">Observaciones</label>
								<div class="col-lg-6">
									<textarea class="form-control" name="observaciones"></textarea>
								</div>
							</div>
						</fieldset>
						<div class="form-group">
							<div class="col-lg-6 col-lg-offset-8">
								<button type="submit" name="btn_operador" class="btn btn-success">Agregar(+)</button>
							</div>
						</div>
					</form> <!--termina form-->

				</div>
			</div>
		</div>

	</body>
</html>