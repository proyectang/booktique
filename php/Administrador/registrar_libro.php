<?php

	require_once('../conexionbd.php');

	$libr_nombre = $_POST["libr_nombre"];
	$libr_autor = $_POST["libr_autor"];
	//$libr_imagen = $FILE["libr_imagen"];
	$libr_descripcion = $_POST["libr_descripcion"];
	$libr_precio = $_POST["libr_precio"];
	$libr_estatus = $_POST["libr_estatus"];
	$libr_valoracion = $_POST["libr_valoracion"];
	$libr_unidades = $_POST["libr_unidades"];
	$libr_idgenero = $_POST["libr_idgenero"];

	$dir_subida = '/var/www/booktique/img/libros/';
	$libr_imagen = $dir_subida.basename($_FILES["libr_imagen"]["name"]);
	$temp = $_FILES["libr_imagen"]["tmp_name"];

	$libr_insert = 'https://www.booktique.com.mx/img/libros/'.basename($_FILES["libr_imagen"]["name"]);

	$comp = move_uploaded_file($temp, $libr_imagen);

	if ($comp) {

	    $query = "INSERT INTO libro (libr_nombre, libr_autor, libr_imagen, libr_descripcion, libr_precio, libr_estatus, libr_valoracion, libr_unidades, libr_idgenero) VALUES ('$libr_nombre', '$libr_autor', '$libr_insert', '$libr_descripcion', $libr_precio, '$libr_estatus', '$libr_valoracion', $libr_unidades, $libr_idgenero)";
		$result = pg_query($conn, $query) or die (pg_last_error());
		pg_close($conn);

		if($result){

			header('Location: https://www.booktique.com.mx/html/Administrador/libros.php');
		}

	} else {

	    echo "¡Posible ataque de subida de ficheros!\n";
	    
	}

	
?>