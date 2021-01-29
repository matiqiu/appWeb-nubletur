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
    $telefono                  = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
    $comuna                  = htmlspecialchars($_POST['comuna'], ENT_QUOTES, 'UTF-8');
    $localidad                  = htmlspecialchars($_POST['localidad'], ENT_QUOTES, 'UTF-8');
    $empresa                  = htmlspecialchars($_POST['empresa'], ENT_QUOTES, 'UTF-8');
    $rubro                  = htmlspecialchars($_POST['rubro'], ENT_QUOTES, 'UTF-8');

    $retorno_query  = editUserEvento($id, $telefono, $comuna, $localidad, $empresa, $rubro);

    $retorno = "ok";
    global $db_conn;
    if (conectar()) {


        $stmt = $db_conn->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario");
        $stmt->execute(array(":id_usuario" => $id));
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        $id_usuario = $fila['id_usuario'];
        $retorno_query2 = insertPrivilegio2($fila['id_usuario']);

        $stmt2 = $db_conn->prepare("SELECT * FROM privilegio WHERE id_usuario=:id_usuario");
        $stmt2->execute(array(":id_usuario" => $id_usuario));
        //$stmt2->bindParam(1,$id_usuario);
        //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC); 
        $array_privilegios = "";
        while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            if ($array_privilegios == "") {
                $array_privilegios = $fila2["tipo_privilegio"];
            } else {
                $array_privilegios = $array_privilegios . "," . $fila2["tipo_privilegio"];
            }
        }
        setcookie("array_privilegios", $array_privilegios, time() + (86400 * 30), "/"); // 86400 = 1 day


    }
} else {
    $retorno = "security";
}
echo $retorno;
