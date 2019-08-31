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
        <title>Configuración</title>

        <link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilos.css"   type="text/css">
        <link rel="stylesheet" href="css/menu_cliente.min.css" type="text/css">
        <link rel="stylesheet" href="css/estilosTablas.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css">
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css"/>
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css" media="all">
    </head>
    <body>
        <!----incluye la conexion, funciones sql---------------------------------------------------------------------------------------------------------------------->
        <?php
        if(isset($_SESSION['user_id'])) {
            $page='perfil_cliente'; 
            include 'php/lib-sitio_ok.php';
            include 'connections/conexion.php';
            include 'funciones/update_cliente.php';
        } else {
            $page='inicio'; include 'php/lib-sitio.php';
        }
        ?>
        <div class="espacio"></div>
        <style>.negrita{font-weight: bold; font-size: 13px; /*text-align: center;*/} </style>

        <div class="container tiraPrincipal">
            <section class="content">
                <div class="row">
                    <?php 
                    $page2='edt_perfil';
                    include 'php/lib-menu_cliente.php';
                    ?>
                    <div class="col-md-9">
                        <div class="box box-warning">
                            <div class="box-header with-border">

                                <!-- ============================ EDITAR DATOS DEL CLIENTE ================================ -->
                                <div class="col-md-12">
                                    <div class="lecturaTablaDatosCliente table-responsive"></div>
                                    <!-- -->
                                    <!-- %/formulario modal para editar datos del cliente %/  -->
                                    <div class="modal fade" id="editDatosCliente" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </button>
                                                    <h4 class="modal-title custom_align" id="Heading">Datos a editar</h4>
                                                </div>
                                                <?php
                                                //selecting data associated with this particular id
                                                $result = $ConexionBD->query("SELECT * FROM cliente WHERE idCliente = '$idCliente' ");

                                                while($res = mysqli_fetch_array($result)) {
                                                    $denominacion = $res['denominacion'];
                                                    $nombre = $res['nombre'];
                                                    $ap = $res['apellidoPaterno'];
                                                    $am = $res['apellidoMaterno'];
                                                    $rfc = $res['rfc'];
                                                }
                                                ?>
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="FormularioDatosCliente">
                                                    <fieldset>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="denominacion" value="<?php echo $denominacion;?>"
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                                                <input type="hidden"  name="idClienteFormDatos" value="<?php echo $idCliente ?>"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="nombre" value="<?php echo $nombre;?>" 
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="apellidopaterno" value="<?php echo $ap;?>" 
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="apellidomaterno" value="<?php echo $am;?>" 
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="rfc" value="<?php echo $rfc;?>" 
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <!-- /.modal-content --> 
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div> <!--end class col-md-12 -->

                                <!-- ========================== EDITAR EL CORREO DEL CLIENTE =================================== -->
                                <div class="col-md-12">
                                    <div class="lecturaTablaCorreo table-responsive"></div>
                                    <!-- -->
                                    <!-- %/formulario modal para editar el correo del cliete %/ -->
                                    <div class="modal fade" id="editCorreo" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                    <h4 class="modal-title custom_align" id="Heading">Edita tu correo electrónico</h4>
                                                </div>
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="FormularioCorreo">
                                                    <fieldset>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="correoElectronico" />
                                                                <input type="hidden"  name="idClienteFormCorreo" 
                                                                       value="<?php echo $idCliente; ?>" />
                                                                <input type="hidden" name="numeroFilaCorreo"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <!-- /.modal-content --> 
                                        </div>
                                        <!-- /.modal-dialog --> 
                                    </div>
                                </div> <!--termina class-col-md-12 -->

                                <!-- ===========================EDITAR DIRECCION DEL CLIENTE================================= -->
                                <div class="col-md-12">
                                    <div class="lecturaTablaDireccion table-responsive"></div>
                                    <!-- -->
                                    <!-- %/ formulaio modal para actualizar la direccion del cliente %/ -->
                                    <div class="modal fade" id="editDireccion" tabindex="-1" role="dialog" aria-labelledby="editDireccion" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                    <h4 class="modal-title custom_align" id="Heading">Edita tu dirección</h4>
                                                </div>
                                                <?php
                                                //selecting data associated with this particular id
                                                $result = $ConexionBD->query("SELECT * FROM cliente_direccion WHERE idCliente = '$idCliente' ");
                                                while($resDir = mysqli_fetch_array($result)) {

                                                    $calle           = $resDir['calle'];
                                                    $numeroInterior  = $resDir['numeroInterior'];
                                                    $numeroExterior  = $resDir['numeroExterior'];
                                                    $colonia         = $resDir['colonia'];
                                                    $delegacion      = $resDir['delegacion'];
                                                    $estado          = $resDir['estado'];
                                                    $codigoPostal    = $resDir['codigoPostal'];
                                                }
                                                ?>
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id="FormularioDireccion">

                                                    <fieldset>
                                                        <div class="modal-body ">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <input type="text" name="estado" value="<?php echo $estado;?>" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control"/>
                                                                <!-- -->
                                                                <input type="hidden"  name="idClienteFormDireccion" 
                                                                       value="<?php echo $idCliente; ?>" />
                                                                <input type="hidden" name="numeroFilaDireccion"/>
                                                                <!-- -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Delegación</label>
                                                                <input type="text" name="delegacion" value="<?php echo $delegacion;?>" onkeyup="javascript:this.value=this.value.toUpperCase();"  class="form-control"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Colonia</label>
                                                                <input type="text" name="colonia" value="<?php echo $colonia;?>" 
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                                       class="form-control"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Calle</label>
                                                                <input type="text" name="calle" value="<?php echo $calle;?>" 
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Número Interior</label>
                                                                <input type="text" name="numeroInterior" value="<?php echo $numeroInterior;?>" maxlength="5" class="form-control"
                                                                       placeholder="Si no tiene número interior dejarlo como: SN"
                                                                       onkeyup="javascript:this.value=this.value.toUpperCase();"/>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Número Exterior</label>
                                                                <input type="text" name="numeroExterior" value="<?php echo $numeroExterior;?>" onKeyPress="return soloNumeros(event)" maxlength="5" class="form-control"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Código Postal</label>
                                                                <input type="text" name="codigoPostal" value="<?php echo $codigoPostal; ?>"  onKeyPress="return soloNumeros(event)" maxlength="5" class="form-control"/>
                                                            </div> <!--termina la seleccion de PAIS -->
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <!-- /.modal-content --> 
                                        </div>
                                        <!-- /.modal-dialog --> 
                                    </div>									
                                </div> <!--termina class-col-md-12 -->

                                <!-- ======================= EDITAR TELEFONO DEL CLIENTE ==================================== -->
                                <div class="col-md-12">
                                    <div class="lecturaTablaTelefono table-responsive"></div>
                                    <!-- -->
                                    <!-- %/modal para actualizar el teléfono del cliente %/ -->
                                    <div class="modal fade" id="editTelefono" tabindex="-1" role="dialog" aria-labelledby="editTelefono" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                    <h4 class="modal-title custom_align" id="Heading">Edita tu telefono</h4>
                                                </div>
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" id="FormularioTelefono">
                                                    <fieldset>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="update_telefono" />
                                                                <input type="hidden"  name="client_telefono" 
                                                                       value="<?php echo $idCliente; ?>" />
                                                                <input type="hidden" id="numeroFila" name="numeroFila" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <!-- /.modal-content --> 
                                        </div>
                                        <!-- /.modal-dialog --> 
                                    </div>
                                    <!-- ----------------- modal para agregar nuevo campo teléfono --------------------- -->
                                    <div class="modal fade" id="add_new_telefono_modal" tabindex="-1" role="dialog" aria-labelledby="add_new_telefono_modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                    <h4 class="modal-title custom_align" id="Heading">Agrega tu teléfno</h4>
                                                </div>
                                                <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" id="agregaOtroTelefono">
                                                    <fieldset>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control " type="text" name="new_telefono"/>
                                                                <input type="hidden"  name="clave_cliente" value="<?php echo $idCliente; ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer ">
                                                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Agregar</button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <!-- /.modal-content --> 
                                        </div>
                                        <!-- /.modal-dialog --> 
                                    </div>
                                    <div class="espacio"></div>
                                </div> <!--termina class-col-md-12 -->

                                <!-- ================================ CAMBIAR NOMBRE DE USUARIO   ========================= -->
                                <div class="col-md-12">
                                    <div class="col-md-6" id="editNombreUsuario">
                                        <h4>Cambiar nombre de usuario</h4>
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data"
                                              id="FormularioNombreUsuario">
                                            <fieldset>
                                                <h5>Introduce tu nuevo nombre de usuario:</h5>
                                                <input type="text" class="form-control" name="new_name_user" id="new_name_user">
                                                <span id="Infonew_name_user"></span>
                                                <input type="hidden" id="idCliente1" name="idCliente1" value="<?php echo $idCliente; ?>" >
                                                <h5>Contraseña:</h5>
                                                <input type="password" class="form-control" name="ps_1" id="ps_1">
                                                <span id="Infops_1"></span>
                                                <h5>Confirma contraseña: </h5>
                                                <input type="password" class="form-control" name="cps_1" >
                                                <br>
                                                <button type="submit" class="form-control btn btn-success" id="btnUser">Actualizar</button>
                                            </fieldset>
                                        </form>
                                        <span id="mensaje1"></span>
                                    </div> <!-- end col-md-6 -->

                                    <!-- ================================ CAMBIAR CONTRASEÑA   ========================= -->
                                    <div class="col-md-6" id="editPasswordUsuario">
                                        <h4>Cambiar contraseña</h4>	
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"
                                              id="FormularioContraseniaUsuario">
                                              
                                            <fieldset>
                                                <input type="hidden" id="idCliente2" name="idCliente2" value="<?php echo $idCliente; ?>" />
                                                <h5>Introduce tu contraseña actual</h5>
                                                <input type="password" class="form-control" name="ps_2" id="ps_2">
                                                <span id="Infops_2"></span>
                                                <h5>Ahora introduce tu nueva contraseña:</h5>
                                                <input type="password" class="form-control" name="new_password" >
                                                <h5>Confirma tu nueva contraseña</h5>
                                                <input type="password" class="form-control" name="c_new_password" >
                                                <br>
                                                <button type="submit" class="form-control btn btn-success" id="btnPwd">Actualizar</button>
                                            </fieldset>
                                        </form>
                                        <span id="mensaje2"></span>
                                    </div> <!-- end col-md-6 -->
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end box-header with-border -->
                            <!-- /.box-header -->
                        </div>
                        <!-- /. box -->
                    </div><!--end class="col-md-9"-->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section> <!--end class="content"-->
        </div> <!--end tiraPrincipal-->
        <!-- =========================================================================================================== -->
        <?php footerSitio(); //pie de pagina?>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
        <script src="js/menu_cliente.min.js"></script>
        <!-- ---------------------- HACER SUBMIT PARA ACTUALIZACIÓN DE DATOS---------------------------------------- -->
        <script type="text/javascript" src="js/ajax/ajax_Telefono.js"></script>
        <script type="text/javascript" src="js/ajax/ajax_Direccion.js"></script>
        <script type="text/javascript" src="js/ajax/ajax_Correo.js"></script>
        <script type="text/javascript" src="js/ajax/ajax_DatosCliente.js"></script>
        <script type="text/javascript" src="js/ajax/ajax_NombreUsuario.js"></script>
        <script type="text/javascript" src="js/ajax/ajax_ContraseniaUsuario.js"></script>
        <!-- -->
        <script type="text/javascript" src="js/jarallax.js"></script>
        <script type="text/javascript">
            /* init Jarallax */
            $('.jarallax').jarallax({
                speed: 0.5,
                imgWidth: 1366,
                imgHeight: 768
            })
        </script>
    </body>
</html> 

