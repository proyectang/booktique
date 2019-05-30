<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/stilos.css ">
	<link rel="stylesheet" href="css/tienda.css">
	<link rel="shorcut icon" type="image/x-icon" href="img/favicon.ico">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
	
	<title>Booktique</title>
</head>
<body>
	
		<header>
			<div class="contenedor">
	 		<a href="index.php"><img class="logo" src="../img/logo.png" alt=""></a>
	 				<div class="buscar-caja">
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

						session_start();

	  				?>			
				
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
					 	    <li><a href="html/quienes_somos.html">Quiénes Somos</a></li>
						    <li><a href="#contato">Contacto</a></li>
						    <?php 
						    	if($_SESSION['sesion_iniciada_cliente']){
						    		echo "<li><a  class='micuenta'>$_SESSION['cliente']</a></li>";
						    	} else{
						    		echo "<li><a  class='micuenta' href='html/Cliente/login.html'>Mi Cuenta</a></li>";
						    	}

						    ?>
						    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
						</ul>
			    	</nav>
				</div>

			</div>
		</header>



	
<section class="main">
			<div class="banner">
				<img src="img/banner2.png" alt="">
			</div>
		
		<div name="novedades" id="novedades" class="novedades">
		<h3 class="lmv">Lo más vendido</h3>	
		<!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide" ></div>
      <div class="swiper-slide" ></div>
      <div class="swiper-slide" ></div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper JS -->
  <script src="js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
		     
