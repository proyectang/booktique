<?php 
	session_start();

	var_dump($_POST);
	$libro_id = $_POST['libr_idlibro'];
	echo "ID: ".$libro_id;

	require_once('../conexionbd.php');
	$query = "SELECT libr_nombre, libr_autor, libr_precio, libr_imagen, libr_descripcion FROM libro WHERE libr_idlibro =".$libro_id;
	$result = pg_query($conn, $query);
	$libro = pg_fetch_row($result);
	pg_close($conn);

	if(!isset($_SESSION['carrito'])){
			$libro = array(
				'id_libro' => $libro_id,
				'libr_nombre' => $libro[0],
				'libr_autor' => $libro[1],
				'libr_precio' => $libro[2],
				'libr_imagen' => $libro[3],
				'libr_descripcion' => $libro[4]
			);
			$_SESSION['carrito'][0] = $libro;

	} else {
		$numeroLibros = count($_SESSION['carrito']);
		$libro = array(
				'id_libro' => $libro_id,
				'libr_nombre' => $libro[0],
				'libr_autor' => $libro[1],
				'libr_precio' => $libro[2],
				'libr_imagen' => $libro[3],
				'libr_descripcion' => $libro[4]
		);
		$_SESSION['carrito'][$numeroLibros] = $libro;

	}
	header('Location: https://www.booktique.com.mx/index.php');

?>