<?php 

	session_unset();                                        // Borrar las variables de sesión
    setcookie(session_name(), 0, 1 , ini_get("session.cookie_path"));    // Eliminar la cookie
    session_destroy();  

    header('Location: https://www.booktique.com.mx');

?>