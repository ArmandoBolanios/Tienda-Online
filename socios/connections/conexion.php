<?php

	 $DBhost = "localhost";
	 $DBuser = "root";
	 $DBpass = "";
	 $DBname = "proyectomontecarlo";
	 
	 $conexionBD = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($conexionBD->connect_errno) {
         die("ERROR : -> ".$conexionBD->connect_error);
     }
/*
 $DBhost = "cisneros.tics-tlapa.com:2083";
	 $DBuser = "cisneros";
	 $DBpass = "tec20";
	 $DBname = "cisneros_proyectomontecarlo";
	 
	 $conexion = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($conexion->connect_errno) {
         die("ERROR : -> ".$conexion->connect_error);
     }
 
*/

?>