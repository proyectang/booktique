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

	<form action="../../php/Administrador/registrar_libro.php" method="post">
		<input type="text" name="libr_nombre" placeholder="Nombre:" required>
		<br>
		<input type="text" name="libr_autor" placeholder="Autor:" required>
		<br>
		<input type="text" name="libr_descripcion" placeholder="Descripción:" required>
		<br>
		<input type="number" name="libr_precio" placeholder="Precio:" required>
		<br>
		<label for="">Estatus:</label>
		<select name="libr_estatus" id="">
			<option value="A">Agotado</option>
			<option value="D">Disponible</option>
		</select>
		<br>
		<input type="text" name="libr_valoracion" placeholder="Valoración:" required>
		<br>
		<input type="number" name="libr_unidades" placeholder="Unidades:" required>
		<br>
		<label for="">Género:</label>
		<select name="libr_idgenero" id="">
			<?php 
				while ($row = pg_fetch_row($result)) { 

					echo "<option value='$row[0]'> $row[1] </option>";	
				}
			?>
		</select>
		<br>
		<input type="file" name="libr_imagen" placeholder="Elegir una imagen" required>
		<br>
		<input type="submit" name="enviar" value="Registrar libro"><br>
	</form><br>
	
	</div>
	</div>
</body>
</html>