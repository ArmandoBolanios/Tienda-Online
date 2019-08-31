<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<link rel="stylesheet" href="../css/estilos_administrador.css"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	
</head>
<body>
	
	<div class="main container">
		<div class="row">
            <div class="col-lg-12">
            <div class="footer-logo">
			<h3><span>Monte'Carlo Automotriz  &copy;</span></h3>
		</div>   
        </div>
        </div>
	</div>
	
	<div class="main container">
		<div class="row">
			<div class="col-lg-12" align="center">
				<h2>Categoria</h2>
				
				<?php
				if(isset($_POST['insert_categoria'])) {
					require_once '../connections/conexion.php';
					require '../php/lib-generadorID.php';
					
					//datos para la categoria
					$idCategoria = generarIDCATEGORIA();
					$descripcion = mysqli_real_escape_string($ConexionBD, $_POST['descripcion']);
					$aux = 1;
					$sqlCategoria = "INSERT INTO categoria (idCategoria, descripcion, fechaDeRegistro, aux)
					VALUES('$idCategoria','$descripcion', now(), '$aux')";
					
					
					mysqli_query($ConexionBD, $sqlCategoria);
					
					
					mysqli_close($ConexionBD);
				} //fin de isset
				?>
				<form method="POST" action="datos_articulo.php" class="form-horizontal" role="form">
					<fieldset>
						<div class="form-group">
							<label class="col-lg-4 control-label">Descripción</label>
							<div class="col-lg-6">
								<input type="text" name="descripcion" class="form-control" />
							</div>
						</div> <!--termina descripcion -->
					</fieldset>
					
					<div class="form-group">
						<div class="col-lg-6 col-lg-offset-8">
							<button type="submit" name="insert_categoria" class="btn btn-success">Agregar(+)</button>
						</div>
					</div>
				</form> <!--termina form-->
				
				
				
				<br><br>
				<h2>Departamento</h2>
				<?php
				if(isset($_POST['btn_departamento'])) {
					require_once '../connections/conexion.php';
					require '../php/lib-generadorID.php';
					
					//datos para la categoria
					$idDepartamento = generarIDDEPARTAMENTO();
					$descripcion2 = mysqli_real_escape_string($ConexionBD, $_POST['descripcion2']);
					$aux = 1;
					$sqlDepartamento = "INSERT INTO departamento (idDepartamento, descripcion, fechaDeRegistro, aux)
					VALUES('$idDepartamento','$descripcion2', now(), '$aux')";
					
					
					mysqli_query($ConexionBD, $sqlDepartamento);
					
					
					mysqli_close($ConexionBD);
				} //fin de isset
				?>
				<form method="POST" action="datos_articulo.php" class="form-horizontal" role="form">
					<fieldset>
						<div class="form-group">
							<label class="col-lg-4 control-label">Descripción</label>
							<div class="col-lg-6">
								<input type="text" name="descripcion2" class="form-control" />
							</div>
						</div> <!--termina descripcion -->
					</fieldset>
					
					<div class="form-group">
						<div class="col-lg-6 col-lg-offset-8">
							<button type="submit" name="btn_departamento" class="btn btn-success">Agregar(+)</button>
						</div>
					</div>
				</form> <!--termina form-->
				
				
				
				<br><br>
				<h2>Proveedor</h2>
				<?php
				if(isset($_POST['btn_proveedor'])) {
					require_once '../connections/conexion.php';
					require '../php/lib-generadorID.php';
					
					//datos para la categoria
					$idProveedor = generarIDPROVEEDOR();
					$claveProveedor = 0;
					$denominacion = mysqli_real_escape_string($ConexionBD, $_POST['denominacion']);
					$nombre       = mysqli_real_escape_string($ConexionBD, $_POST['nombre']);
					$aPaterno     = mysqli_real_escape_string($ConexionBD, $_POST['aPaterno']);
					$aMaterno     = mysqli_real_escape_string($ConexionBD, $_POST['aMaterno']);
					$alias        = mysqli_real_escape_string($ConexionBD, $_POST['alias']);
					$rfc 		  = mysqli_real_escape_string($ConexionBD, $_POST['rfc']);
					$observaciones	  = mysqli_real_escape_string($ConexionBD, $_POST['observaciones']);
					$aux = 1;
					
					$sqlProveedor = "INSERT INTO proveedor (idProveedor, claveProveedor, denominacion, nombreProveedor, 
					apellidoPaternoProveedor, apellidoMaternoProveedor, alias, rfc, observaciones, fechaDeRegistro, aux)
					VALUES('$idProveedor', '$claveProveedor', '$denominacion', '$nombre', '$aPaterno', '$aMaterno',
					'$alias', '$rfc', '$observaciones', now(), '$aux')";
					
					
					mysqli_query($ConexionBD, $sqlProveedor);
					
					
					mysqli_close($ConexionBD);
				} //fin de isset
				?>
				<form method="POST" action="datos_articulo.php" class="form-horizontal" role="form">
					<fieldset>
						<div class="form-group">
							<label class="col-lg-4 control-label">Denominación</label>
							<div class="col-lg-6">
								<input type="text" name="denominacion" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div> <!--termina descripcion -->
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Nombre</label>
							<div class="col-lg-6">
								<input type="text" name="nombre" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">ApellidoPaterno</label>
							<div class="col-lg-6">
								<input type="text" name="aPaterno" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">ApellidoMaterno</label>
							<div class="col-lg-6">
								<input type="text" name="aMaterno" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Alias</label>
							<div class="col-lg-6">
								<input type="text" name="alias" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">RFC</label>
							<div class="col-lg-6">
								<input type="text" name="rfc" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Observaciones</label>
							<div class="col-lg-6">
								<textarea type="text" name="observaciones" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
							</div>
						</div>
						
					</fieldset>
					
					<div class="form-group">
						<div class="col-lg-6 col-lg-offset-8">
							<button type="submit" name="btn_proveedor" class="btn btn-success">Agregar(+)</button>
						</div>
					</div>
				</form> <!--termina form-->
				
			</div>
		</div>
	</div>
	
</body>
</html>