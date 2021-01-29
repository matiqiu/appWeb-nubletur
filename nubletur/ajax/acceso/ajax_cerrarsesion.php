<?php

	unset($_COOKIE['id_usuario']);
    unset($_COOKIE['nombre']);
    unset($_COOKIE['email']);
    unset($_COOKIE['array_privilegios']);

	
	setcookie("id_usuario", null, -1, '/');
    setcookie("nombre", null, -1, '/');
    setcookie("email", null, -1, '/');
	setcookie("array_privilegios", null, -1, '/');
	
	echo "unset"; 
?>