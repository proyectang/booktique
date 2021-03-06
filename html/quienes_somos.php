<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/swiper.min.css">
	<link rel="stylesheet" href="../css/stilos.css">
	<link rel="shorcut icon" type="image/x-icon" href="img/favicon.ico">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
	
	<title>Quiénes Somos</title>
</head>
<body>
	
			<header>
			<div class="contenedor">
	 		<a href="index.php"><img class="logo" src="../img/logo.png" alt=""></a>
	 			<!--	<div class="buscar-caja">
	   					<input type="search" name="" class="buscar-txt" placeholder="Buscar..."/>
	   					<a class="buscar-btn">
	    					<i class="fas fa-search"></i>
	  					</a>
	  				</div>	

	  				<?php
	  					require_once('php/conexionbd.php');
						$query = "SELECT gene_idgenero, gene_nombre FROM genero";
						$generos = pg_query($conn, $query) or die (pg_last_error());

						$query = "SELECT libr_idlibro, libr_nombre, libr_precio, libr_autor, libr_imagen, libr_idgenero FROM libro";
						$libros = pg_query($conn, $query) or die (pg_last_error());

	  				?>	-->		
				
				<div class="divmenu">
	 			 	<nav class="navegacion">
						<ul class="menu">
					 		<li><a href="#">Generos</a>
						        <ul class="submenu">
						        	<?php 
										while ($row = pg_fetch_row($generos)) { 

											echo "<li><a href='$row[0]'> $row[1] </a></li>";	
										}
									?>
						        </ul>
					 	    </li>
					 	    <li><a href="html/quienes_somos.php">Quiénes Somos</a></li>
						    <li><a href="#contato">Contacto</a></li>
						    <li><a  class="micuenta" href="html/Cliente/login.html">Mi Cuenta</a></li>
						    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
						</ul>
			    	</nav>
				</div>

			</div>
		</header>

	



	<section class="main">
			<h3>Misión</h3>	
				<p>Propiciar la divulgación del conocimiento y entretenimiento a través de la oferta de
                     libros, impresos o digitales, de calidad.</p>
             </br>
            <h3>Visión</h3>
            	<p>Ser la primera opción, a nivel nacional, con la mayor oferta editorial para lectores y
                    profesionales</p>
			</br>
			<h3>valores</h3>
			   <p>• Respeto. a los clientes y proveedores.
                  • Diversidad. no discriminamos
				  • Pasión. Nos inclinamos por la libertad y el conocimiento
                  • Trabajo en equipo. formamos equipos que integren al conjunto.</p>
			<br>
			<h3>Créditos</h3>
				<p>
					-Cesar Jahir Mota Sánchez 
					-Gabriela Ruiz Mendieta
					-Daniel Zárazua Flores
				</p>

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