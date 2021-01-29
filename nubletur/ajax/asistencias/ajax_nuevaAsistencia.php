<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_asistencia.php");

$retorno = "mal";
if (isset($_POST['id_usuario2'])) {
    $id_usuario                   = htmlspecialchars($_POST['id_usuario2'], ENT_QUOTES, 'UTF-8');
    $id_evento                   = htmlspecialchars($_POST['id_evento2'], ENT_QUOTES, 'UTF-8');
    $estado                        = "1";
    $retorno_query  = insertAsistencia($id_usuario, $id_evento, $estado);

    $retorno = "ok";
} else {
    $retorno = "security";
}
echo $retorno;