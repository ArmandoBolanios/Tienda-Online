<?php
session_start();
include 'funciones/insert_sesiones.php';

if(isset($_SESSION['user_id'])) {
	finalizar_salida_sess();
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    header("Location: index.php");
}
else {
    header("Location: index.php");
}
?>