<?php

	//session_unset();                                        // Borrar las variables de sesión
    //setcookie(session_name(), 0, 1 , ini_get("session.cookie_path"));    // Eliminar la cookie
    //session_destroy(); 

	session_start(); 
	//Recibe valores:
	$cliente = $_POST['clie_correo'];
	$contrasenia = md5($_POST['clie_contrasenia']);
	$captcha = $_POST['captcha'];
	$copia = $_POST['copia'];

	//Valores:
	require_once('../conexionbd.php');
	$query = "SELECT clie_idcliente, clie_nombre, clie_contrasenia FROM cliente WHERE clie_correo = '$cliente' AND clie_contrasenia = '$contrasenia'";
	$result = pg_query($conn, $query);
	$row = pg_fetch_row($result);
	pg_close($conn);

	//Condicional para inicio de sesion:
	if($result && $copia == $captcha){

		$_SESSION['sesion_iniciada_cliente'] = true;
		$_SESSION['idCliente'] = $row[0];
		$_SESSION['cliente'] = $row[1];
		header('Location: https://www.booktique.com.mx/index.php');

	} else {
		//regresar al login.html:
		session_destroy();
		header('Location: https://www.booktique.com.mx/html/Administrador/login.php');
	}



?>
