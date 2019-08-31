 <?php function asideSitio() {  ?>
 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="http://localhost/Montecarlo05/index_ok.php"  ><!-- onclick="redireccion(); return false;"-->
                          <i class="icon_ouse_alt"></i>
                          <span>Inicio</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a   class="" href="http://localhost/Montecarlo05/aplicacion/orden_ServicioLista.php">
                          <i class="icon_document_alt"></i>
                          <span>Generar orden</span> 
                      </a> 
                  </li>    
                   <li class="sub-menu">
                      <a   class="" href="http://localhost/Montecarlo05/aplicacion/historial_Servicio.php">
                          <i class="icon_document_alt"></i>
                          <span>Historial de servicio</span> 
                      </a> 
                  </li>    
               
                  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Historial de pagos</span>
                      </a>
                  </li>
                     <li>                     
                      <a class="" href="http://localhost/Montecarlo05/aplicacion/empleados_lista.php">
                          <i class="icon_profile"></i>
                          <span>Empleado</span>
                          </a>   

                                     
                  </li>
                      
              </ul>
              <!-- fin del menu sidebar -->
          </div>
      </aside>
      <!--......................... din del sidebar ........................................-->
      

 <!--
<script>
function redireccionar(){window.location="../principal.php";} 

</script>-->
 

<?php } ?>

 


<?php function headerSocio(){ ?>
    <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Menú de Navegación" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--comienzo del logo-->
            <a href="index.html" class="logo">Monte'carlo <span class="lite">Automotriz</span></a>
            <!--fin del logo-->
 

            <div class="top-nav notification-row">                
                <!-- inicia notificacion dropdown -->
                <ul class="nav pull-right top-menu">
                                      
                    <!-- alerta de notifiacion y-->
                    <!-- inicio del usuario -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="http://localhost/Montecarlo05/styles/img/avatar1_small.png">
                            </span>
                            <!--nombre del socio -->
                            <span class="username"><?php echo  $_SESSION['taller'];?> / <?php echo $_SESSION['nameuser'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="http://localhost/Montecarlo05/aplicacion/cuenta_Socio.php"><i class="icon_profile"></i> Mi cuenta</a>
                            </li>  
                            <li>
                                <a href="http://localhost/Montecarlo05/funciones/logout.php?logout"><i class="icon_key_alt"></i>Cerrar sesion</a>
                            </li>
                           
                           
                        </ul>
                    </li>
                    <!-- fin del usuario que ha iniciado sesion-->
                </ul>
                <!-- fin de notificacion dropdown -->
            </div>
      </header>      
      <!--fin del header-->  
      
      <?php } ?>
    

 

<?php function footerSitio() {	?>
        <footer>
			<div id="f">
			<div class="container">
				<div class="footer-logo">
					<h3><a href="#"><span>Monte'Carlo Automotriz</span> &copy;</a></h3>
					<br><br>
				</div>
				
				<div class="row">
					<div class="col-lg-4">
						<h4>Envíanos un mensaje a:</h4>
						<p>montecarlo.refacciones@gmail.com</p>
						<i class="glyphicon glyphicon-envelope"></i>
						<br>
					</div>
					<div class="col-lg-4">
						<h4>Contáctanos:</h4>
						<p><i class="fa fa-phone"></i> 757 477 30 51</p>
						<p><i class="fa fa-phone"></i> 757 116 42 64</p>
						<p><i class="fa fa-phone"></i> 757 476 70 14</p>
						
						<br>
					</div>
					<div class="col-lg-4">
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
						<p>© 2017 Monte' Carlo Automotriz. Todos los derechos reservados</p>
					</div> <!-- fon de copyright -->
			</div> <!-- fin de class container -->
		</div> <!-- fin de f -->
		</footer>
		
		<!-- ==============================================================================================-->
	
	<div id="create_by">
		<div class="container">
			<p>Created by <a href="http://www.facebook.com" target="_blank">C. Erubiel Cisneros Robles</a> </p>
		</div>
	</div> <!-- termina create_by -->
            
            
            
            <?php   } ?>
     
          
         
        
       
      
     
    
   
 

