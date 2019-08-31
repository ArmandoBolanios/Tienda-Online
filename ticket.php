<?php
require('funciones/fpdf/fpdf.php');
require('connections/conexion.php');
require('funciones/encrypt/SED.php');
date_default_timezone_set("america/mexico_city");

class PDF extends FPDF {
    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++) {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border

            $this->Rect($x,$y,$w,$h);

            $this->MultiCell($w,5,$data[$i],0,$a,'true');
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb) {
            $c=$s[$i];
            if($c=="\n") {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax) {
                if($sep==-1) {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function Header() {
        $this->SetFont('Arial','B',20);
        //$this->SetX(70);
        $this->SetXY(80,10);
        $this->Cell(100,10,'Detalles de la compra',0,0,'C');
        $this->SetX(-20);
        $this->Image("img/index/LOGO.jpg", 230, 5, 30, 30);
        $this->Ln (20);
    }
	
	
    function Footer() {
		$hora = date("d-m-Y h:i:s");
        $this->SetY(-15);
        $this->SetFont('Arial','B',8);
        //$this->Cell(100,10,'Todos los derechos reservados 2018. Monte Carlo Automotriz.',0,0,'L');
		$this->Cell(100,10,'Fecha y Hora:  '.$hora,0,0,'L');
    }

}
$idCliente = $_GET['Client'];
$idCarrito = $_GET['Car'];
$idPedidox = $_GET['Paid'];
$emailx    = $_GET['email'];
$nombrex   = $_GET['nombre'];
$APx       = $_GET['AP'];
$AMx       = $_GET['AM'];

// -------------------------------------
$idPedido       = SED::decryption($idPedidox);
$emailCliente   = SED::decryption($emailx);
$nombreCliente  = SED::decryption($nombrex);
$apellidoP      = SED::decryption($APx);
$apellidoM      = SED::decryption($AMx);

$numCuenta  = '330651673681';

$strConsulta = "SELECT nombre, apellidoPaterno, apellidoMaterno,calle, numeroInterior, numeroExterior, colonia,
delegacion, estado, codigoPostal, telefono, cliente_telefono.aux, idCarrito
FROM cliente 
INNER JOIN cliente_direccion 
ON cliente.idCliente = cliente_direccion.idCliente and cliente_direccion.idCliente = '$idCliente' 
INNER JOIN cliente_telefono
ON  cliente_telefono.idCliente = cliente.idCliente and cliente_telefono.aux='1'
INNER JOIN contenido_carrito
ON contenido_carrito.idCliente = '$idCliente'
AND idCarrito = '$idCarrito';";

$pacientes = $ConexionBD->query($strConsulta);

$fila = $pacientes->fetch_array();
$pdf= new PDF('L','mm','Letter');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->Ln(10);

// ---------------------------------------------------------------------------------------------------------
$pdf->SetFont('Arial','', 12);
//$pdf->Cell(0,6,'Detalles de la compra', 0, 1);
$pdf->Cell(0,6,'Pedido No: '.$idPedido, 0, 1);
$pdf->Cell(0,6,'Clave de venta: '.$fila['idCarrito'], 0, 1);
$pdf->Cell(0,6,utf8_decode('Nombre de cliente: '.$fila['nombre'].' '.$fila['apellidoPaterno'].' '.$fila['apellidoMaterno']),0,1);
$pdf->Cell(0,6,utf8_decode('Domicilio: '.$fila['delegacion'].', '.$fila['estado'].', C.P. '.$fila['codigoPostal']),0,1);
$pdf->Cell(0,6,utf8_decode('Colonia: '.$fila['colonia'].', Calle: '.$fila['calle'].',  #'.$fila['numeroExterior']),0,1);
$pdf->Cell(0,6,utf8_decode('Telefono: '.$fila['telefono']),0,1);
$pdf->Cell(0,6,utf8_decode('Cuenta bancaria Banamex: '.$numCuenta),0,1);
// ---------------------------------------------------------------------------------------------------------
$pdf->Ln(10);

$pdf->SetWidths(array(65, 60, 55, 50, 20));
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(85,107,47);
$pdf->SetTextColor(255);

for($i=0;$i<1;$i++) {
    $pdf->Row(array('Articulo','Clave', 'Precio Unidad', 'Unidades', 'Subtotal'));
}

$strConsulta = "SELECT DISTINCT contenido_carrito.idArticulo, contenido_carrito.costo, contenido_carrito.unidades, contenido_carrito.subTotal, contenido_carrito.idCarrito, nombreImagen
	FROM contenido_carrito 
	Inner Join cliente ON contenido_carrito.idCliente = cliente.idCliente
    INNER JOIN imagen ON contenido_carrito.idArticulo = imagen.idArticulo
	and contenido_carrito.idCarrito = '$idCarrito'
    ";

$historial = $ConexionBD->query($strConsulta);
$numfilas = $historial->num_rows;

$pre = 0;
$ca  = 0;
for ($i=0; $i<$numfilas; $i++) {
    $fila = $historial->fetch_array();
    $pdf->SetFont('Arial','',9);

    if($i%2 == 1) {
        $pdf->SetFillColor(255, 212, 0, 0.9);
        $pdf->SetTextColor(0);
        $pdf->Row(array($fila['nombreImagen'], $fila['idArticulo'], '$ '.number_format($fila['costo'],2), $fila['unidades'], 
                        '$ '.number_format($fila['subTotal'],2)));
    }
    else {
        $pdf->SetFillColor(255, 212, 0, 0.9);
        $pdf->SetTextColor(0);
        $pdf->Row(array($fila['nombreImagen'], $fila['idArticulo'], '$ '.number_format($fila['costo'],2), $fila['unidades'], 
                        '$ '.number_format($fila['subTotal'],2)));
    }
    $pre = $pre + $fila['subTotal'];
    $ca  = $ca  + $fila['unidades'];
}
//-------
$pdf->SetFont('Arial','',10);
$pdf->Cell(246,20,'Cantidad de articulos: '. $ca,0,0,'R');
$pdf->Cell(1,30,'Total a pagar: $'. number_format($pre, 2),0,0,'R');
$pdf->Output();

//date_default_timezone_set("america/mexico_city");
$fecha = date("d-m-Y h:i:s");
$cuerpo='
			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				<img src="http://montecarloautomotriz.com/img/index/logo_mt.png" width="300px" heigth="250px">
				<h1 style="text:center;">Monte Carlo Automotriz</h1>
                <h1 style="color:#3498db;">Compra exitosa</h1>
			</center>
			<p>Hola, '.$nombreCliente.' '.$apellidoP.' '.$apellidoM.'  tu compra se realizó correctamente</p>
			<p>Te adjunto el ticket de tu compra</p>
            <br><br>
			<p>Fecha y Hora: '.$fecha.'</p>
			</div>
		';


//$pdfoutputfile = 'temp-file.pdf'; 
$pdfdoc = $pdf->Output('', 'S');

require 'funciones/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
//$mail->isSMTP();
$mail->SMTPDebug = 0; //mostrar los errores
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; // Modificar
$mail->Host = 'smtp.live.com'; // Modificar
$mail->Port = 25; // Modificar
$mail->Username = 'tucorreoelectronico@outlook.com'; // Modificar
$mail->Password = 'tucontraseña'; // Modificar

$from_name = "Monte Carlo Automotriz";
$email = $emailCliente;
$nombreUsuario = $nombreCliente;

$mail->setFrom($mail->Username,$from_name);
$mail->addAddress($email, $nombreUsuario); // DESTINATARIO

$mail->Subject = 'Ticket';
$mail->Body    = $cuerpo;
$mail->AltBody = "Hola, tu compra se realizó correctamente, te adjunto el ticket";
$mail->IsHTML(true);
$mail->addStringAttachment($pdfdoc, 'ticket_'.$fecha.'.pdf');

$exito = $mail->Send();
$intentos=1;
while((!$exito) && ($intentos < 5)) {
    sleep(5);
    $exito = $mail->Send();
    $intentos = $intentos+1;
}
if(!$exito) {
    echo "Hay problemas al enviar el correo electronico";
    echo "<br>".$mail->ErrorInfo;
} else {
    echo 'Mensaje enviado correctamente :)';
}

?>