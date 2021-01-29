<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_producto.php");

$retorno = "mal";
if (isset($_POST['id_usuario2'])) {
    $id_usuario                   = htmlspecialchars($_POST['id_usuario2'], ENT_QUOTES, 'UTF-8');
    $nombre                   = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $descripcion                   = htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');
    $precio                   = htmlspecialchars($_POST['precio'], ENT_QUOTES, 'UTF-8');
    $estado                        = "1";
    $retorno_query  = insertProducto($id_usuario, $nombre, $descripcion, $precio, $estado);

    $retorno = "ok";
} else {
    $retorno = "security";
}
echo $retorno;