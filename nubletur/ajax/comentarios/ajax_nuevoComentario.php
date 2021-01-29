<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_comentario.php");

$retorno = "mal";
if (isset($_POST['contenido'])) {
    $id_usuario                   = htmlspecialchars($_POST['id_usuario'], ENT_QUOTES, 'UTF-8');
    $id_evento                   = htmlspecialchars($_POST['id_evento'], ENT_QUOTES, 'UTF-8');
    $contenido                   = htmlspecialchars($_POST['contenido'], ENT_QUOTES, 'UTF-8');
    $estado                        = "1";
    $retorno_query  = insertComentario($id_usuario, $id_evento, $contenido, $estado);

    $retorno = "ok";
} else {
    $retorno = "security";
}
echo $retorno;