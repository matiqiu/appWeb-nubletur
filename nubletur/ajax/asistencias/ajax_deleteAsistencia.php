<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_asistencia.php");
$retorno = "mal";

$id_asistencia = htmlspecialchars($_POST['id_asistencia'], ENT_QUOTES, 'UTF-8');
deleteAsistencia($id_asistencia);
$retorno = "ok";

echo $retorno;
