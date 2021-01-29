<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../_drivers/funciones.php");
include("../../model/model_url_secreta.php");


$retorno = "mal";

$email                   = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');


if (conectar()) {

    try {
        $stmt = $db_conn->prepare("SELECT * FROM usuario WHERE email=:email");
        $stmt->execute(array(":email" => $email));
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_usuario = $fila['id_usuario'];

        $cuantas_rows = $stmt->rowCount();

        if ($cuantas_rows == 0) {

            $retorno = "no";
        } else if ($cuantas_rows > 0) {

            ///////// URL SECRETA

            //////// FIN


            $retorno_query  = insert_url_secreta($id_usuario, $email);



            ///////////// EMAIL

            $stmt = selectUrlSecretaUser();
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $url_secreta = $fila['url_secreta'];


            $asunto = "Recuperar contraseña Ñubletur";
            $mensaje = "Ingrese al siguiente link en el que podra restrablecer su contraseña: " . "\r\n" . "\r\n" . "https://matiqiuplace.000webhostapp.com/recuperar-password2.php?url_secreta=" . $url_secreta;


            $header = "Mensaje envíado desde #Ñubletur" . "\r\n";


            mail($email, $asunto, $mensaje, $header);

            //////////////// FIN

            $retorno = "ok";
        }
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}


echo $retorno;
