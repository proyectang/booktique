<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="../../css/normalize.css">
	<link rel="stylesheet" href="../../css/login.css">
	<link rel="shorcut icon" type="image/x-icon" href="../../img/favicon.ico">
	<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>


     

	<title>Login</title>
</head>
<body>
		
	<div class="contenedor">
    <div class="login-box">
    	<div class="logo">
     		<img src="../../img/logo.png" alt="">
     	</di>
     	
	 		<form action="../../php/Administrador/login.php" method="post">
				<input type="text" name="usua_nombre"  placeholder="Usuario:" required>
				<br>
				<input type="password" name="usua_contrasenia" placeholder="Contraseña:" required>
				<br>

				<?php

		        function codigo_captcha(){

				$k="";
				$paramentros="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$maximo=strlen($paramentros)-1;

				for($i=0; $i<5; $i++){

					$k.=$paramentros{mt_rand(0,$maximo)};

				}

				return $k;

		}

?>
				<input type="text" name="captcha" value= <?php echo codigo_captcha();?> size="5" readonly>
				<br>
				<input type="text" name="copia" required>

                <input type="submit" name="enviar" value="Acceder">
		     </form>
    </div>
	</div>
	
	<!--<div class="registrarse">
       <a href="..//html/registro_usuario.html">Registrarse</a>
	</div>-->




</body>
</html>