<?php  

require_once('../conexionbd.php');

	$usua_idusuario = $_POST["usua_idusuario"];
	$usua_nombre = $_POST["usua_nombre"];
	$usua_contrasenia = md5($_POST["usua_contrasenia"]);
	$usua_estatus = $_POST["usua_estatus"];
	$usua_tipo = $_POST["usua_tipo"];
	

	$query = "UPDATE usuario SET usua_nombre = '$usua_nombre', usua_contrasenia = '$usua_contrasenia',  usua_estatus = '$usua_estatus', usua_tipo =  '$usua_tipo' WHERE usua_idusuario = $usua_idusuario";
	$result = pg_query($conn, $query) or die (pg_last_error());
	pg_close($conn);

	if($result){
		header('Location: http://www.booktique.com.mx/html/Administrador/usuarios.php');
		echo "<div class='alert alert-primary' role='alert'>
				  Se ha actualizado exitosamente el usuario
				</div>";
	}else {
		
		echo "<div class='alert alert-warning' role='alert'>
				  Se ha registrado exitosamente el usuario
				</div>";
	}


?>