<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
include("../../_drivers/funciones.php");
include("../../model/model_user.php");

$id_usuario = $_COOKIE['id_usuario'];

$stmt = selectUser($id_usuario);
$cuantas_rows = $stmt->rowCount();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
$nombre = $fila['nombre'];
$email = $fila['email'];
*/
//$retorno = "mal";

    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    
    $destino = "nubletur@gmail.com";

    $header ="Mensaje envíado desde #Ñubletur" . "\r\n" . "De: " . $nombre . "\r\n" . "Email: " . $email . "\r\n";

    
    mail($destino,$asunto,$mensaje,$header);

    echo '<script> 
    alert("Mensaje envíado con éxito.");
    location.href = "index.php";

    </script>';



//echo $retorno;



?>