<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_user.php");
include("../../model/model_privilegio.php");

$retorno = "mal";
if (isset($_POST['id'])) {
    $id                  = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $nombre_pyme                  = htmlspecialchars($_POST['nombre_pyme'], ENT_QUOTES, 'UTF-8');
    $descripcion_pyme                  = htmlspecialchars($_POST['descripcion_pyme'], ENT_QUOTES, 'UTF-8');
    $telefono                  = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
    $comuna                  = htmlspecialchars($_POST['comuna'], ENT_QUOTES, 'UTF-8');
    $localidad                  = htmlspecialchars($_POST['localidad'], ENT_QUOTES, 'UTF-8');
    $rubro                  = htmlspecialchars($_POST['rubro'], ENT_QUOTES, 'UTF-8');

    $retorno_query  = editPyme($id, $nombre_pyme, $descripcion_pyme, $telefono, $comuna, $localidad, $rubro);

    $retorno = "ok";

} else {
    $retorno = "security";
}
echo $retorno;
