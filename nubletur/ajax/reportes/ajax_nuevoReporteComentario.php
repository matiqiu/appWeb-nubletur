<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_reporte.php");

$retorno = "mal";
if (isset($_POST['motivo'])) {
    $id_comentario                   = htmlspecialchars($_POST['id_comentario'], ENT_QUOTES, 'UTF-8');
    $motivo                   = htmlspecialchars($_POST['motivo'], ENT_QUOTES, 'UTF-8');
    $descripcion_reporte                   = htmlspecialchars($_POST['descripcion_reporte'], ENT_QUOTES, 'UTF-8');
    $estado                        = "1";
    $retorno_query  = insertReporteComentario($id_comentario, $motivo, $descripcion_reporte, $estado);

    $retorno = "ok";
} else {
    $retorno = "security";
}
echo $retorno;