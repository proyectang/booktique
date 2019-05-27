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

  					session_start();

					if($_SESSION['sesion_iniciada'] != true){
						session_destroy();
						header('Location: http://www.booktique.com.mx/html/Administrador/login.html');
					}
					
					require_once('../../php/conexionbd.php');
					$query = "SELECT usua_idusuario, usua_nombre, usua_estatus, usua_tipo FROM usuario";
					$result = pg_query($conn, $query) or die (pg_last_error());

		     	?>				
			
			<div class="divmenu">
 			 	<nav class="navegacion">
					<ul class="menu">
				 		<li><a href="#">Usuarios</a>
					        <ul class="submenu">
						         <li><a href="registro_usuario.php">Registrar</a></li>
						         <li><a href="usuarios.php">Buscar</a></li>
					        </ul>
				 	    </li>
					</ul>
					<ul class="menu">
				 		<li><a href="#">Libros</a>
					        <ul class="submenu">
						         <li><a href="#">Registrar</a></li>
						         <li><a href="#">Buscar</a></li>
					        </ul>
				 	    </li>
					</ul>
					<ul class="menu">
				 		<li><a href="#">Ventas</a>
					        <ul class="submenu">
						         <li><a href="#">Registrar</a></li>
						         <li><a href="#">Buscar</a></li>
					        </ul>
				 	    </li>
					</ul>
		    	</nav>
			</div>

		</div>
	</header><br>

	<div class="col-md-6 offset-md-3">
		<h4 class="page-header">Registrar usuario</h4>
		<hr>
	</div>
	
	<div class="col-md-6 offset-md-3">
		<form action="../../php/Administrador/registrar_usuario.php" method="post">
			<div class="form-group">
				<label for="">Usuario:</label>
				<input type="text" name="usua_nombre" placeholder="Usuario:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Usuario:</label>
				<input type="password" name="usua_contrasenia" placeholder="Contrasenia:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Estatus:</label>
				<select name="usua_estatus" id="" class="form-control">
					<option value="A">Activo</option>
					<option value="I">Inactivo</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tipo:</label>
				<select name="usua_tipo" id="" class="form-control">
					<option value="A">Administrador</option>
					<option value="E">Empleado</option>
				</select>
			</div>
			<div class="text-center">
				<button type="submit" name="enviar" class="btn btn-outline-primary"> Registrar usuario</button>	
			</div>
		</form><br>
	</div>
	
	
	</div>
	</div>
</body>
</html>