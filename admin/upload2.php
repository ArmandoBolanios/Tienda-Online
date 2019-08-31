<?php

include "agregar_articulos.php";
include "class.upload.php";

/// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$error = false;

$files = array();
foreach ($_FILES['image'] as $k => $l) {
 foreach ($l as $i => $v) {
 if (!array_key_exists($i, $files))
   $files[$i] = array();
   $files[$i][$k] = $v;
 }
}

foreach ($files as $file) {
  $handle = new Upload($file);
  if ($handle->uploaded) {
    $handle->Process("imgarticulos/");
    if ($handle->processed) {
    	// usamos la funcion insert_img de la libreria db2.php
    	insert_img("imgarticulos/",$handle->file_dst_name);
    } else {
	  $error = true;
      echo 'Error: ' . $handle->error;
    }
  } else {
   	$error = true;
    echo 'Error: ' . $handle->error;
  }
  unset($handle);
}

if(!$error){
	print "<h4>Exito!</h4>";
	print "<a href='agregar_articulos.php' >Agregar más</a>";
}

?>