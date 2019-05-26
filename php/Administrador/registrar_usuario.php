<?php

	require_once('../conexionbd.php');

	$usua_nombre = $_POST["usua_nombre"];
	$usua_contrasenia = md5($_POST["usua_contrasenia"]);
	$usua_estatus = $_POST["usua_estatus"];
	$usua_tipo = $_POST["usua_tipo"];
	

	$query = "INSERT INTO usuario (usua_nombre, usua_contrasenia, usua_estatus, usua_tipo) VALUES ('$usua_nombre', '$usua_contrasenia', '$usua_estatus', '$usua_tipo')";
	$result = pg_query($conn, $query) or die (pg_last_error());
	pg_close($conn);

	if($result){
		header('Location: http://www.booktique.com.mx/html/Administrador/usuarios.php');
	}
?>