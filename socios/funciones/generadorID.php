<?php
 
 /* Creado: Eduardo Cruz Romero
 	Creacion: 11 Marzo de 2017
 	Ultima modificacion: 08 Abril de 2017
 */
 
 function generarSSesion ( ) {
 	/* INICIALES
 		A - Administrador 
 		C - Clientes
 		S - Socios
 		T - Carrito de Compra
 		V - Venta
 		Z - Articulos
 		X - Armadora
 		H - Categoria
 		M - Chofer
 		Y - Cilindro
 		D - Departamento
 		E - Empresa
 		L - Litro
 		G - Modelo
 		N - Nota Servicio
 		J - Operador
 		R - Proveedor
 	*/ 

 	$fh = date("dis");
 	$nram1 = mt_rand(1,99999); 
 	$nram2 = mt_rand(0,99999);
 	$idCmt = '';
 	$id = $nram1.$fh.$nram2;
  	if  ( ( $idC = strlen( $id ) ) < 19) {
  		for ($count = 1; $count < ( 19 - $idC ); $count++ ) {
  				$idCmt = $idCmt.'0'; 
  		}
   	}
  	$id = 'SS'.''.$idCmt.''.$id;
 	return $id;
 }



 function generarIDSocio ( ) {
 	/* INICIALES
 		A - Administrador 
 		C - Clientes
 		S - Socios
 		T - Carrito de Compra
 		V - Venta
 		Z - Articulos
 		X - Armadora
 		H - Categoria
 		M - Chofer
 		Y - Cilindro
 		D - Departamento
 		E - Empresa
 		L - Litro
 		G - Modelo
 		N - Nota Servicio
 		J - Operador
 		R - Proveedor
 	*/ 

 	$fh = date("dis");
 	$nram1 = mt_rand(1,99999); 
 	$nram2 = mt_rand(0,99999);
 	$idCmt = '';
 	$id = $nram1.$fh.$nram2;
  	if  ( ( $idC = strlen( $id ) ) < 20) {
  		for ($count = 1; $count < ( 20 - $idC ); $count++ ) {
  				$idCmt = $idCmt.'0'; 
  		}
   	}
  	$id = 'S'.''.$idCmt.''.$id;
 	return $id;
 }

 function generarIDNotaServicio ( ) {
 	/* INICIALES
 		A - Administrador 
 		C - Clientes
 		S - Socios
 		T - Carrito de Compra
 		V - Venta
 		Z - Articulos
 		X - Armadora
 		H - Categoria
 		M - Chofer
 		Y - Cilindro
 		D - Departamento
 		E - Empresa
 		L - Litro
 		G - Modelo
 		N - Nota Servicio
 		J - Operador
 		R - Proveedor
 	*/ 

 	$fh = date("dis");
 	$nram1 = mt_rand(1,99999); 
 	$nram2 = mt_rand(0,99999);
 	$idCmt = '';
 	$id = $nram1.$fh.$nram2;
  	if  ( ( $idC = strlen( $id ) ) < 20) {
  		for ($count = 1; $count < ( 20 - $idC ); $count++ ) {
  				$idCmt = $idCmt.'0'; 
  		}
   	}
  	$id = 'N'.''.$idCmt.''.$id;
 	return $id;
 }
 
 
 

?>