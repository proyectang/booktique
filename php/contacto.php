<?php
	$destino = "gabrielamendieta@outlook.com";
	$nombre  = $_POST ["nombre"];
	$email  = $_POST ["email"];
	$mensaje = $_POST ["mensaje"];


	$correo = "Nombre:" . $nombre . "\nCorreo:" . $email . "\nMensaje:" . $mensaje; 
	mail($destino, "Contacto:", $correo);
	header("https://www.booktique.com.mx");

?>


