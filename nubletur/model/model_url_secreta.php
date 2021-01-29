<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function insert_url_secreta($id_usuario, $email)
{
    $longitud = 10;

    $caracteres = '0123456789qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for ($i = 0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }


    global $db_conn;
    if (conectar()) {
        try {

            $url_secreta = hash('sha256', $string_aleatorio . $id_usuario);

            //$url_secreta2 = $url_secreta . "-#" . $id_usuario;

            $query = "INSERT INTO url_secreta (id_usuario, email_usuario, url_secreta) Values (?,?,?);";

            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $url_secreta);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function selectUrlSecreta($url_secreta)
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT url_secreta.* FROM url_secreta where url_secreta='" . $url_secreta . "'");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}

function selectUrlSecretaUser()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("select * from url_secreta order by id_url_secreta desc limit 1");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}


