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
	 		<a href="index.php"><img class="logo" src="../../img/logo.png" alt=""></a>
	 				<!--div class="buscar-caja">
	   					<input type="search" name="" class="buscar-txt" placeholder="Buscar..."/>
	   					<a class="buscar-btn">
	    					<i class="fas fa-search"></i>
	  					</a>
	  				</div>	

	  				<?php
	  					//require_once('php/conexionbd.php');
						//$query = "SELECT gene_idgenero, gene_nombre FROM genero";
						//$generos = pg_query($conn, $query) or die (pg_last_error());

						//$query = "SELECT libr_idlibro, libr_nombre, libr_precio, libr_autor, libr_imagen, libr_idgenero FROM libro";
						//$libros = pg_query($conn, $query) or die (pg_last_error());

						session_start();

	  				?> -->	
				
				<div class="divmenu">
	 			 	<nav class="navegacion">
						<ul class="menu">
					 		<li><a href="#generos">Generos</a>
						        <ul class="submenu">
						        	<?php 
										while ($row = pg_fetch_row($generos)) { 

											echo "<li><a href='#$row[1]'> $row[1] </a></li>";	
										}
									?>
						        </ul>
					 	    </li>
					 	    <li><a href="html/quienes_somos.html">Quiénes Somos</a></li>
						    <li><a  href="#contacto">Contacto</a></li>
						    <?php 
						    session_start();
						    	if($_SESSION["sesion_iniciada_cliente"]){ ?>
								<li><a class='micuenta'> <?php echo $_SESSION['cliente']; ?></a>


									<ul class="submenuusu">
						               <li><a href="../../php/cerrar_session.php">Salir</a></li>
					                 </ul>


								</li>
								<li><a href='html/Cliente/carrito.php'><i class='fas fa-shopping-cart'></i><?php echo count($_SESSION['carrito']); ?></a></li>
						    		
<?php }else{ ?>
						    		<li><a  class="micuenta" href="html/Cliente/login.php">Mi Cuenta</a></li>
						    		<li><a href="html/Cliente/carrito.php"><i class="fas fa-shopping-cart"></i></a></li>
						    <?php	}    ?>

						</ul>
			    	</nav>
				</div>

			</div>
		</header>







	<br>

	<div class="col-md-6 offset-md-3">
		<h4 class="page-header">Datos de pago </h4>
		<hr>
	</div>

     	<?php

     			session_start();

				if($_SESSION['sesion_iniciada'] != true){
					session_destroy();
					header('Location: https://www.booktique.com.mx/html/Administrador/login.html');
				}
			require_once('../../php/conexionbd.php');
			$query = "SELECT gene_idgenero, gene_nombre FROM genero";
			$result = pg_query($conn, $query) or die (pg_last_error());
			//$arregloGeneros = pg_fetch_array($result, 0, PGSQL_NUM);

			//echo count($arregloGeneros);

     	?>

	<div class="col-md-6 offset-md-3">
		<form action="../compra_exitosa.html" method="post" class="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nombre propietario:</label>
				<input type="text" name="libr_nombre" placeholder="Nombre:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Número de tarjeta:</label>
				<input type="text" name="libr_autor" placeholder="Autor:" required class="form-control">
			</div>
			<div class="form-group">
				<label for="">Código de Seguridad:</label>
				<input type="text" name="libr_descripcion" placeholder="Descripción:" required class="form-control">
			</div>
			
		
			

			<div class="text-center">
				<button type="submit" name="enviar" class="btn btn-outline-primary">Pagar</button>
			</div>
		</form><br>
	</div>
</body>
</html>