<?php

	session_start();
	//Recibe valores:
	$usuario = $_POST['usua_nombre'];
	$contrasenia = $_POST['usua_contrasenia'];
	//Valores:
	require_once('../conexionbd.php');
	$query = "SELECT usua_nombre, usua_contrasenia FROM usuario WHERE usua_nombre = $usuario AND usua_contrasenia = $contrasenia";
	$result = pg_query($conn, $query);

	//Condicional para inicio de sesion:
	if($result){
		$_SESSION['id'] = 1;
		header('Location: menu.php');
	}
	else{
		//regresar al login.php:
		session_destroy();
		header('Location: ../html/Administrador/login.html');
	}



?>