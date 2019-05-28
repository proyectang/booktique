<?php

	require_once('../conexionbd.php');

		//Primero debemos de insertar en la tabla de direcciones
	$direccion = "INSERT INTO usuario (usua_nombre, usua_contrasenia, usua_estatus, usua_tipo) VALUES ('$usua_nombre', '$usua_contrasenia', '$usua_estatus', '$usua_tipo')";

	$query = "INSERT INTO usuario (usua_nombre, usua_contrasenia, usua_estatus, usua_tipo) VALUES ('$usua_nombre', '$usua_contrasenia', '$usua_estatus', '$usua_tipo')";
	$result = pg_query($conn, $query) or die (pg_last_error());
	pg_close($conn);

	if($result){
		header('Location: http://www.booktique.com.mx/html/Administrador/usuarios.php');
		echo "<div class='alert alert-primary' role='alert'>
				  Se ha registrado exitosamente el usuario
				</div>";
	}else {
		
		echo "<div class='alert alert-warning' role='alert'>
				  Se ha registrado exitosamente el usuario
				</div>";
	}

?>