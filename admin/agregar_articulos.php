<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<link rel="stylesheet" href="../css/estilos_administrador.css"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/font-awesome.css" />
	
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
				<h2>Artículos</h2>
				<br><br>
				<?php
				if(isset($_POST['btn_articulo'])) {
					require_once '../connections/conexion.php';
					require '../php/lib-generadorID.php';
					//include 'class.upload.php';
					
					//datos para la categoria
					$idArticulo = generarIDARTICULO();
					$codigoArticulo = 0;
					$codigoAlterno  = 0;
					$marca 						= mysqli_real_escape_string($ConexionBD, $_POST['marca']);
					$modelo 					= mysqli_real_escape_string($ConexionBD, $_POST['modelo']);
					$descripcionArticulo       	= mysqli_real_escape_string($ConexionBD, $_POST['descripcionArticulo']);
					$unidadCompra     			= mysqli_real_escape_string($ConexionBD, $_POST['unidadCompra']);
					$unidadVenta     			= mysqli_real_escape_string($ConexionBD, $_POST['unidadVenta']);
					$factor        				= mysqli_real_escape_string($ConexionBD, $_POST['factor']);
					$inventarioMinimo 		  	= mysqli_real_escape_string($ConexionBD, $_POST['inventarioMinimo']);
					$inventarioMaximo	  		= mysqli_real_escape_string($ConexionBD, $_POST['inventarioMaximo']);
					$unidadesExistentes 		= mysqli_real_escape_string($ConexionBD, $_POST['unidadesExistentes']);
					$unidadesVendidas 			= mysqli_real_escape_string($ConexionBD, $_POST['unidadesVendidas']);
					$localizacion 				= mysqli_real_escape_string($ConexionBD, $_POST['localizacion']);
					$idCategoria				=  mysqli_real_escape_string($ConexionBD, $_POST['idCategoria']);
					$idDepartamento 			= mysqli_real_escape_string($ConexionBD, $_POST['idDepartamento']);
					$idProveedor 				= mysqli_real_escape_string($ConexionBD, $_POST['idProveedor']);
					$aux = 1;
					
					
					
										
					$sqlArticulo = "INSERT INTO articulo (idArticulo, codigoArticulo, codigoAlterno, marca, modelo, descripcionArticulo,
					unidadDeCompra, unidadDeVenta, factor, inventarioMinimo, inventarioMaximo, unidadesExistentes, unidadesVendidas,
					localizacion, idCategoria, idDepartamento,  idProveedor, fechaDeRegistro, aux)
					VALUES('$idArticulo', '$codigoArticulo', '$codigoAlterno', '$marca', '$modelo','$descripcionArticulo', '$unidadCompra', '$unidadVenta',
					'$factor','$inventarioMinimo', '$inventarioMaximo', '$unidadesExistentes', '$unidadesVendidas', '$localizacion', 
					'$idCategoria', '$idDepartamento','$idProveedor', now(), '$aux')";
					
					mysqli_query($ConexionBD, $sqlArticulo);
					
					function con(){
						return new mysqli("localhost","root","","proyectomontecarlo");
					}
					
					
					function insert_img($folder, $image) {
						$con = con();
						global $idArticulo;
						$idArticulo = $idArticulo;
						$nombreImagen = isset($_POST['nombreImagen'])? $_POST['nombreImagen']:NULL;
						$orden = isset($_POST['orden'])? $_POST['orden']:NULL;
						
						$renm = ramIMAGEN();
						rename ("../admin/imgarticulos/$image", "../admin/imgarticulos/$renm");
						echo $renm;
						$query = $con->query("insert into imagen (idArticulo,urlImagen, nombreImagen, orden, fechaDeRegistro, aux)
						values ('$idArticulo', '$renm', '$nombreImagen',  '$orden',  NOW() , 1)");
					}
					
					
					mysqli_close($ConexionBD);
				} //fin de isset
				?>
				
				
				<form enctype="multipart/form-data" method="POST" action="upload2.php" class="form-horizontal" role="form">
					<fieldset>
					
						<div class="form-group">
							<label class="col-lg-4 control-label">Marca</label>
							<div class="col-lg-6">
								<input type="text" name="marca" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Modelo</label>
							<div class="col-lg-6">
								<input type="text" name="modelo" class="form-control"  onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Descripción</label>
							<div class="col-lg-6">
								<textarea type="text" name="descripcionArticulo" class="form-control"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Unidad de compra</label>
							<div class="col-lg-6">
								<input type="numeric" name="unidadCompra" class="form-control"/>
							</div>
						</div> <!--termina descripcion -->
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Unidad de venta</label>
							<div class="col-lg-6">
								<input type="numeric" name="unidadVenta" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Factor</label>
							<div class="col-lg-6">
								<input type="numeric" name="factor" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Inventario Minimo</label>
							<div class="col-lg-6">
								<input type="numeric" name="inventarioMinimo" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Inventario Maximo</label>
							<div class="col-lg-6">
								<input type="numeric" name="inventarioMaximo" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Unidades Existentes</label>
							<div class="col-lg-6">
								<input type="numeric" name="unidadesExistentes" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Unidades Vendidas</label>
							<div class="col-lg-6">
								<input type="numeric" name="unidadesVendidas" class="form-control"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Localizacion</label>
							<div class="col-lg-6">
								<input type="text" name="localizacion" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Categoria</label>
							<div class="col-lg-6">
								<select name="idCategoria" class="form-control">
									<option value="">Categoria</option>
									<?php require_once '../connections/conexion.php';
									//seleccionamos la tabla categorias
									$sql1 = "SELECT * FROM categoria";
									$resultado1 = mysqli_query($ConexionBD, $sql1);
									
									if(mysqli_num_rows($resultado1) > 0) {
										while($row = mysqli_fetch_assoc($resultado1)) {
											$idCategoria = $row['idCategoria'];
											echo "<option value='$idCategoria'>".$row['descripcion']."</option>";
										}
									}
									?>
								</select>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Departamento</label>
							<div class="col-lg-6">
								<select name="idDepartamento" class="form-control">
									<option value="">Departamento</option>
									<?php require_once '../connections/conexion.php';
									//seleccionamos la tabla categorias
									$sql1 = "SELECT * FROM departamento";
									$resultado1 = mysqli_query($ConexionBD, $sql1);
									
									if(mysqli_num_rows($resultado1) > 0) {
										while($row = mysqli_fetch_assoc($resultado1)) {
											$idDepartamento = $row['idDepartamento'];
											echo "<option value='$idDepartamento'>".$row['descripcion']."</option>";
										}
									}
									?>
								</select>
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Proveedor</label>
							<div class="col-lg-6">
								<select name="idProveedor" class="form-control">
									<option value="">Proveedor</option>
									<?php require_once '../connections/conexion.php';
									//seleccionamos la tabla categorias
									$sql1 = "SELECT * FROM proveedor";
									$resultado1 = mysqli_query($ConexionBD, $sql1);
									
									if(mysqli_num_rows($resultado1) > 0) {
										while($row = mysqli_fetch_assoc($resultado1)) {
											$idProveedor = $row['idProveedor'];
											echo "<option value='$idProveedor'>".$row['alias']."</option>";
										}
									}
									?>
								</select>
								
							</div>
						</div>
						
						
						<br><br>
						<h2>Fotografías del Artículo</h2>
						<!-- IMAGEN -->
						<br><br>
						<div class="form-group">
							<div class="col-lg-6 col-lg-offset-3">
								<input name="image[]" required=""  size="70" type="file" multiple/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Nombre Imagen</label>
							<div class="col-lg-6">
								<input type="text" name="nombreImagen" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-4 control-label">Orden</label>
							<div class="col-lg-6">
								<input type="numeric" name="orden" class="form-control"/>
							</div>
						</div>
						
						
					</fieldset>
					<div class="form-group">
						<div class="col-lg-6 col-lg-offset-8">
							<button type="submit" name="btn_articulo" class="btn btn-success">Agregar(+)</button>
						</div>
					</div>
				</form> <!--termina form-->
				
			</div>
		</div>
	</div>
	
</body>
</html>