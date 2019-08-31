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
                <a class="navbar-brand" href="#"><img src="img/index/logo_montecarlo2.png" alt="Dispute Bills"></a>
            </div> <!-- corresponde al logo -->

            <!-- inicia el MENU -->
            <div class="collapse navbar-collapse large" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <!--<li class=""><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li> -->
                    <li class="<?php if($page=='inicio'){echo 'active';}?>"><a href="index.php">Inicio</a></li>
                    <li class="<?php if($page=='vref'){echo 'active';}?>"><a href="venta_refacciones.php"><i class=""></i>Refacciones</a></li>
                    <li class="<?php if($page=='servicios'){echo 'active';}?>"><a href="todos_servicios.php"><i class=""></i>Servicios</a></li>

                    <li class="<?php if($page=='promociones'){echo 'active';}?>"><a href="promociones.php"><i class=""></i>Promociones</a></li>

                    <li class="<?php if($page=='cart'){echo 'active';}?>" >
                        <a href="content_cart.php">Carrito 
                            <span class="badge"><?php if(isset($_SESSION["shopping_cartMT"])) { echo count($_SESSION["shopping_cartMT"]); } else { echo '0';}?></span>

                        </a>
                    </li>				

                    <li class="dropdown">
                        <?php if(isset($_SESSION['user_id'])) {?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Mi cuenta <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="divider"></li>
                            <li class="<?php if($page=='perfil_cliente'){echo 'active';}?>"><a href="cliente_perfil.php"><i class="fa fa-user"></i>  Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="cliente_logout.php.php">Cerrar sesión</a></li>
                            <?php } else { ?>
                            <li class="divider"></li>
                            <li class="<?php if($page=='inicioSC'){echo 'active';}?>"><a href="cliente_login.php">Inicia sesión</a></li>
                            <li class="<?php if($page=='registrarCL'){echo 'active';}?>"><a href="cliente_registrar.php">Regístrate</a></li>
                            <li class="<?php if($page==''){echo 'active';}?>"><a href="socios/login.php">Socios</a></li>
                            <?php } ?>
                        </ul>

                    </li> <!--termina li de la sesion -->

                </ul> <!-- termina ulnavbar -->
            </div> <!--termina el MENU -->
        </div> <!--agrega movimeinto al MENU -->
    </nav> <!--todo el MENU -->
</header>

