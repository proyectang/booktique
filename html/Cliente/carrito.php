<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="../../css/normalize.css">
	<link rel="stylesheet" href="c../../ss/swiper.min.css">
	<link rel="stylesheet" href="../../css/stilos.css ">
	<link rel="stylesheet" href="../../css/tienda.css">
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
						    	session_start();
						    	if($_SESSION['sesion_iniciada_cliente']){
						    		echo "<li><a  class='micuenta'>$_SESSION['cliente']</a></li>";
						    		echo "<li><a href='html/Cliente/carrito.php'><i class='fas fa-shopping-cart'></i>count($_SESSION['carrito'])</a></li>";
						    	} else{
						    		echo "<li><a  class='micuenta' href='html/Cliente/login.html'>Mi Cuenta</a></li>";
						    		echo "<li><a><i class='fas fa-shopping-cart'></i></a></li>";
						    	}

						    ?>

						</ul>
			    	</nav>
				</div>

			</div>
		</header>


	<section class="main">
		<div class="col-md-10 offset-md-1">
			<?php if(empty($_SESSION['carrito'])) {  ?>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead class="thead-light  table-active text-center">
							<th>Libro</th>
							<th>Autor</th>
							<th>Precio</th>
							<th>Portada</th>
							<th>Descripcion</th>
							<th></th>
						</thead>
						<tbody>
							<?php $total = 0;?>
							<?php foreach($SESSION['carrito'] as $indice => $libro ) { ?>
							<tr>
								<td><?php echo $libro['libr_nombre']; ?></td>
								<td><?php echo $libro['libr_autor']; ?></td>
								<td><?php echo $libro['libr_precio']; ?></td>
								<td><img src="<?php echo $libro['libr_imagen']; ?>" width="40px"></td>
								<td><?php echo $libro['libr_descripcion']; ?></td>
								<td></td>
							</tr>
							<?php $total = $total + $libro['libr_precio'];?>
							<?php } ?>
							<tr>
								<td colspan="3" align="center">Total</td>
								<td colspan="2" align="center"><?php echo number_format($total,2); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php  } else {?>
				<div class="alert añert-success">
					No hay productos agregados al carrito
				</div>
				<?php } ?>
			</div>
		</section>


				<?php
					echo "<h3 class='genero'>Carrito de compras</h3>";
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
											<form action='php/Cliente/carrito.php' method='post'>
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
