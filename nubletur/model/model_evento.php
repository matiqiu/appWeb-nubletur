<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//echo Carbon::now()->day;

function insertEvento($id_usuario, $nombre_evento, $dia_inicio, $dia_termino, $hora_inicio, $hora_termino, $direccion, $localidad, $region, $latitud, $longitud, $contenido, $contenido2, $imagen_evento, $estado)
{
    global $db_conn;
    if (conectar()) {

        try {
            $query = "INSERT INTO evento (id_usuario, nombre_evento, dia_inicio, dia_termino, hora_inicio, hora_termino, direccion, localidad, region, latitud, longitud, contenido, contenido2, imagen_evento, estado) Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $nombre_evento);
            $stmt->bindParam(3, $dia_inicio);
            $stmt->bindParam(4, $dia_termino);
            $stmt->bindParam(5, $hora_inicio);
            $stmt->bindParam(6, $hora_termino);
            $stmt->bindParam(7, $direccion);
            $stmt->bindParam(8, $localidad);
            $stmt->bindParam(9, $region);
            $stmt->bindParam(10, $latitud);
            $stmt->bindParam(11, $longitud);
            $stmt->bindParam(12, $contenido);
            $stmt->bindParam(13, $contenido2);
            $stmt->bindParam(14, $imagen_evento);
            $stmt->bindParam(15, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectEventos($id)
{

    global $db_conn;
    if (conectar()) {
        try {
            if ($id == "") {
                $stmt = $db_conn->prepare("SELECT evento.* FROM evento order by dia_inicio asc");
            } else {
                $stmt = $db_conn->prepare("SELECT evento.* FROM evento where id_evento ='" . $id . "' order by dia_inicio asc");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectEventosTodos()
{
    global $db_conn;
    if (conectar()) {
        try {
                $stmt = $db_conn->prepare("SELECT evento.* FROM evento order by dia_inicio asc");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function select3eventos($id)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id == "") {
                $stmt = $db_conn->prepare("SELECT evento.* FROM evento where dia_termino >= now() and evento.estado=1 order by dia_inicio asc limit 3");
            } else {
                $stmt = $db_conn->prepare("SELECT evento.* FROM evento where dia_termino >= now() and evento.estado=1 and id_evento ='" . $id . "' order by dia_inicio asc limit 3");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectUltimoEvento()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT max(id_evento) FROM evento");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function select3EventosPasados()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("select * from evento where dia_termino < now() order by dia_termino desc limit 3");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectEventosLista($iniciar,$eventos_x_pagina)
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT * FROM evento where dia_termino >= now() order by dia_inicio asc LIMIT :iniciar,:neventos");
            $stmt->bindParam(':iniciar',$iniciar, PDO::PARAM_INT);
            $stmt->bindParam(':neventos',$eventos_x_pagina, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectUltimoEventoMas()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt2 = selectUltimoEvento();
            $fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $ultimo_evento = $fila2["max(id_evento)"];

            $stmt = $db_conn->prepare("SELECT MAX($ultimo_evento+1) FROM evento");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function editEvento($id_evento, $nombre_evento, $dia_inicio, $dia_termino, $hora_inicio, $hora_termino, $direccion, $localidad, $region, $latitud, $longitud, $contenido, $contenido2)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "UPDATE evento SET nombre_evento=?,dia_inicio=?,dia_termino=?,hora_inicio=?,hora_termino=?,direccion=?,localidad=?,region=?,latitud=?,longitud=?,contenido=?,contenido2=? where id_evento=?;";
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $nombre_evento);
            $stmt->bindParam(2, $dia_inicio);
            $stmt->bindParam(3, $dia_termino);
            $stmt->bindParam(4, $hora_inicio);
            $stmt->bindParam(5, $hora_termino);
            $stmt->bindParam(6, $direccion);
            $stmt->bindParam(7, $localidad);
            $stmt->bindParam(8, $region);
            $stmt->bindParam(9, $latitud);
            $stmt->bindParam(10, $longitud);
            $stmt->bindParam(11, $contenido);
            $stmt->bindParam(12, $contenido2);
            $stmt->bindParam(13, $id_evento);
            return ($stmt->execute()) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function deleteEvento($id_evento)
{
    global $db_conn;
    if (conectar()) {
        try {
            $stmt = $db_conn->prepare("DELETE FROM evento WHERE id_evento=:id_evento");
            $stmt->execute(array(":id_evento" => $id_evento,));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
