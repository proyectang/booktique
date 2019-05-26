<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/stilos.css ">
	<link rel="shorcut icon" type="image/x-icon" href="img/favicon.ico">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
	
	<title>Booktique</title>
</head>
<body>
	<header>
		<div class="contenedor">
 		<img class="logo" src="img/logo.png" alt="">
 				<div class="buscar-caja">
   					<input type="search" name="" class="buscar-txt" placeholder="Buscar..."/>
   					<a class="buscar-btn">
    					<i class="fas fa-search"></i>
  					</a>
  				</div>
  				<?php
					require_once('../../php/conexionbd.php');
					$query = "SELECT gene_idgenero, gene_nombre FROM genero";
					$result = pg_query($conn, $query) or die (pg_last_error());

		     	?>				
			
			<div class="divmenu">
 			 	<nav class="navegacion">
					<ul class="menu">
				 		<li><a href="#">Generos</a>
					        <ul class="submenu">
						         <li><a href="#">Arte</a></li>
						         <li><a href="#">Auto Ayuda</a></li>
						         <li><a href="#">Infantiles</a></li>
						         <li><a href="#">Historia</a></li>
						         <li><a href="#">Negocios</a></li>
						         <li><a href="#">Suspenso</a></li>
						         <li><a href="#">Tecnología</a></li>
						         <li><a href="#">Terror</a></li>
						         <li><a href="#">Romance</a></li>
					        </ul>
				 	    </li>
				 	    <li><a href="#novedades">Novedades</a></li>
					    <li><a href="#contacto">Contacto</a></li>
					    <li><a  class="micuenta" href="#">Mi Cuenta</a></li>
					    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
					</ul>
		    	</nav>
			</div>

		</div>
	</header>



	<section class="main">
			
</section>


	<footer>
		<section class="redes-sociales">
			<div class="contenedor">
				<a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
				<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="instagram"><i class="fab fa-instagram"></i></a>

			</div>
		</section>
	</footer>
</body>
</html>