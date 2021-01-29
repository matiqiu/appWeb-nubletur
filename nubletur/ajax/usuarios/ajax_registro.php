<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_user.php");
include("../../model/model_privilegio.php");

$retorno = "mal";
if (isset($_POST['nombre'])) {
	$nombre                  = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
	$email                   = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$password                = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
	$estado                  = "1";
	$retorno_query  = insertUser1($nombre, $email, $password);


	//if (strpos($retorno_query, '1062 Duplicate entry') !== false) {
	//	$retorno = "correo_existe";
	//} 
	$stmt3 = buscaUserRepetido($email);
	$cuantas_rows3 = $stmt3->rowCount();
	if (!($cuantas_rows3 == 1)) {
		$retorno = "correo_existe";
	} else {
		$retorno = "ok";
		global $db_conn;
		if (conectar()) {


			$stmt = $db_conn->prepare("SELECT * FROM usuario WHERE email=:email");
			$stmt->execute(array(":email" => $email));
			$fila = $stmt->fetch(PDO::FETCH_ASSOC);

			$id_usuario = $fila['id_usuario'];
			setcookie("id_usuario", $fila['id_usuario'], time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("nombre", $fila['nombre'], time() + (86400 * 30), "/"); // 86400 = 1 day
			setcookie("email", $fila['email'], time() + (86400 * 30), "/"); // 86400 = 1 day
			$retorno_query2 = insertPrivilegio1($fila['id_usuario']);


			$stmt2 = $db_conn->prepare("SELECT * FROM privilegio WHERE id_usuario=:id_usuario");
			$stmt2->execute(array(":id_usuario" => $id_usuario));
			//$stmt2->bindParam(1,$id_usuario);
			//$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC); 
			$array_privilegios = "";
			while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
				if ($array_privilegios == "") {
					$array_privilegios = $fila2["tipo_privilegio"];
				} else {
					$array_privilegios = $array_privilegios . "," . $fila2["tipo_privilegio"];
				}
			}
			setcookie("array_privilegios", $array_privilegios, time() + (86400 * 30), "/"); // 86400 = 1 day


		}
	}
} else {
	$retorno = "security";
}
echo $retorno;
