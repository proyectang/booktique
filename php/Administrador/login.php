<?php

	//session_unset();                                        // Borrar las variables de sesión
    //setcookie(session_name(), 0, 1 , ini_get("session.cookie_path"));    // Eliminar la cookie
    //session_destroy(); 

	session_start(); 
	//Recibe valores:
	$usuario = $_POST['usua_nombre'];
	$contrasenia = md5($_POST['usua_contrasenia']);
	$captcha = $_POST['captcha'];
	$copia = $_POST['copia'];

	//Valores:
	require_once('../conexionbd.php');
	$query = "SELECT usua_idusuario, usua_nombre, usua_contrasenia FROM usuario WHERE usua_nombre = '$usuario' AND usua_contrasenia = '$contrasenia'";
	$result = pg_query($conn, $query);
	$row = pg_fetch_row($result);
	pg_close($conn);


	



	//Condicional para inicio de sesion:
	if($result && $copia == $captcha){

		$_SESSION['sesion_iniciada'] = true;
		$_SESSION['id'] = $row[0];
		$_SESSION['usuario'] = $row[1];
		header('Location: https://www.booktique.com.mx/html/Administrador/usuarios.php');

	} else {
		//regresar al login.html:
		session_destroy();
		header('Location: https://www.booktique.com.mx/html/Administrador/login.php');
	}



?>
