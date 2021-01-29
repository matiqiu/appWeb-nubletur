<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_producto.php");
 	$retorno="mal";
      
		$id_producto=htmlspecialchars($_POST['id_delete'], ENT_QUOTES, 'UTF-8'); 
		deleteProducto($id_producto); 
		$retorno="ok";
	 
	echo $retorno;
?>