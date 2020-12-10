<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("../../_drivers/funciones.php");
$retorno = "mal"; 

//q@q.cl qweqwe

	$correo=htmlspecialchars($_POST['email_send'], ENT_QUOTES, 'UTF-8');
	$password=htmlspecialchars($_POST['password_send'], ENT_QUOTES, 'UTF-8'); 

	if(conectar()) {
		 
		try {   
			$stmt = $db_con->prepare("SELECT * FROM UsuarioEventos WHERE email=:email");
			$stmt->execute(array(":email"=>$email));
			$fila = $stmt->fetch(PDO::FETCH_ASSOC);
			 
			//if(password_verify($password, $fila['password'])){
			if($password === $fila['password']) { 
			 

                $retorno = "ok";


			} else {
				 
				$retorno="mal"; 
			}
		}
		catch(PDOException $e) {
				 
			echo $e->getMessage();
		} 
	}
 

echo $retorno;
?>