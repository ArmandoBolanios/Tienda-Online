<?php
//Conexion a Mysql
$Nombre_Servidor = "localhost";
$Nombre_Usuario = "root";
$password = "";
$Base_Datos = "montecar_bd";

$ConexionBD = mysqli_connect($Nombre_Servidor, $Nombre_Usuario, $password, $Base_Datos);

//verifica conexión
if(mysqli_connect_errno()) {
    echo "Error, no se pudo conectar con el servidor: " .mysqli_connect_errno();
} //fin de la condición if

?>