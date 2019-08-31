<?php
session_start();
$idArticulo = $_GET['idArticulo'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles del producto</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"       type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/detalles_productos.css" type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css">

        <script src="js/jquery-3.2.1.min.js"></script>
        <script type="application/x-javascript"> addEventListener("load", function() {
                setTimeout(hideURLbar, 0); }, false); function hideURLbar() { 
                window.scrollTo(0,1); 
            }
        </script>

        <link rel="stylesheet" href="css/etalage.css" type="text/css">
        <script src="js/jquery.etalage.min.js"></script>

        <script>
            jQuery(document).ready(function($){
                $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 400,
                    show_hint: true,
                    click_callback: function(image_anchor, instance_id){
                        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                    }
                });
                // This is for the dropdown list example:
                $('.dropdownlist').change(function(){
                    etalage_show( $(this).find('option:selected').attr('class') );
                });
            });
        </script>
    </head>
    <body>
        <?php
        if(isset($_SESSION['user_id'])) {
            $page='vref'; include 'php/lib-sitio_ok.php';
        } else {
            $page='vref'; include 'php/lib-sitio.php';
        }
        ?>
        <div class="espacio"></div>
        <div class="container">
            <div class="dreamcrub">
                <ul class="breadcrumbs">
                    <ol class="breadcrumb breadcrumb-arrow">
                        <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><a href="venta_refacciones.php">Refacciones</a></li>
                        <li class="active"><span>Detalles del producto</span></li>
                    </ol>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========================================== -->
        <?php include 'connections/conexion.php'; ?>
        <div class="main">
            <div class="content_box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="shipping text-center">
                                <div><img src="img/promo_ofertas/promo8.jpg" alt=""/></div>
                            </div><!-- side_banner -->
                            <div class="shipping text-center">
                                <div><img src="img/promo_ofertas/oferta.png" alt=""/></div>
                            </div><!-- side_banner -->
                            <div class="shipping text-center"><!--shipping-->
                                <img src="img/promo_ofertas/promo9.jpg" alt="" />
                            </div><!--/shipping-->
                        </div><!-- col-md-3 -->
                        <div class="col-md-9">
                            <div class="singel_right">
                                <div class="labout span_1_of_a1">
                                    <!-- start product_slider -->
                                    <ul id="etalage">
                                        <?php
                                        $query = $ConexionBD->query("SELECT urlImagen FROM imagen WHERE imagen.idArticulo='$idArticulo' ");

                                        while ($row = $query->fetch_assoc()) {
                                            echo
                                                '
										<li>
                                        	<img class="etalage_thumb_image"  src="admin/aplicacion/img_articulos/'.$row['urlImagen'].'"
                                            class="img-responsive">
                                        	<img class="etalage_source_image" src="admin/aplicacion/img_articulos/'.$row['urlImagen'].'"
                                            class="img-responsive">
                                        </li>
										';
                                        }
                                        ?>
                                    </ul>
                                    <!-- end product_slider -->
                                </div><!-- labout -->
                                <div class="cont1 span_2_of_a1">
                                    <?php
                                    $queryNombreImg = $ConexionBD->query("SELECT DISTINCT marca, modelo, codigoArticulo, codigoAlterno, descripcionArticulo, unidadDeVenta, unidadesExistentes, nombreProveedor, nombreImagen FROM articulo INNER JOIN imagen
								    ON articulo.idArticulo = imagen.idArticulo and imagen.idArticulo='$idArticulo' 
									INNER JOIN proveedor 
									ON proveedor.idProveedor = articulo.idProveedor ORDER BY nombreProveedor");
                                    while($rows = mysqli_fetch_array($queryNombreImg)) {
                                    ?>
                                    <h1><?php echo $rows['nombreImagen']; ?></h1>
                                    <div class="price_single">
                                        <span class="actual">$<?php echo number_format($rows['unidadDeVenta'],2); ?></span>
                                    </div>
                                    <p class="quick_desc" align="justify"><?php echo $rows['descripcionArticulo']; ?></p>
                                    <h2 class="quick">Marca: <?php echo $rows['marca']; ?></h2>
                                    <h2 class="quick">Modelo: <?php echo $rows['modelo']; ?></h2>
                                    <h2 class="quick">Código Artículo: <?php echo $rows['codigoArticulo']; ?></h2>
                                    <h2 class="quick">Código Alterno: <?php echo $rows['codigoAlterno']; ?></h2>
                                    <h2 class="quick">Stock:  <?php echo $rows['unidadesExistentes']; ?></h2>
                                    <h2 class="quick">Nombre del proveedor: <?php echo $rows['nombreProveedor']; ?></h2>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $query = "SELECT urlImagen, codigoArticulo, codigoAlterno, descripcionArticulo, unidadDeVenta, unidadesExistentes, articulo.idArticulo FROM articulo INNER JOIN 
										imagen ON articulo.idArticulo = imagen.idArticulo 
										and imagen.idArticulo = '$idArticulo' ORDER BY articulo.idArticulo ASC LIMIT 1";
                                    $result = mysqli_query($ConexionBD, $query);
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <div class="row">
                                        <section class="col-lg-3 col-md- col-sm-5 col-xs-5">
                                            <?php $valor = $row['unidadesExistentes']; ?>
                                            <!-- -->
                                            <?php
                                        if($valor == 0){
                                            //echo 'Articulo no disponible';
                                        } else {
                                            ?>
                                            <input type="hidden" name="Articulo" id="Articulo" 
                                                   value="<?php echo $row["idArticulo"]; ?> "/>
                                            <input type="number" name="quanti"  id="quanti"  class="form-control" 
                                                   onInput="validarInput('<?php echo $row["idArticulo"]; ?>')"  
                                                   onKeyPress="return soloNumeros(event)" value="1"
                                                   onKeyUp="noCero(this)"/>
                                            <?php
                                        }
                                            ?>
                                            <input type="hidden" name="quantity" id="quantity<?php echo $row['idArticulo']; ?>" 
                                                   class="form-control" value="1"> <span id="Info"></span>
                                            <input type="hidden" name="hidden_urlImagen" id="urlImagen<?php echo $row["idArticulo"]; ?>"
                                                   value="<?php echo $row["urlImagen"]; ?>" />
                                            <input type="hidden" name="hidden_codArticulo" id="codArticulo<?php echo $row["idArticulo"]; ?>" 
                                                   value="<?php echo $row["codigoArticulo"]; ?>" />
                                            <input type="hidden" name="hidden_codAlterno" id="codAlterno<?php echo $row["idArticulo"]; ?>"
                                                   value="<?php echo $row["codigoAlterno"]; ?>" />
                                            <input type="hidden" name="hidden_descrip" id="descrip<?php echo $row["idArticulo"]; ?>" 
                                                   value="<?php echo $row["descripcionArticulo"]; ?>" />
                                            <input type="hidden" name="hidden_price" id="price<?php echo $row["idArticulo"]; ?>" 
                                                   value="<?php echo $row["unidadDeVenta"]; ?>" />
                                        </section> <!-- col-lg-3 -->
                                    </div><!-- row -->
                                    <div class="btn_form">
                                        <form>
                                            <?php
                                        if($valor == 0){
                                            echo 'Articulo no disponible';
                                        } else {
                                            ?>
                                            <input type="button" name="add_to_cart" id="<?php echo $row["idArticulo"]; ?>" class="add_to_cart" value="Agregar al carrito" />
                                            <?php
                                        } //end else
                                            ?>
                                        </form>
                                    </div>
                                </div><!-- cont1 -->
                                <?php
                                    } //end result
                                ?>
                                <div class="clearfix"></div>
                            </div><!-- singel_right -->
                        </div><!-- col-md-9 -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- content_box -->
        </div><!-- main -->
        <div class="espacio"></div>
        <!-- ============================ -->
        <?php footerSitioNormal(); ?>

        <!-- =========================== -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>

        <!--INTRODUCE AUTOMATICAMENTE EL ID DEL ARTICULO-->
        <script type="text/javascript">
            $(document).ready(function() {
                var product_id = $('#Articulo').val(); //input tiene el idArticulo

                $("#quanti").keyup(function() {
                    var recibir = $(this).val();

                    //le envia el valor por teclado a quantity
                    $("#quantity"+product_id).val(recibir);
                });
            });

            //
            $(document).ready(function() {
                var product_id = $('#Articulo').val(); //input tiene el idArticulo
                $("#quanti").change(function() {
                    var recibir = $(this).val();

                    //le envia el valor por clicks tipo number a cuantity
                    $("#quantity"+product_id).val(recibir);
                });
            });
        </script>

        <script>
            /*ACEPTAR SÓLO NÚMEROS*/
            function soloNumeros(e) {
                var key = window.Event ? e.which : e.keyCode;
                return ((key >= 48 && key <= 57) ||(key==8))
            }
            function noCero(e) {
                var valor = e.value.replace(/^0*/, '');
                e.value = valor;
            }
            /*DESHABILITAR EL BOTÓN CUANDO EL INPUT ESTÁ VACÍO*/
            function validarInput(iden) {
                document.getElementById(iden).disabled = !document.getElementById("quanti").value.length;
            }
        </script>

        <!-- VERIFICAR STOCK -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#quanti').on('input',function() {
                    $('#Info').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);

                    var product_id              = $('#Articulo').val(); //input tiene el idArticulo
                    var product_quantity		= $('#quanti').val(); //input tipo numerico

                    $.ajax( {
                        type: "POST",
                        url: 'php/stock.php',
                        data:{
                            product_id:	      product_id,   
                            product_quantity: product_quantity
                        },
                        success: function(data) {
                            $('#Info').fadeIn(1000).html(data);
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript" src="js/cart_2.js"></script>
    </body>
</html>