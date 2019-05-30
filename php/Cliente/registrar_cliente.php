<?php

	require_once('../conexionbd.php');

	//valores
    $dire_estado = $_POST["dire_estado"]; 
    $dire_ciudad = $_POST["dire_ciudad"];
    $dire_calle = $_POST["dire_calle"];
    $dire_codigopostal = $_POST["dire_codigopostal"];
    $dire_colonia = $_POST["dire_colonia"];
    $dire_delegacion = $_POST["dire_delegacion"];
    

    $clie_nombre = $_POST["clie_nombre"];
    $clie_apellidopaterno = $_POST["clie_apellidopaterno"];
    $clie_apellidomaterno = $_POST["clie_apellidomaterno"];
    $clie_correo = $_POST["clie_correo"];
	$clie_contrasenia = md5($_POST["clie_contrasenia"]);
    $clie_fechanacimiento = $_POST["clie_fechanacimiento"];
    $clie_telefono = $_POST["clie_telefono"];
    $clie_estatus = $_POST["clie_estatus"];




		//Primero debemos de insertar en la tabla de direcciones
	 $direccion= "INSERT INTO direccion (dire_estado, dire_ciudad, dire_calle, dire_codigopostal, dire_colonia, dire_delegacion) VALUES ('$dire_estado', '$dire_ciudad', '$dire_calle', '$dire_codigopostal', '$dire_colonia', '$dire_delegacion')";
	 $result = pg_query($conn, $direccion) or die (pg_last_error());

	 $Direccion = "SELECT max(dire_iddireccion) FROM direccion";
	 $result = pg_query($conn, $Direccion) or die (pg_last_error());

	 $idDireccion = pg_fetch_row($result);

	$query = "INSERT INTO cliente (clie_nombre, clie_apellidopaterno, clie_apellidomaterno, clie_correo, clie_contrasenia, clie_fechanacimiento, clie_telefono, clie_estatus, clie_iddireccion) VALUES ('$clie_nombre', '$clie_apellidopaterno', '$clie_apellidomaterno', '$clie_correo', '$clie_contrasenia', '$clie_fechanacimiento', '$clie_telefono', '$clie_estatus', $idDireccion[0])";

	

	$result = pg_query($conn, $query) or die (pg_last_error());
	pg_close($conn);

	if($result){
		header('Location: https://www.booktique.com.mx/html/Cliente/login.php');
		echo "<div class='alert alert-primary' role='alert'>
				  Se ha registrado exitosamente el usuario
				</div>";
	}else {
		
		echo "<div class='alert alert-warning' role='alert'>
				  Se ha registrado exitosamente el usuario
				</div>";
	}

?>