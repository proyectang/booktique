<?php

	require_once('../conexionbd.php');

	$libr_idlibro = $_POST['libr_idlibro'];

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

	if (file_exists($target_file)) {

	    echo "El archivo ya se encuentra cargado en el servidor.";
	}

	$temp = $_FILES["libr_imagen"]["tmp_name"];

	//$libr_insert = 'http://www.booktique.com.mx/img/libros/'.basename($_FILES["libr_imagen"]["name"]);

	//$comp = move_uploaded_file($temp, $libr_imagen);

	//if ($comp) {

	    $query = "UPDATE libro SET libr_nombre = '$libr_nombre', libr_autor = '$libr_autor', libr_descripcion = '$libr_descripcion', libr_precio = $libr_precio, libr_estatus = '$libr_estatus', libr_valoracion = '$libr_valoracion', libr_unidades = $libr_unidades, libr_idgenero = $libr_idgenero WHERE libr_idlibro = $libr_idlibro";
		$result = pg_query($conn, $query) or die (pg_last_error());
		pg_close($conn);

		if($result){

			header('Location: https://www.booktique.com.mx/html/Administrador/libros.php');
		}

	//} else {

	//    echo "¡Imposible cargar el archivo!\n";
	    
	//}

	
?>