<?php
function footerSitio() {
?>

<style>
    .textoFooter{color: #e6e6e6;}
    .textoFooter p a:hover{color:#FF9800;}
</style>

<footer>
    <div class="jarallax footer">
        <div class="container">
            <div class="footer-logo textoFooter">
                <h3><a href="nosotros.php"><span>Monte' Carlo Automotriz</span> &copy;</a></h3>
                <br><br>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 textoFooter">
                    <h4>Envíanos un mensaje</h4>
                    <p>montecarlo.refacciones@gmail.com <i class="fa fa-envelope"></i></p>
                    <br>
                    <h4>Acerca de nosotros</h4>
                    <p><a href="nosotros.php">Información de nuestra empresa</a></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 textoFooter">
                    <h4>Contáctanos</h4>
                    <p><i class="fa fa-whatsapp"></i> 757 477 30 51</p>
                    <p><i class="fa fa-phone"></i> 757 116 42 64</p>
                    <p><i class="fa fa-phone"></i> 757 476 70 14</p>

                    <br>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 textoFooter">
                    <h4>Dirección</h4>
                    <p align="">
                        Calle Arcos S/N (Entre Hidalgo y Morelos) <br>Col. San Fancisco, Tlapa de Comonfort, Guerrero
                    </p>
                    <br>
                    <p align="">
                        Hildalgo N°380 Col.Tepeyac, Tlapa de Comonfort Guerrero.
                    </p>
                </div>
                <br>

            </div> <!-- fin de class row -->
            <div class="agileinfo-social-grids">
                <h4>SÍGUENOS</h4>
                <div class="border"></div> <!-- termina border -->
                <ul>
                    <li>
                        <a href="https://www.facebook.com/Montecarlo-Automotriz-867296540033474/?fref=ts" target="_blank">
                            <br>
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>

                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>

            </div> <!-- termina social-grids -->

            <div class="copyright">
                <p>© 2018 Monte' Carlo Automotriz. Todos los derechos reservados.</p>
            </div> <!-- fon de copyright -->
        </div> <!-- fin de class container -->
    </div> <!-- fin de f -->
</footer>

<!-- ==============================================================================================-->
<!-- 
<div class="jarallax footer">
<div class="container">
<div class="copyright">
<p>© 2017 Net Banking. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
</div>
</div>
-->
<div id="create_by">
    <div class="container">
        <p>Desarrollado por: <a href="https://www.facebook.com/BDHermann" target="_blank">Armando Bolaños Dircio</a> | <a href="http://www.blacktie.co" target="_blank">Isabel Armenta Martínez</a></p>
    </div>
</div> <!-- termina create_by -->
<?php
} //temrina footerSitio
?>

<?php 
function contenidoSitio() {
}
?>


<?php
function footerSitioNormal() {
?>

<style>
    .textoFooter{color: #e6e6e6;}
    .textoFooter p a:hover{color:#FF9800;}
</style>

<footer>
    <div id="f">
        <div class="container">
            <div class="footer-logo textoFooter">
                <h3><a href="nosotros.php"><span>Monte'Carlo Automotriz</span> &copy;</a></h3>
                <br><br>
            </div>

            <div class="row">
                <div class="col-lg-4 textoFooter">
                    <h4>Envíanos un mensaje a:</h4>
                    <p>montecarlo.refacciones@gmail.com <i class="fa fa-envelope"></i></p>
                    <br>
                    <h4>Acerca de nosotros</h4>
                    <p><a href="nosotros.php">Información de nuestra empresa</a></p>
                </div>
                <div class="col-lg-4 textoFooter">
                    <h4>Contáctanos:</h4>
                    <p><i class="fa fa-whatsapp"></i> 757 477 30 51</p>
                    <p><i class="fa fa-phone"></i> 757 116 42 64</p>
                    <p><i class="fa fa-phone"></i> 757 476 70 14</p>

                    <br>
                </div>
                <div class="col-lg-4 textoFooter">
                    <h4>Dirección</h4>
                    <p align="justify">
                        Calle Arcos S/N (Entre Hidalgo y Morelos) Col. San Fancisco, Tlapa de Comonfort, Guerrero
                    </p>
                    <br>
                    <p align="justify">
                        Hildalgo N°380 Col.Tepeyac, Tlapa de Comonfort Guerrero.
                    </p>
                </div>
                <br>

            </div> <!-- fin de class row -->
            <div class="agileinfo-social-grids">
                <h4>SÍGUENOS</h4>
                <div class="border"></div> <!-- termina border -->
                <ul>
                    <li>
                        <a href="https://www.facebook.com/Montecarlo-Automotriz-867296540033474/?fref=ts" target="_blank">
                            <br>
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>

                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>

            </div> <!-- termina social-grids -->

            <div class="copyright">
                <p>© 2018 Monte' Carlo Automotriz. Todos los derechos reservados</p>
            </div> <!-- fon de copyright -->
        </div> <!-- fin de class container -->
    </div> <!-- fin de f -->
</footer>

<!-- ==============================================================================================-->
<div id="create_by">
    <div class="container">
        <p>Created by <a href="https://www.facebook.com/BDHermann" target="_blank">Armando Bolaños Dircio</a> | <a href="http://www.blacktie.co" target="_blank">Isabel Armenta Martinez</a></p>
    </div>
</div> <!-- termina create_by -->
<?php
} //temrina footerSitio
?>
