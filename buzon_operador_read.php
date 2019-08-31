<?php
session_start();
if(isset($_SESSION['user_id'])) {
	$idCliente = $_SESSION['user_id'];

} else {
	header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mensaje</title>

		<link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
		<link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos.css"   type="text/css">
		<link rel="stylesheet" href="css/menu_cliente.min.css" type="text/css">
		<link rel="stylesheet" href="css/sass-compiled.css" type="text/css">

		<link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">

	</head>
	<body>
		<?php
		if(isset($_SESSION['user_id'])) {
			$page='perfil_cliente'; 
			include 'php/lib-sitio_ok.php';
			include 'php/lib-generadorID.php';
			include 'connections/conexion.php';
		} else {
			$page='inicio'; include 'php/lib-sitio.php';
		}
		?>

		<!-- ===============================================================================================================================================-->

		<?php contenidoSitio(); ?>

		<br><br><br><br>

		<!-- =====================================================================================================================================================-->
		<div class="container tiraPrincipal">
			<section class="content">
				<div class="row">
					<?php 
					$page2='buzon_operador';
					include 'php/lib-menu_cliente.php';
					?>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Read Mail</h3>

								<div class="box-tools pull-right">
									<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
									<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<div class="mailbox-read-info">
									<h3>Message Subject Is Placed Here</h3>
									<h5>From: help@example.com
										<span class="mailbox-read-time pull-right">15 Feb. 2016 11:03 PM</span></h5>
								</div>
								<!-- /.mailbox-read-info -->
								<div class="mailbox-controls with-border text-center">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
											<i class="fa fa-trash-o"></i></button>
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
											<i class="fa fa-reply"></i></button>
										<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
											<i class="fa fa-share"></i></button>
									</div>
									<!-- /.btn-group -->
									<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
										<i class="fa fa-print"></i></button>
								</div>
								<!-- /.mailbox-controls -->
								<div class="mailbox-read-message">
									<p>Hello John,</p>

									<p align="justify">Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwaveput
										a bird
										on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
										master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
										gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
										asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
										blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
										Apparel.</p>

									<p align="justify">Raw denim McSweeney's bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&amp;B
										literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar
										toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth
										umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&amp;B
										flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed
										slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix.
										Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore
										whatever viral Truffaut.</p>

									<p align="justify">Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny
										pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar
										toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo
										locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney's messenger bag swag
										slow-carb. Odd Future photo booth pork belly, you probably haven't heard of them actually tofu ennui
										keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>

									<p align="justify">Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray
										leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American
										Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral
										plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid
										vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha
										flannel chambray chia cronut.</p>

									<p>Thanks,<br>Jane</p>
								</div>
								<!-- /.mailbox-read-message -->
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<ul class="mailbox-attachments clearfix">
									<li>
										<span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

										<div class="mailbox-attachment-info">
											<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
											<span class="mailbox-attachment-size">
												1,245 KB
												<a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
											</span>
										</div>
									</li>
									<li>
										<span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

										<div class="mailbox-attachment-info">
											<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
											<span class="mailbox-attachment-size">
												1,245 KB
												<a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
											</span>
										</div>
									</li>
									<li>
										<span class="mailbox-attachment-icon has-img"><img src="img/mail/photo1.png" alt="Attachment"></span>

										<div class="mailbox-attachment-info">
											<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
											<span class="mailbox-attachment-size">
												2.67 MB
												<a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
											</span>
										</div>
									</li>
									<li>
										<span class="mailbox-attachment-icon has-img"><img src="img/mail/photo2.png" alt="Attachment"></span>

										<div class="mailbox-attachment-info">
											<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
											<span class="mailbox-attachment-size">
												1.9 MB
												<a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
											</span>
										</div>
									</li>
								</ul>
							</div>
							<!-- /.box-footer -->
							<div class="box-footer">
								<div class="pull-right">
									<a href="buzon_operador.php"><button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Regresar</button>
									</a>
									<a href="#"><button type="button" class="btn btn-default" data-title="Edit" data-toggle="modal" data-target="#responderCorreo"><i class="fa fa-pencil"></i> Responder</button></a>
								</div>
								<button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
								<button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
							</div>
							<!-- /.box-footer -->
						</div>
						<!-- /. box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</div>
		
		<!-- =============================================================================================================================== -->
		<!-- modal para responder mensaje -->
		<div class="col-md-12">
			<div class="modal fade" id="responderCorreo" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
							<h4 class="modal-title custom_align" id="Heading">Respuesta para el cliente</h4>
						</div>

						<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"
							  id="validaEnvioCorreo" name="validaEnvioCorreo">
							<fieldset>
								<div class="modal-body">
									<div class="form-group">
										<input type="text" class="form-control" name="remitente" placeholder="Remitente">
									</div>

									<div class="form-group">
										<textarea type="text" class="form-control" name="cuerpo" style="height: 300px" 
											placeholder="Escribe tu respuesta"></textarea>
									</div>
								</div>
								<div class="modal-footer ">
									<button type="submit" name="respuesta_cliente" class="btn btn-info btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Enviar mensaje</button>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- /.modal-content --> 
				</div>
				<!-- /.modal-dialog --> 
			</div>
		</div>
		<?php
		//enviar respuesta al cliente, guardarlo en la BD
		if(!empty($_POST)) {
			if(isset($_POST['respuesta_cliente'])) {
				$remitente = mysqli_real_escape_string($ConexionBD, $_POST['remitente']);
				$mensaje   = mysqli_real_escape_string($ConexionBD, $_POST['cuerpo']);
				
				$SQLBuzon_Cliente = "INSERT INTO buzon_cliente(idCliente, operador, mensaje, estado, fechaDeRegistro, aux)
				VALUES('$idCliente', 'DELL', '$mensaje', '1', NOW(), '1')";
				
				mysqli_query($ConexionBD, $SQLBuzon_Cliente);
				echo 'Mensaje Enviado!';
				print "<script>setTimeout(7000); window.location='buzon_operador.php';</script>";
			}
		}
		?>
		<!--  -->
		<?php footerSitio(); //pie de pagina?>
		<!-- =======================================================================================================================================================-->

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrapValidator.min.js"></script>
		<script src="js/validator_form.js"></script>
	</body>
</html>