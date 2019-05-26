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
	
	<title>Booktique - editar usuario</title>
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
					$id_usuario = $_POST["usua_idusuario"];

					require_once('../../php/conexionbd.php');
					$query = "SELECT usua_idusuario, usua_nombre, usua_contrasenia, usua_estatus, usua_tipo FROM usuario WHERE usua_idusuario = $id_usuario";
					$result = pg_query($conn, $query) or die (pg_last_error());
					$row = pg_fetch_row($result);
					pg_close($conn);

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
		<h4 class="page-header">Editar usuario</h4>
		<hr>
	</div>
	
	<div class="col-md-6 offset-md-3">
		<form action="actualizar_usuario.php" method="post">
			<div class="form-group">
				<label for="">Usuario:</label>
				<input type="text" name="usua_nombre" placeholder="Usuario:" required class="form-control" value="<?php echo $row[1]; ?>">
			</div>
			<div class="form-group">
				<label for="">Contraseña:</label>
				<input type="password" name="usua_contrasenia" placeholder="Contrasenia:" required class="form-control" value="<?php echo $row[2]; ?>">
			</div>
			<div class="form-group">
				<label for="">Estatus:</label>
				<select name="usua_estatus" id="" class="form-control">
					<?php 
						if ($row[3] == 'A'){
							echo "<option value='A' selected>Activo</option>";
							echo "<option value='I'>Inactivo</option>";
						} else {
							echo "<option value='A'>Activo</option>";
							echo "<option value='I' selected>Inactivo</option>";
						}

					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tipo:</label>
				<select name="usua_tipo" id="" class="form-control">
					<?php 
						if ($row[4] == 'A'){
							echo "<option value='A' selected>Administrador</option>";
							echo "<option value='E'>Empleado</option>";
						} else {
							echo "<option value='A' >Administrador</option>";
							echo "<option value='E' selected>Empleado</option>";
						}

					?>
				</select>
			</div>
			<input type="hidden" name="usua_idusuario" value="<?php echo $row[0]; ?>">
			<div class="text-center">
				<button type="submit" name="enviar" class="btn btn-outline-primary"> Actualizar																																																																																																																 usuario</button>	
			</div>
		</form><br>
	</div>
	
	
	</div>
	</div>
</body>
</html>