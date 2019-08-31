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
		<title>Buzon Operador</title>

		<link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos.css"   type="text/css">
		<link rel="stylesheet" href="css/menu_cliente.min.css" type="text/css">
		<link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
		<link rel="stylesheet" href="css/blue.css" type="text/css">

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

		<!-- ============================================================================================================================================-->
		
		<?php contenidoSitio(); ?>

		<br><br><br><br>
		
		<!-- ===========================================================================================================================================-->
		<div class="container tiraPrincipal">
			<section class="content">
				<div class="row">
					<?php 
					$page2='buzon_operador';
					include 'php/lib-menu_cliente.php';
					?>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Inbox</h3>

								<div class="box-tools pull-right">
									<div class="has-feedback">
										<input type="text" class="form-control input-sm" placeholder="Buscar Correo">
										<span class="glyphicon glyphicon-search form-control-feedback"></span>
									</div>
								</div>
								<!-- /.box-tools -->
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding">
								<div class="mailbox-controls">
									<!-- Check all button -->
									<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
									</button>
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
									</div>
									<!-- /.btn-group -->
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
									<div class="pull-right">
										1-50/200
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
										</div>
										<!-- /.btn-group -->
									</div>
									<!-- /.pull-right -->
								</div>
								<div class="table-responsive mailbox-messages">
									<table class="table table-hover table-striped">
										<tbody>
											<tr>
												<td><input type="checkbox"></td>
												<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
												<td class="mailbox-name"><a href="buzon_operador_read.php">Alexander Pierce</a></td>
												<td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
												</td>
												<td class="mailbox-attachment"></td>
												<td class="mailbox-date">5 mins ago</td>
											</tr>
											<tr>
												<td><input type="checkbox"></td>
												<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
												<td class="mailbox-name"><a href="buzon_operador_read.php">Alexander Pierce</a></td>
												<td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
												</td>
												<td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
												<td class="mailbox-date">28 mins ago</td>
											</tr>
											<tr>
												<td><input type="checkbox"></td>
												<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
												<td class="mailbox-name"><a href="buzon_operador_read.php">Alexander Pierce</a></td>
												<td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
												</td>
												<td class="mailbox-attachment"></td>
												<td class="mailbox-date">11 hours ago</td>
											</tr>										
											
										</tbody>
									</table>
									<!-- /.table -->
								</div>
								<!-- /.mail-box-messages -->
							</div>
							<!-- /.box-body -->
							<div class="box-footer no-padding">
								<div class="mailbox-controls">
									<!-- Check all button -->
									<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
									</button>
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
									</div>
									<!-- /.btn-group -->
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
									<div class="pull-right">
										1-50/200
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
										</div>
										<!-- /.btn-group -->
									</div>
									<!-- /.pull-right -->
								</div>
							</div>
						</div>
						<!-- /. box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</div>

		<!-- =======================================================================================================================================================-->

		<?php footerSitio(); //pie de pagina?>

		<!-- =======================================================================================================================================================-->

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/menu_cliente.min.js"></script>
		<script src="js/icheck.min.js"></script>

		<script type="text/javascript">
			$(function () {
				//Enable iCheck plugin for checkboxes
				//iCheck for checkbox and radio inputs
				$('.mailbox-messages input[type="checkbox"]').iCheck({
					checkboxClass: 'icheckbox_flat-blue',
					radioClass: 'iradio_flat-blue'
				});

				//Enable check and uncheck all functionality
				$(".checkbox-toggle").click(function () {
					var clicks = $(this).data('clicks');
					if (clicks) {
						//Uncheck all checkboxes
						$(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
						$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
					} else {
						//Check all checkboxes
						$(".mailbox-messages input[type='checkbox']").iCheck("check");
						$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
					}
					$(this).data("clicks", !clicks);
				});

				//Handle starring for glyphicon and font awesome
				$(".mailbox-star").click(function (e) {
					e.preventDefault();
					//detect type
					var $this = $(this).find("a > i");
					var glyph = $this.hasClass("glyphicon");
					var fa = $this.hasClass("fa");

					//Switch states
					if (glyph) {
						$this.toggleClass("glyphicon-star");
						$this.toggleClass("glyphicon-star-empty");
					}

					if (fa) {
						$this.toggleClass("fa-star");
						$this.toggleClass("fa-star-o");
					}
				});
			});
		</script>
	</body>
</html>