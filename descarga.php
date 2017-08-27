<?php
include 'modulo.php';
	$ruta = $_GET["ruta"];
	$nombre = $_GET["nombre"];
	header("Content-Type: application/force-download");
	header('Content-disposition: attachment; filename="'.$nombre.'"');
    readfile($ruta);
?>
		  
		  