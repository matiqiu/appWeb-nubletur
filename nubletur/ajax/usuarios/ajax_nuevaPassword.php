<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_user.php");

$retorno = "mal";
if (isset($_POST['id_usuario'])) {
    $id_usuario=htmlspecialchars($_POST['id_usuario'], ENT_QUOTES, 'UTF-8');
    $password=htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'); 

    $retorno_query = editPassword($id_usuario, $password);

    $retorno = "ok";

} else {
    $retorno = "security";
}
echo $retorno;
