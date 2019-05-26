<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="../../css/normalize.css">
	<link rel="stylesheet" href="../../css/registro.css">
	<link rel="shorcut icon" type="image/x-icon" href="../../img/favicon.ico">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>

	<title>Registrar libro</title>
</head>
<body>


	<div class="contenedor">
    <div class="login-box">
    	<div class="logo">
     		<img src="../../img/logo.png" alt="">
     	</di>

     	<?php
			require_once('../../php/conexionbd.php');
			$query = "SELECT gene_idgenero, gene_nombre FROM genero";
			$result = pg_query($conn, $query) or die (pg_last_error());
			//$arregloGeneros = pg_fetch_array($result, 0, PGSQL_NUM);

			//echo count($arregloGeneros);

     	?>

	<form action="../../php/Administrador/registrar_usuario.php" method="post">
		<input type="text" name="usua_nombre" placeholder="Usuario:" required>
		<br>
		<input type="password" name="usua_contrasenia" placeholder="Contrasenia:" required>
		<br>
		<label for="">Estatus:</label>
		<select name="usua_estatus" id="">
			<option value="A">Activo</option>
			<option value="I">Inactivo</option>
		</select>
		<br>
		<label for="">Tipo:</label>
		<select name="usua_tipo" id="">
			<option value="A">Administrador</option>
			<option value="E">Empleado</option>
		</select><br>
		<input type="submit" name="enviar" value="Registrar usuario"><br>
	</form><br>
	
	</div>
	</div>
</body>
</html>