</div>
</section>

	<section class="main">
    	
	 <section class="libro">
			<div class="contenedor">


				<?php
					echo "<h3 class='genero'>Ficción</h3>";
					echo "<div class='contenedor-libros'>"; 
					while ($row = pg_fetch_row($libros)) {

						if ($row[5] == 1) {
	
							echo "<div class='indlibro'>
										<div class='thumb'>
											<img src='$row[4]' alt='$row[1]'>
										</div>
										<div class='descripcion'>
											<p class='nombre' align='center'>Título: $row[1]</p><p align='center'>Autor: $row[3]</p>
											<p class='nombre' align='center'>$ $row[2]</p>
											<form action='php/agregar_carrito.php' method='post'>
												<input type='hidden' name='libr_idlibro' value='$row[0]'>
												<button align='center' type='submit'> Agregar al carrito</button>
											</form>
										</div>
									</div>";	
						} 
					}
					echo "</div>"; 
					print_r($_SESSION, true);
				?>
				<hr>
				<?php
					$libros = pg_query($conn, $query) or die (pg_last_error());
					echo "<h3 class='genero'>Poesía</h3>";
					echo "<div class='contenedor-libros'>"; 
					while ($row = pg_fetch_row($libros)) {

						if ($row[5] == 2) {
	
							echo "<div class='indlibro'>
										<div class='thumb'>
											<img src='$row[4]' alt='$row[1]'>
										</div>
										<div class='descripcion'>
											<p class='nombre' align='center'>Título: $row[1]</p><p align='center'>Autor: $row[3]</p>
											<p class='nombre' align='center'>$ $row[2]</p>
											<form action='php/agregar_carrito.php' method='post'>
												<input type='hidden' name='pedi_idcliente' value='$row[0]'>
												<input type='hidden' name='libr_idlibro' value='$row[0]'>
												<button align='center' type='submit'> Agregar al carrito</button>
											</form>
										</div>
									</div>";	
						} 
					}
					echo "</div>";
				?>
				<hr>
				<?php
					$libros = pg_query($conn, $query) or die (pg_last_error());
					echo "<h3 class='genero'>Científicos</h3>";
					echo "<div class='contenedor-libros'>"; 
					while ($row = pg_fetch_row($libros)) {

						if ($row[5] == 3) {
	
							echo "<div class='indlibro'>
										<div class='thumb'>
											<img src='$row[4]' alt='$row[1]'>
										</div>
										<div class='descripcion'>
											<p class='nombre' align='center'>Título: $row[1]</p><p align='center'>Autor: $row[3]</p>
											<p class='nombre' align='center'>$ $row[2]</p>
											<form action='php/agregar_carrito.php' method='post'>
												<input type='hidden' name='pedi_idcliente' value='$row[0]'>
												<input type='hidden' name='libr_idlibro' value='$row[0]'>
												<button align='center' type='submit'> Agregar al carrito</button>
											</form>
										</div>
									</div>";	
						} 
					}
					echo "</div>";
				?>
				<hr>
				<?php
					$libros = pg_query($conn, $query) or die (pg_last_error());
					echo "<h3 class='genero'>Thriller</h3>";
					echo "<div class='contenedor-libros'>"; 
					while ($row = pg_fetch_row($libros)) {

						if ($row[5] == 4) {
	
							echo "<div class='indlibro'>
										<div class='thumb'>
											<img src='$row[4]' alt='$row[1]'>
										</div>
										<div class='descripcion'>
											<p class='nombre' align='center'>Título: $row[1]</p><p align='center'>Autor: $row[3]</p>
											<p class='nombre' align='center'>$ $row[2]</p>
											<form action='php/agregar_carrito.php' method='post'>
												<input type='hidden' name='pedi_idcliente' value='$row[0]'>
												<input type='hidden' name='libr_idlibro' value='$row[0]'>
												<button align='center' type='submit'> Agregar al carrito</button>
											</form>
										</div>
									</div>";	
						} 
					}
					echo "</div>";
				?>
				<hr>
				<?php
					$libros = pg_query($conn, $query) or die (pg_last_error());
					echo "<h3 class='genero'>Historia</h3>";
					echo "<div class='contenedor-libros'>"; 
					while ($row = pg_fetch_row($libros)) {

						if ($row[5] == 5) {
	
							echo "<div class='indlibro'>
										<div class='thumb'>
											<img src='$row[4]' alt='$row[1]'>
										</div>
										<div class='descripcion'>
											<p class='nombre' align='center'>Título: $row[1]</p><p align='center'>Autor: $row[3]</p>
											<p class='nombre' align='center'>$ $row[2]</p>
											<form action='php/agregar_carrito.php' method='post'>
												<input type='hidden' name='pedi_idcliente' value='$row[0]'>
												<input type='hidden' name='libr_idlibro' value='$row[0]'>
												<button align='center' type='submit'> Agregar al carrito</button>
											</form>
										</div>
									</div>";	
						} 
					}
					echo "</div>";
				?>
				<hr>
				<?php
					$libros = pg_query($conn, $query) or die (pg_last_error());
					echo "<h3 class='genero'>Negocios y finanzas</h3>";
					echo "<div class='contenedor-libros'>"; 
					while ($row = pg_fetch_row($libros)) {

						if ($row[5] == 6) {
	
							echo "<div class='indlibro'>
										<div class='thumb'>
											<img src='$row[4]' alt='$row[1]'>
										</div>
										<div class='descripcion'>
											<p class='nombre' align='center'>Título: $row[1]</p><p align='center'>Autor: $row[3]</p>
											<p class='nombre' align='center'>$ $row[2]</p>
											<form action='php/agregar_carrito.php' method='post'>
												<input type='hidden' name='pedi_idcliente' value='$row[0]'>
												<input type='hidden' name='libr_idlibro' value='$row[0]'>
												<button align='center' type='submit'> Agregar al carrito</button>
											</form>
										</div>
									</div>";	
						} 
					}
					echo "</div>";
				?>
				<hr>
				</div>
           </section>
		</section>



	

	<footer>
		<section class="contacto">
				
			<div name="contacto" id="contacto" class="contenedor">
				<h3 class="titulo">Contacto</h3>
				<form class="formulario" action="php/contacto.php" method="post">
					<input type="text" name="nombre" placeholder="Nombre:" required>
					<input type="email" name="email" placeholder="Correo:" required>
					<textarea name="mensaje" placeholder="Mensaje:"></textarea>
					<input class="boton" type="submit" name="Ingresar" value="Enviar">
				</form>
			</div>
		</section>
		
		<section class="redes-sociales">
			<div class="contenedor">
				<a href="https://twitter.com/@booktique1" class="twitter"><i class="fab fa-twitter"></i></a>
				<a href="https://facebook.com/booktique.booktique.94" class="facebook"><i class="fab fa-facebook-f"></i></a>
				<a href="https://instagram.com/booktique.booktique" class="instagram"><i class="fab fa-instagram"></i></a>

			</div>
		</section>
	</footer>
</body>
</html>
