<?php 
session_start(); ?>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
		<link rel="shortcut icon" href="img/favicon.png">


		<title>Monte'Carlo</title>

		<link rel="stylesheet" href="styles/css/bootstrapValidator.min.css" type="text/css"> 
		<link rel="stylesheet" href="styles/css/sass-compile.css" type="text/css"> 
		<link rel="stylesheet" href="styles/css/styleWizar.css" type="text/css">

		<link rel="stylesheet" href="styles/css/sass-compiled.css" type="text/css">
		<link rel="stylesheet" href="styles/css/font-awesome.css">
		<link rel="stylesheet" href="styles/css/ihover.css" type="text/css">

		<!-- Bootstrap CSS -->    
		<link href="styles/css/bootstrap.min.css" rel="stylesheet">

		<link rel="stylesheet" href="styles/css/styles.css"        type="text/css">
		<link rel="stylesheet" href="styles/css/bootstra.min.css"   type="text/css"> 

		<link rel="stylesheet" type="text/css" href="styles/css/estilos.css">
		<!-- bootstrap theme -->
		<link href="styles/css/bootstrap-theme.css" rel="stylesheet">
		<!--external css-->
		<!-- font icon -->
		<link href="styles/css/elegant-icons-style.css" rel="stylesheet" />
		<link href="styles/css/font-awesome.min.css" rel="stylesheet" />  
		<!-- Custom styles -->
		<link href="styles/css/widgets.css" rel="stylesheet">
		<link href="styles/css/style.css" rel="stylesheet">
		<link href="styles/css/style-responsive.css" rel="stylesheet" />
		<link href="styles/css/jquery-ui-1.10.4.min.css" rel="stylesheet"> 
		<link rel="stylesheet" href="styles/css/stylefooter.css"   type="text/css" media="all">
	</head>



	<body class="login-img3-body">
		<header>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse">
							<span class="sr-only">Desplegar / Ocultar Menú</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="../img/index/logo_montecarlo.png" alt="Dispute Bills"></a>
					</div> <!-- corresponde al logo -->

					<!-- inicia el MENU -->
					<div class="collapse navbar-collapse large" id="navbarCollapse">
						<ul class="nav navbar-nav">
							<!--<li class=""><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li> -->
							<li><a href="../index.php">Inicio</a></li>
							<li><a href="../venta_refacciones.php"><i class=""></i>Refacciones</a></li>
							<li><a href="../todos_servicios.php"><i class=""></i>Servicios</a></li>

							<li><a href="../promociones.php"><i class=""></i>Promociones</a></li>

							<li>
								<a href="../content_cart.php">Carrito 
									<span class="badge"><?php if(isset($_SESSION["shopping_cartMT"])) { echo count($_SESSION["shopping_cartMT"]); } else { echo '0';}?></span>

								</a>
							</li>				

							<li class="dropdown">
								<?php if(isset($_SESSION['user_id'])) {?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Mi cuenta <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li class="divider"></li>
									<li><a href="cliente_perfil.php"><i class="fa fa-user"></i>  Perfil</a></li>
									<li class="divider"></li>
									<li><a href="cliente_logout.php.php">Cerrar sesion</a></li>
									<?php } else { ?>
									<li class="divider"></li>
									<li><a href="../cliente_login.php">Inicia sesion</a></li>
									<li><a href="socios/login.php">Socios</a></li>
									<?php } ?>
								</ul>

							</li> <!--termina li de la sesion -->

						</ul> <!-- termina ulnavbar -->
					</div> <!--termina el MENU -->
				</div> <!--agrega movimeinto al MENU -->
			</nav> <!--todo el MENU -->
		</header>
		<!-- formulario de registro -->


		<!-- formulario de registro -->
		<div class="main container tiraCentral">
		
			<div class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 form-box" style="text-align:center">
				<?php require_once 'funciones/datosSocio/registro_Socios.php'; ?>
				<form method="POST" action="" class="form-horizontal f1" role="form"  enctype="multipart/form-data" id="validarForm" name="validarF">

					<br>        
					<a href="#" class="active lin" id=""><h2>Registra tus datos</h2></a>
					<!-- inicia formulario -->
					<?php  if (isset($msg)) {  echo $msg;  }  ?>

					<!-- inicia formulario -->
					<div class="f1-steps">
						<div class="f1-steps">
							<div class="f1-progress">
								<div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
							</div>
							<div class="f1-step active">
								<div class="f1-step-icon"><i class="fa fa-user"></i></div>
								<p>Personal</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-envelope"></i></div>
								<p>Correo</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-home"></i></div>
								<p>Dirección</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-phone"></i></div>
								<p>Teléfono</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-user"></i></div>
								<p>Sesión</p>
							</div>


						</div> <!--end class f1-steps -->

						<fieldset>
							<h4>Inserte sus datos personales</h4>
							<br><br>

							<div class="col-lg-7 col-md-8 col-xs-8 col-lg-offset-2">



								<div class="form-group">
									<label class="col-xs-3 control-label">Nombre del taller</label>
									<div class="col-lg-9">
										<input type="text" required name="denominacion" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina DENOMINACION -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Nombre</label>
									<div class="col-lg-9">
										<input type="text"  required name="nombre" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termin NOMBRE -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Apellido Paterno</label>
									<div class="col-lg-9">
										<input type="text" required name="apellidopaterno" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina APATERNO -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Apellido Materno</label>
									<div class="col-lg-9">
										<input type="text" required  name="apellidomaterno" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina AMATERNO -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Alias</label>
									<div class="col-lg-9">
										<input type="text"  required name="alias" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina Alias -->

								<div class="form-group">
									<label class="col-xs-3 control-label">RFC</label>
									<div class="col-lg-9">
										<input type="text" required  name="rfc" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina RFC -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Observación</label>
									<div class="col-lg-9"> 
										<textarea type="text" class="form-control" required name="observacion" cols="40" rows="4" data-component="textarea" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
									</div>
								</div> <!--termina OBSERVACIONES -->

								<div class="f1-buttons">
									<button type="button" class="btn btn-primary btn-next">Siguiente</button>
								</div>
							</div><!--end offset -->

						</fieldset>
						<!---------------------------------------------------------------------------------------------------------------------->
						<fieldset>
							<h4>Ingrese su correo electrónico</h4>
							<br><br>

							<div class="col-lg-7 col-md-8 col-xs-8 col-lg-offset-2">
								<div class="form-group">
									<label class="col-xs-3 control-label">Tipo correo: </label>
									<div class="col-lg-9">
										<select class="form-control" name="tipoCorreo" id="tipoCorreo" required>
											<option value="Personal">Personal</option>
											<option value="Empresa">Empresa</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div> <!--termina la seleccion de tipo correo -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Correo</label>
									<div class="col-lg-9">
										<input type="email" required value="eje@mplo.com"  name="correoElectronico"required class="form-control"/>
									</div>
								</div> <!--termina form correo -->
								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous">Anterior</button>
									<button type="button" class="btn btn-primary btn-next">Siguiente</button>

								</div>
							</div> <!--end offset -->

						</fieldset>
						<!---------------------------------------------------------------------------------------------------------------------->

						<fieldset>
							<h4>Ingrese su dirección</h4>
							<br><br>

							<div class="col-lg-7 col-md-8 col-xs-8 col-lg-offset-2">
								<div class="form-group">
									<label class="col-xs-3 control-label">País</label>
									<div class="col-lg-9">
										<select class="form-control" id="pais" name="pais" >
											<option value="MEXICO">MEXICO</option>
										</select>
									</div>
								</div> <!--termina la seleccion de PAIS -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Estado</label>
									<div class="col-lg-9">
										<select name="estado" class="form-control "id="jmr_contacto_estado" required>
											<option>Selecciona tu estado</option>
										</select>
									</div>
								</div> <!--termina form-group Estado-->

								<div class="form-group">
									<label class="col-xs-3 control-label">Delegación</label>
									<div class="col-lg-9">
										<select name="delegacion" class="form-control" id="jmr_contacto_municipio" required>
											<option>Selecciona tu delegacion</option>
										</select>
									</div>
								</div> <!--termina form-group Delegacion-->

								<div class="form-group">
									<label class="col-xs-3 control-label">Colonia</label>
									<div class="col-lg-9">
										<input type="text"  name="colonia" required class="form-control"
											   onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina form-group Colonia-->

								<div class="form-group">
									<label class="col-xs-3 control-label">Calle</label>
									<div class="col-lg-9">
										<input type="text" name="calle" required class="form-control"
											   onkeyup="javascript:this.value=this.value.toUpperCase();"/>
									</div>
								</div> <!--termina form-group Calle-->

								<div class="form-group">
									<label class="col-xs-3 control-label">NúmeroInterior</label>
									<div class="col-lg-9">
										<input type="text"  name="numerointerior" required class="form-control" onKeyPress="return soloNumeros(event)"/>
									</div>
								</div> <!--termina form-group NumeroInterior-->

								<div class="form-group">
									<label class="col-xs-3 control-label">NúmeroExterior</label>
									<div class="col-lg-9">
										<input type="text"  name="numeroexterior" required class="form-control" onKeyPress="return soloNumeros(event)"/>
									</div>
								</div> <!--termina form-group NumeroExterior-->

								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous">Anterior</button>
									<button type="button" class="btn btn-primary btn-next">Siguiente</button>

								</div>
							</div><!--end offset -->

						</fieldset>

						<!---------------------------------------------------------------------------------------------------------------->
						<fieldset>
							<h4>Ingrese su teléfono</h4>
							<br><br>

							<div class="col-lg-7 col-md-8 col-xs-8 col-lg-offset-2">
								<div class="form-group">
									<label class="col-xs-3 control-label">Tipo teléfono: </label>
									<div class="col-lg-9">
										<select class="form-control" name="ubicacion" id="ubicacion" required> 
											<option value="Casa">Casa</option>
											<option value="Empleo">Empleo</option> 
										</select>

									</div>
								</div> <!--termina la seleccion de tipo telefono -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Teléfono:</label>
									<div class="col-lg-9">
										<input type="text"  name="telefono" required class="form-control"/>
									</div>
								</div> <!--termina form telefono -->
								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous">Anterior</button>
									<button type="button" class="btn btn-primary btn-next">Siguiente</button>

								</div>
							</div> <!--end offset -->

						</fieldset>

						<!---------------------------------------------------------------------------------------------------------------------->
						<fieldset>
							<h4>Introduzca sus datos de inicio de sesión</h4>
							<br><br>

							<div class="col-lg-7 col-md-8 col-xs-8 col-lg-offset-2">
								<div class="form-group">
									<label class="col-xs-3 control-label">Nombre de usuario</label>
									<div class="col-lg-9">
										<input type="text" name="nombreusuario" id="nomusuario" required class="form-control" /><div id="resultado"></div>
									</div>
								</div>
								<!--termina NOMBRE DE USUARIO-->

								<div class="form-group ">
									<label class="col-xs-3 control-label">Contraseña</label>
									<div class="col-lg-9">
										<input type="password"  name="password" required class="form-control" />

									</div>
								</div> <!--termin from-group -->

								<div class="form-group">
									<label class="col-xs-3 control-label">Confirmar contraseña</label>
									<div class="col-lg-9">
										<input type="password" name="reppassword" required class="form-control"  onkeyup="comprobar();" />
										<div id="mensaje"></div>
									</div> 
								</div>
								<!--termina from-group --> 

								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous">Anterior</button>

									<button type="submit"   name="btnsignup" class="btn btn-primary">Enviar</button>

								</div>
							</div> <!--end offset -->

						</fieldset>
					</div> <!--fin del formulas-->



					<br><br>
					<div class="row">
						<p id="linkk">¿Ya estás registrado? <a class="lin" href="login.php">Inicia sesión aquí</a> </p>
					</div>

				</form>


			</div> <!-- end offset-1 -->

		</div> 
		<!--termina registro -->



		<!-- javascripts -->
		<script src="styles/js/jquery.min.js"></script>
		<script src="styles/js/bootstrap.min.js"></script> 
		<script src="styles/js/jquery-3.2.1.min.js"></script> 
		<script src="styles/js/bootstrapValidator.min.js"></script>
		<script src="styles/js/jquery.backstretch.min.js"></script>
		<script src="styles/js/scriptsWizard.js"></script>

		<!------------------------------------------------------------------------>
		<script>//obtener estados
			// Obtener estados
			$.ajax({
				type: "POST",
				url: "funciones/procesar-estados.php",
				data: { estados : "Mexico" }
			}).done(function(data){
				$("#jmr_contacto_estado").html(data);
			});
			// Obtener municipios
			$("#jmr_contacto_estado").change(function(){
				var estado = $("#jmr_contacto_estado option:selected").val();
				$.ajax({
					type: "POST",
					url: "funciones/procesar-estados.php",
					data: { municipios : estado }
				}).done(function(data){
					$("#jmr_contacto_municipio").html(data);
					onkeyup="javascript:this.value=this.value.toUpperCase();"
				});
			});

		</script>

		<script>/*comprobar si el usuario existe*/
			$(document).ready(function(){                
				var consulta;
				//hacemos focus
				$("#nomusuario").focus();

				//comprobamos si se pulsa una tecla
				$("#nomusuario").keyup(function(e){
					//obtenemos el texto introducido en el campo
					consulta = $("#nomusuario").val();

					//hace la búsqueda
					$("#resultado").queue(function(n) {    

						$("#resultado").html('<img src="http://localhost/Montecarlo05/styles/img/ajax-loader.gif" />');
						$.ajax({
							type: "POST",
							url: "http://localhost/Montecarlo05/funciones/validarUser.php",
							data: "b="+consulta,
							dataType: "html",
							error: function(){
								alert("error petición ajax");

							},
							success: function(data){                                    
								$("#resultado").html(data);
								n();
							}
						});                
					});              
				});              
			});

		</script>


		<script type="text/javascript" >//comprobar contrasenas
			function comprobar() {
				var result, pass1,pass2;
				pass1 = document.validarF.password.value;
				pass2 = document.validarF.reppassword.value;

				if (pass1 != pass2) {
					result = '<label class="Control-label">claves incorrectas</label>';
					document.getElementById('mensaje').innerHTML = result;
					document.validarF.btnsignup.disabled=true;


				} else {
					result  = '<label class="Control-label">claves correctas</label>';	  
					document.getElementById('mensaje').innerHTML = result;                 
					document.validarF.btnsignup.disabled=false;
				}
			}
		</script>


		<script>
			function soloNumeros(e) {
				var key = window.Event ? e.which : e.keyCode;
				return ((key >= 48 && key <= 57) ||(key==8))
			}
		</script>

		<!------------------------------------------------------------------------>
		<script>//validar campos
			$(document).ready(function() {
				$('#validarForm').bootstrapValidator({
					// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
					feedbackIcons: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						denominacion: {
							message: 'Denominación no es válida',
							validators: {
								notEmpty: {
									message: 'La denominación es requerida y no debe estar vacío'
								},
								stringLength: {
									min: 6,
									max: 30,
									message: 'La denominación debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9 ]+$/,
									message: 'La denominación solo puede consistir de alfabeto y número'
								}
							}
						},
						nombre: {
							message: 'Nombre no es válido',
							validators: {
								notEmpty: {
									message: 'El nombre es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 4,
									max: 30,
									message: 'El nombre debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
									message: 'El nombre solo puede consistir de alfabeto'
								}
							}
						},
						apellidopaterno: {
							message: 'Apellido no es válido',
							validators: {
								notEmpty: {
									message: 'El apellido paterno es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 4,
									max: 30,
									message: 'El apellido paterno debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
									message: 'El apellido paterno  solo puede consistir de alfabeto'
								}
							}
						},
						apellidomaterno: {
							message: 'Apellido no es válido',
							validators: {
								notEmpty: {
									message: 'El apellido materno es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 4,
									max: 30,
									message: 'El apellido materno debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
									message: 'El apellido materno solo puede consistir de alfabeto'
								}
							}
						},
						alias: {
							message: 'Nombre no es válida',
							validators: {
								notEmpty: {
									message: 'El alias es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 4,
									max: 30,
									message: 'El alias debe ser más de 4 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
									message: 'El alias solo puede consistir de alfabeto'
								}
							}
						},
						rfc: {
							message: 'RFC no es válido',
							validators: {
								notEmpty: {
									message: 'El RFC es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 10,
									max: 13,
									message: 'El RFC debe ser más de 10 a 13 characters'
								},
								regexp: {
									regexp: /^[a-zA-Z0-9ñÑ]+$/,
									message: 'El RFC solo puede consistir de alfabeto'
								}
							}
						},
						observacion: {
							message: 'Observación no es válida',
							validators: {
								notEmpty: {
									message: 'La observación es requerida y no debe estar vacío'
								},
								stringLength: {
									min: 6,
									max: 50,
									message: 'La observación debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[a-zA-Z ]+$/,
									message: 'La observación solo puede consistir de alfabeto'
								}
							}
						},  
						tipoCorreo: {
							validators: {
								notEmpty: {
									message: ''
								},  
								stringLength: {
									min: 2,
									max: 20,
									message: ''
								},

							}
						},

						correoElectronico: {
							validators: {
								notEmpty: {
									message: 'La dirección del correo electrónico es requerida y no puede estar vacío'
								},
								emailAddress: {
									message: 'La dirección del correo electrónico no es uno valida '
								}
							}
						},
						pais: {
							validators: {
								notEmpty: {
									message: ''
								},  
								stringLength: {
									min: 3,
									max: 50,
									message: ''
								},

							}
						},

						jmr_contacto_estado: {
							validators: {
								notEmpty: {
									message: ''
								},

							}
						},
						jmr_contacto_municipio : {
							validators: {
								notEmpty: {
									message: ''
								},

							}
						},

						colonia: {
							message: 'Nombre de la colonia no es válida',
							validators: {
								notEmpty: {
									message: 'El nombre de la colonia es requerida y no debe estar vacío'
								},
								stringLength: {
									min: 4,
									max: 30,
									message: 'El nombre de la colonia debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
									message: 'El nombre de la colonia solo puede consistir de alfabeto'
								}
							}
						},
						calle: {
							message: 'Nombre de la calle no es válida',
							validators: {
								notEmpty: {
									message: 'El nombre de la calle es requerida y no debe estar vacío'
								},
								stringLength: {
									min: 4,
									max: 30,
									message: 'El nombre de la calle debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/,
									message: 'El nombre de la calle solo puede consistir de alfabeto'
								}
							}
						},
						numeroInterior: {
							message: 'Número Interior no es válida',
							validators: {
								notEmpty: {
									message: 'El número interior es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 1,
									message: 'El número interior debe ser más de 1 a 30 characters'
								},
								regexp: {
									regexp: /^[0-9]+$/,
									message: 'Solo se aceptan números'
								}
							}
						},
						numeroExterior: {
							message: 'Número Exterior no es válida',
							validators: {
								notEmpty: {
									message: 'El número exterior es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 1,
									message: 'El número exterior debe ser más de 1 a 30 characters'
								},
								regexp: {
									regexp: /^[0-9]+$/,
									message: 'Solo se aceptan números'
								}
							}
						},
						ubicacion: {
							validators: {
								notEmpty: {
									message: ''
								},                             
							}
						},
						telefono: {
							validators: {
								notEmpty: {
									message: 'El teléfono es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 10,
									max: 15,
									message: 'El teléfono debe ser más de 9 a 14 characters'
								},
								regexp: {
									regexp: /^[()+0-9 ]+$/,
									message: 'El teléfono solo puede consistir de números'
								}
							}
						},
						nombreusuario: {
							message: 'El nombre de usuario no es válido',
							validators: {
								notEmpty: {
									message: 'El nombre de usuario es requerido y no debe estar vacío'
								},
								stringLength: {
									min: 6,
									max: 30,
									message: 'El nombre de usuario debe ser más de 6 a 30 characters'
								},
								regexp: {
									regexp: /^[A-Za-záéíóúñÑÁÉÍÓÚ0-9 ]+$/,
									message: 'El nombre de usuario solo puede consistir de alfabeto y números'
								},
								different: {
									field: 'password',
									message: 'El nombre de usuario no puede ser igual al password'
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: 'La contraseña es requerida y no debe ser vacía'
								},
								different: {
									field: 'nombreusuario',
									message: 'La contraseña no puede ser igual al nombre de usuario'
								},
								stringLength: {
									min: 8,
									message: 'La contraseña debe tener más de 8 caracteres'
								}
							}
						},
						reppassword: {
							validators: {
								notEmpty: {
									message: 'La contraseña es requerida y no debe ser vacía'
								},
								stringLenght: {
									min: 8,
									message: 'La contraseña debe tener más de 8 caracteres'
								}
							}
						}

					} //termina fields
				});
			});
			$(function() {

				$('#login-form-link').click(function(e) {
					$("#login-form").delay(100).fadeIn(100);
					$("#register-form").fadeOut(100);
					$('#register-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});
				$('#register-form-link').click(function(e) {
					$("#register-form").delay(100).fadeIn(100);
					$("#login-form").fadeOut(100);
					$('#login-form-link').removeClass('active');
					$(this).addClass('active');
					e.preventDefault();
				});

			});
		</script>

	</body>
</html>