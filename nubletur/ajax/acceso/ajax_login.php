<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("../../_drivers/funciones.php");
$return = "mal"; 

	$email=htmlspecialchars($_POST['email_send'], ENT_QUOTES, 'UTF-8');
	$password=htmlspecialchars($_POST['password_send'], ENT_QUOTES, 'UTF-8'); 
	global $db_conn;
	if(conectar()) {
		 
		try {   
			$stmt = $db_conn->prepare("SELECT * FROM usuario WHERE email=:email");
			$stmt->execute(array(":email"=>$email));
			$fila = $stmt->fetch(PDO::FETCH_ASSOC);
			 
			if(password_verify($password, $fila['password'])){
			//if($password === $fila['password']) { 
				$return = "ok";

				$id_usuario=$fila['id_usuario'];
				setcookie("id_usuario", $fila['id_usuario'], time() + (86400 * 30), "/"); // 86400 = 1 day
				setcookie("nombre", $fila['nombre'], time() + (86400 * 30), "/"); // 86400 = 1 day
				setcookie("email", $fila['nombre'], time() + (86400 * 30), "/"); // 86400 = 1 day

				$stmt2 = $db_conn->prepare("SELECT * FROM privilegio WHERE id_usuario=:id_usuario"); 
				$stmt2->execute(array(":id_usuario"=>$id_usuario));  
				//$stmt2->bindParam(1,$id_usuario);
				//$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC); 
				$array_privilegios="";
				while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) 
				{
					if($array_privilegios=="")
					{
						$array_privilegios=$fila2["tipo_privilegio"];
					}
					else
					{
						$array_privilegios=$array_privilegios.",".$fila2["tipo_privilegio"]; 
					} 
				}
				setcookie("array_privilegios", $array_privilegios, time() + (86400 * 30), "/"); // 86400 = 1 day

			} else {
				 
				$return="mal"; 
			}
		}
		catch(PDOException $e) {
				 
			echo $e->getMessage();
		} 
	}
 

echo $return;
?>