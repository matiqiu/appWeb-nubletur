<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_comentario.php");
 	$retorno="mal";
      
		$id_comentario=htmlspecialchars($_POST['id_delete'], ENT_QUOTES, 'UTF-8'); 
		deleteComentario($id_comentario); 
		$retorno="ok";
	 
	echo $retorno;
?>