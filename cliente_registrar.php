<?php
session_start();
if(isset($_SESSION['user_id'])) {
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"   type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilos.css"   type="text/css">
        <link rel="stylesheet" href="css/styleWizard.css" type="text/css">
        <link rel="stylesheet" href="css/stylefooter.css"   type="text/css"/>
        <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
        <link rel="stylesheet" href="css/sass-compiled.css" type="text/css"/>
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css"/>
        <!-- -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <?php $page='registrarCL'; include 'php/lib-sitio.php'; ?>
        <div class="espacio"></div>
        <div class="top-content">
            <div class="container">
                <!-- inicia el form -->
                <div class="row" id="validar">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                        <!-- obtener datos -->
                        <form role="form" class="f1 form-horizontal" enctype="multipart/form-data" id="submitFormUsuario" method="POST" name="formularioCliente">
                            <h3>Regístrate</h3>
                            <p>Obtén nuestros mejores servicios</p>
                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i class="fa fa-male"></i></div>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                    <p>Dirección</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-file-text-o"></i></div>
                                    <p>Contacto</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                    <p>Contraseña</p>
                                </div>
                            </div> <!-- end class f1-steps -->

                            <fieldset>
                                <div class="form-group">
                                    <label class="" for="f1-first-denominacion">¿Tienes Negocio?</label>
                                    <input type="radio" name="Conocido" id="Conocido_1" onclick="mostrarReferencia();" 
                                           checked="checked" /> No
                                    <input type="radio" name="Conocido" id="Conocido_0" onclick="mostrarReferencia();"
                                           /> Si
                                    <div id="radioDENOM" style="display:none;">
                                        <input type="text" name="denominacion" id="denomin"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="NOMBRE DE TU NEGOCIO" maxlength="30" placeholder="ESCRIBE EL NOMBRE DE TU NEGOCIO" class="form-control"/>
                                    </div>
                                </div> <!-- termina DENOMINACION -->
                                <div class="form-group">
                                    <label class="sr-only" for="f1-first-name">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)" 
                                           onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Apellido Paterno</label>
                                    <input type="text" name="apellidopaterno" id="apat" placeholder="Apellido Paterno"  onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name2">Apellido Materno</label>
                                    <input type="text" name="apellidomaterno" id="amat" placeholder="Apellido Materno" 
                                           onkeyup="javascript:this.value=this.value.toUpperCase();"/ class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="" for="f1-first-rfc">¿Tienes RFC?</label>
                                    <input type="radio" name="Conocido2" id="Conocido_3" onclick="mostrarReferencia2();" 
                                           checked="checked" > No
                                    <input type="radio" name="Conocido2"  id="Conocido_4" onclick="mostrarReferencia2();"
                                           /> Si
                                    <div id="radioRFC" style="display:none;">
                                        <input type="text" name="rfc" id="rfc"   onkeyup="javascript:this.value=this.value.toUpperCase();" value="RFCN0ASIGNAD0" 
                                               maxlength="18"  class="form-control"/>
                                    </div>
                                </div> <!-- termina RFC -->
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next" id="btnUno">Siguiente</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-codigopostal">Código Postal</label>
                                    <input type="text" name="codigoPostal" id="cp" onKeyPress="return soloNumeros(event)" maxlength="5" placeholder="Escribe tu código postal de cinco dígitos"
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-estado">Estado</label>
                                    <select name="estado" class="form-control" id="jmr_contacto_estado" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-delegacion">Delegación</label>
                                    <select name="delegacion" class="form-control" id="jmr_contacto_municipio" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-colonia">Colonia</label>
                                    <input type="text" name="colonia" id="colonia"  onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="30"  
                                           placeholder="Nombre de la colonia" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-calle">Calle</label>
                                    <input type="text" name="calle" id="calle"  onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="30" placeholder="Nombre de la calle" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-numexterior">Número Exterior</label>
                                    <input type="text" name="numeroexterior" id="numeroexterior" onKeyPress="return soloNumeros(event)" maxlength="5" placeholder="Número Exterior" 
                                           class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-numinterior">Número Interior</label>
                                    <input type="text" name="numerointerior" id="numerointerior" maxlength="5" placeholder="Número Interior: si no tiene dejarlo como: SN" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                           class="form-control"/>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Regresar</button>
                                    <button type="button" class="btn btn-next" id="btnDos">Siguiente</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-telefono">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" maxlength="15" placeholder="Número de teléfono / celular" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">e-mail</label>
                                    <input type="text" name="correoElectronico" id="correoElectronico" maxlength="40" placeholder="Correo electrónico" class="form-control"/>
                                    <span id="Info"></span>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Regresar</button>
                                    <button type="button" class="btn btn-next" id="btnTres">Siguiente</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-nombreusuario">Nombre de usuario</label>
                                    <input type="text" name="nomusuario" id="nomusuario" placeholder="Nombre de usuario" 
                                           class="form-control" maxlength="20"/>
                                    <span id="Infor"></span>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Contraseña</label>
                                    <input type="password" name="password" id="pswd" placeholder="Contraseña" 
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                    <input type="password" name="cpassword" id="cpswd" placeholder="Repite la contraseña" 
                                           class="form-control">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Regresar</button>
                                    <button type="submit"  name="submit" id="submit" class="btn btn-submit">Registrarse</button>
                                </div>
                            </fieldset>
                            <!-- end fieldsets -->
                        </form>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- top-ccontent -->
        
        <?php footerSitio(); ?>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrapValidator.min.js" ></script>
        <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
        <script type="text/javascript" src="js/scriptsWizard.js"></script>
        <script type="text/javascript" src="js/validarFormularioRegistroCliente.js" ></script>
        <script type="text/javascript" src="js/submitCliente.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
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