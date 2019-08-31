<?php
session_start();
require_once '../connections/conexion.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: http://localhost/Montecarlo05/index.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: http://localhost/Montecarlo05/index_ok.php");
}

if (isset($_GET['logout'])) {
    $idSesio = $_SESSION['sesi']; 
    $fechaRegistro = date("Y-m-j H:i:s" );
    $updateSesion ="UPDATE sesionsocio SET fechaDeSalida == '".$fechaRegistro."' WHERE idSesion='".$idSesio."' ";
    $query_inser = mysqli_query($conexionBD, $updateSesion);
         
 
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location: http://localhost/Montecarlo05/index.php");
}
