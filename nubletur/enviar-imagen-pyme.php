<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
include("model/model_user.php");

$stmt = selectUltimoUser();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);


$ruta_carpeta = "fotos-pymes/";
$nombre_archivo = $fila["id_usuario"]; //. "." . pathinfo($_FILES["imagen_evento"]["name"], PATHINFO_EXTENSION)
$ruta_guardar_archivo = $ruta_carpeta . $nombre_archivo;


if (move_uploaded_file($_FILES["imagen_pyme"]["tmp_name"], $ruta_guardar_archivo)) {
    echo "imagen cargada";
} else {
    echo "no se pudo cargar";
}
