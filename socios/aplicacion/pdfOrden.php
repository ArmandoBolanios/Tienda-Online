<?php 
session_start(); 
$sesionSocio = $_SESSION['userSession']; 
require_once '../connections/conexion.php';
require_once '../styles/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
if(isset($_GET['pdf'])){ 
    $idNota=$_GET['pdf'];
	$result=$conexionBD->query("SELECT * FROM nota_servicio, nota_servicio_unidad WHERE nota_servicio.idNotaServicio='$idNota'");
	$row = $result->fetch_array();
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>   
 <link rel='stylesheet' href='../styles/css/bootstra.min.css'>         
 <link rel='stylesheet' href='../styles/css/filecss/visualizar.css'>    
 </head>
 <body>
  <header>
   <?php 
        $cho = $row['idChofer'];
        $rChofer=$conexionBD->query("SELECT * FROM chofer, chofer_telefono, chofer_correo WHERE chofer.idChofer='$cho'");
        $chof = $rChofer->fetch_array();  
            ?>  
        <h1>Orden de servicio</h1>    
        <div class="well well-sm"> 
           <address>
           <?php  
                 $rSocio=$conexionBD->query("SELECT * FROM socio, socio_direccion,socio_telefono,socio_correo WHERE socio.idSocio='$sesionSocio'");
                    $socio = $rSocio->fetch_array();  
                     ?>
            <h4>Taller</h4> 
           <p><?php echo $socio['denominacion'] ?>.</p>           
           <p><?php echo $socio['nombreSocio'].' '.$socio['apellidoPaternoSocio'] ?>.</p>                       <p><?php echo $socio['correoElectronico'] ?> </p>
           <p><?php echo $socio['telefono'] ?> </p>
           <p><?php echo $socio['estado'].', '.$socio['delegacion'].', '.$socio['calle']  ?> </p>            
          </address>     
           <address> 
            <h4>Cliente</h4> 
           <p><?php echo $chof['nombreChofer'].' '.$chof['apellidoPaternoChofer'] ?>.</p>
           <p><?php echo $chof['correoElectronico'] ?> </p>
           <p><?php echo $chof['telefono'] ?> </p>
        </address>
           <address>      
           <?php 
                   $emp = $row['idEmpresa'];
                    $rEmpresa=$conexionBD->query("SELECT * FROM empresa, empresa_direccion WHERE empresa.idEmpresa='$emp'");
                    $empre = $rEmpresa->fetch_array();  
                     ?>
            <h4>Empresa</h4> 
           <p><?php echo $empre['denominacion'] ?>.</p>
           <p><?php echo $empre['estado'].', '.$empre['delegacion'].', '.$empre['calle']  ?> </p>
              
        </address>
        </div>
        <span class="sp"><img alt="" src="../styles/img/logom.png" /></span>
      </header>
    <article> 
       <table class="meta">
          <tr>
            <th>Folio #</th>
            <td><?php echo $idNota ?></td>
          </tr>
          <tr>
            <th>Fecha Inicial</th>
            <td><?php echo $row['fechaRegistro']; ?> </td>
          </tr>
            <tr>
            <th> Fecha Final</th>
            <td> <?php echo $row['fechaFinal']; ?></td>
          </tr>
          <tr>
             <?php  $s=$conexionBD->query("SELECT sum(subtotal) as suma FROM concepto WHERE idNotaServicio='$idNota' "); $r=$s->fetch_array(); ?> 
            <th> Total</th>
            <td> $<?php	echo $r['suma']; ?> </td>
          </tr>
        </table>
       <?php 
       $unidad = $row['idUnidadMovil'];
       $rUnidad=$conexionBD->query("SELECT * FROM unidad_movil WHERE idUnidadMovil='$unidad'");
	   $unidadM = $rUnidad->fetch_array();  
               ?>
         <table>
          <thead>
            <tr>
              <th>Placa</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Año</th>
              <th>Color</th>
              <th>Número de motor</th>
              <th>Número de serie</th>
              <th>KM</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $unidadM['placa']; ?></td>
              <td><?php echo $unidadM['marca']; ?></td>
              <td><?php echo $unidadM['modelo']; ?></td>
              <td><?php echo $unidadM['anio']; ?></td>
              <td><?php echo $unidadM['color']; ?></td>
              <td><?php echo $unidadM['numeroMotor']; ?></td>
              <td><?php echo $unidadM['numeroSerie']; ?></td>
              <td><?php echo $unidadM['km']; ?></td> 
            </tr>
          </tbody>
        </table>
         <br>
         <table>
          <thead>
            <tr>
              <th>Exterior del vehículo</th>
              <th>Interior del vehículo</th>
              <th>Maletera del vehículo</th> 
              </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $row['observacionesExterna'];?></td>
              <td><?php echo $row['observacionesInterna'];?></td>
              <td><?php echo $row['observacionesMaletera'];?></td> 
            </tr>
          </tbody>
        </table>
         <br>
        <table class="inventory">
          <thead>
            <tr> 
              <th>Descripcion</th>
              <th>Codigo unidad</th>
              <th>Unidad</th>
              <th>Precio</th> 
              <th>Subtotal</th> 
            </tr>
          </thead>
          <tbody>
             <?php  
       $rConcepto=$conexionBD->query("SELECT * FROM concepto WHERE idNotaServicio='$idNota'");
        while( $conceptoM = $rConcepto->fetch_array()){  
               ?>
            <tr>
              <td><?php echo $conceptoM['descripcion']; ?></td>
              <td><?php echo $conceptoM['codigoUnidad']; ?></td> 
              <td><?php echo $conceptoM['unidad']; ?></td> 
              <td>$<?php echo $conceptoM['precioUnitario']; ?></td>
              <td>$<?php echo $conceptoM['subTotal']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table> 
         <table class="balance">
          <tr>
            <th>Total</th>
              <td>$<?php echo $r['suma']; ?></td>
          </tr> 
        </table>
      </article>
    <aside>
       Notas adicionales
      <?php 
      $evidencia = $conexionBD->query("SELECT * FROM evidencia WHERE idNotaServicio='$idNota' ");
		 while( $evide = $evidencia->fetch_array() ){
        ?> <div  align="center">
        <img src="<?php echo $evide['urlImagen']; ?>/<?php echo $evide['nombreImagen']; ?>" />
      <?php } ?>   
            <?php echo $row['firma'].'-----'.$row['certificado'];?>       
             </div>
          </aside> 
 </body>
 </html>
 <?php 
$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('letter', 'landscape'); // (Opcional) Configurar papel y orientación
$dompdf->render(); // Generar el PDF desde contenido HTML
$pdf = $dompdf->output(); // Obtener el PDF generado
$filename = 'nombre.pdf';    
$dompdf->stream($filename, array("Attachment" => 0)); // Enviar el PDF generado al navegador
}
?>

 



    
           