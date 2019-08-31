<?php

/* Creado: Eduardo Cruz Romero
 	Creacion: 11 Marzo de 2017
 	Ultima modificacion: 08 Abril de 2017
 */

function generarIDCARRITO ( ) {
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
	$id = 'T'.''.$idCmt.''.$id;
	return $id;
}

function generarIDCOOKIE ( ) {
	
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
	$id = 'K'.''.$idCmt.''.$id;
	return $id;
}

function generarIDCLIENTE ( ) {
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
	$id = 'C'.''.$idCmt.''.$id;
	return $id;
}

function generarIDVENTA ( ) {
	/* INICIALES
 		V - Venta
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
	$id = 'V'.''.$idCmt.''.$id;
	return $id;
}

function generarIDCATEGORIA ( ) {
	/* INICIALES
 		V - Venta
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
	$id = 'H'.''.$idCmt.''.$id;
	return $id;
}

function generarIDDEPARTAMENTO ( ) {
	/* INICIALES
 		V - Venta
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
	$id = 'D'.''.$idCmt.''.$id;
	return $id;
}

function generarIDPROVEEDOR ( ) {
	/* INICIALES
 		V - Venta
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
	$id = 'R'.''.$idCmt.''.$id;
	return $id;
}

function generarIDARTICULO ( ) {
	/* INICIALES
 		V - Venta
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
	$id = 'Z'.''.$idCmt.''.$id;
	return $id;
}

function ramIMAGEN ( ) {
	/* INICIALES
 		V - Venta
 	*/ 
	$fh = date('Ymd').date('His');
	$nram1 = mt_rand(1,99999);
	$nram2 = mt_rand(0,99999);
	$idCmt = '';
	$id = $nram1.'_'.$fh.'_'.$nram2.'.png';
	if  ( ( $idC = strlen( $id ) ) < 20) {
		for ($count = 1; $count < ( 20 - $idC ); $count++ ) {
			$idCmt = $idCmt.'0'; 
		}
	}
	$id = 'IMG'.''.$idCmt.''.$id;
	return $id;
}
function generarIDSESSION() {
	/* INICIALES
 		V - Venta
 	*/ 
	$fh = date('Ymd').date('His');
	$nram1 = mt_rand(1,99999);
	$nram2 = mt_rand(0,99999);
	$idCmt = '';
	$id = $nram1.$fh.$nram2;
	if  ( ( $idC = strlen( $id ) ) < 20) {
		for ($count = 1; $count < ( 20 - $idC ); $count++ ) {
			$idCmt = $idCmt.'0'; 
		}
	}
	$id = 'SESS'.''.$idCmt.''.$id;
	return sha1($id);
}

function codigoVenta() {
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
	$id = 'COV'.''.$idCmt.''.$id;
	return $id;
}

//generar el numero de cuenta para ir a depositar
function generaNumeroCuenta() {
	$nram1 = mt_rand(1,99999); 
	$nram2 = mt_rand(0,99999);
	$idCmt = '';
	$id = $nram1.$nram2;
	if  ( ( $idC = strlen( $id ) ) < 12) {
		for ($count = 1; $count < ( 12 - $idC ); $count++ ) {
			$idCmt = $idCmt.'0'; 
		}
	}
	$id = $idCmt.''.$idCmt.''.$id;
	return $id;
}

//generar numeros aleatorios para el password
function generarPassword() {
	//de la tabla dat_cliente
	//pass  varchar(60)
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$longitudCadena = strlen($cadena);
	
	$pass = "";
	$longitudNewPass = 11;
	
	//creamos la contraseña
	for($i=1; $i<$longitudNewPass; $i++) {
		//definimos numeros aleatorio entre 0 y la longitud de  la cadena
		$pos = rand(0, $longitudCadena-1);
		
		//vamos formando la contraseña en cada iteración del bucle
		//añadiendo a la cadena $pass la letra correspondiente a la posicion 
		//$pos en la cadena de caracteres definida. Entonces:
		$pass .= substr($cadena, $pos, 1);
	} //fin de for
	return $pass;
}

//generar IDOPERADOR
function generarIDOPERADOR ( ) {
	// 		J - Operador
	
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
	$id = 'J'.''.$idCmt.''.$id;
	return $id;
}

?>