<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="../../css/normalize.css">
	<link rel="stylesheet" href="../../css/swiper.min.css">
	<link rel="stylesheet" href="../../css/stilos.css ">
	<link rel="shorcut icon" type="image/x-icon" href="../../img/favicon.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
	
	<title>Booktique</title>
</head>
<body>
	<header>
		<div class="contenedor">
 		<img class="logo" src="../../img/logo.png" alt="">
 				<div class="buscar-caja">
   					<input type="search" name="" class="buscar-txt" placeholder="Buscar..."/>
   					<a class="buscar-btn">
    					<i class="fas fa-search"></i>
  					</a>
  				</div>
  				<?php
					require_once('../../php/conexionbd.php');
					$query = "SELECT usua_idusuario, usua_nombre, usua_estatus, usua_tipo FROM usuario";
					$result = pg_query($conn, $query) or die (pg_last_error());

		     	?>				
			
			<div class="divmenu">
 			 	<nav class="navegacion">
					<ul class="menu">
				 		<li><a href="#"><?php session_start(); echo "<span class='far fa-user'></span> ". $_SESSION['usuario']; ?></a>
					        <ul class="submenu">
						         <li><a href="../../php/cerrar_session.php">Salir</a></li>
					        </ul>
				 	    </li>
					</ul>
					<ul class="menu">
				 		<li><a href="usuarios.php">Usuarios</a></li>
					</ul>
					<ul class="menu">
				 		<li><a href="libros.php">Libros</a></li>
					</ul>
					<ul class="menu">
				 		<li><a href="#">Ventas</a></li>
					</ul>
		    	</nav>
			</div>

		</div>
	</header><br>

	<div class="col-md-6 offset-md-3">
		<h4 class="page-header">Registrar libro</h4>
		<hr>
	</div>

     	<?php

     			session_start();

				if($_SESSION['sesion_iniciada'] != true){
					session_destroy();
					header('Location: http://www.booktique.com.mx/html/Administrador/login.html');
				}
			require_once('../../php/conexionbd.php');
			$query = "SELECT gene_idgenero, gene_nombre FROM genero";
			$result = pg_query($conn, $query) or die (pg_last_error());
			//$arregloGeneros = pg_fetch_array($result, 0, PGSQL_NUM);

			//echo count($arregloGeneros);

     	?>

	<div class="col-md-6 offset-md-3">
		<form action="../../php/Administrador/registrar_libro.php" method="post" class="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nombre:</label>
				<input type="text" name="libr_nombre" placeholder="Nombre:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Autor:</label>
				<input type="text" name="libr_autor" placeholder="Autor:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Descripción:</label>
				<input type="text" name="libr_descripcion" placeholder="Descripción:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Precio:</label>
				<input type="number" name="libr_precio" placeholder="Precio:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Estatus:</label>
				<select name="libr_estatus" id="" class="form-control">
					<option value="A">Agotado</option>
					<option value="D">Disponible</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Valoración:</label>
				<input type="text" name="libr_valoracion" placeholder="Valoración:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Unidades:</label>
				<input type="number" name="libr_unidades" placeholder="Unidades:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Género:</label>
				<select name="libr_idgenero" id="" class="form-control">
					<?php 
						while ($row = pg_fetch_row($result)) { 

							echo "<option value='$row[0]'> $row[1] </option>";	
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Selecciona una imagen:</label>
				<input type="file" name="libr_imagen" required>
			</div>
			<div class="text-center">
				<button type="submit" name="enviar" class="btn btn-outline-primary">Registrar libro</button>
			</div>
		</form><br>
	</div>
</body>
</html>