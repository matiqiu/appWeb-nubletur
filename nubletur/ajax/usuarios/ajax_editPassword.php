<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_user.php");

$retorno = "mal"; 

//q@q.cl qweqwe

	$id_usuario=htmlspecialchars($_POST['id_usuario'], ENT_QUOTES, 'UTF-8');
    $password_old=htmlspecialchars($_POST['password_old'], ENT_QUOTES, 'UTF-8'); 
    $password_new=htmlspecialchars($_POST['password_new'], ENT_QUOTES, 'UTF-8'); 

	if(conectar()) {
		 
		try {   
			$stmt = $db_conn->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario");
			$stmt->execute(array(":id_usuario"=>$id_usuario));
			$fila = $stmt->fetch(PDO::FETCH_ASSOC);
			 
			if(password_verify($password_old, $fila['password'])){
			//if($password === $fila['password']) { 
            
                
                $retorno_query = editPassword($id_usuario, $password_new);

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