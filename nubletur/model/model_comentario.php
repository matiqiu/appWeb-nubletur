<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function insertComentario($id_usuario, $id_evento, $contenido)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "INSERT INTO comentario (id_usuario, id_evento, contenido, estado) Values (?,?,?,?);";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $id_evento);
            $stmt->bindParam(3, $contenido);
            $stmt->bindParam(4, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function editComentario($id_comentario, $id_usuario_evento, $contenido)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id_comentario != "") {
                $query = "UPDATE Comentarios SET contenido=? WHERE id_comentario=? and id_usuario_evento=?;";
                $stmt = $db_conn->prepare($query);
                $stmt->bindParam(1, $contenido);
                $stmt->bindParam(2, $id_comentario);
                $stmt->bindParam(3, $id_usuario_evento);
                $stmt->execute();
                $stmt = null;
            } else {
                echo "<b>ERROR</b>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function deleteComentario($id_comentario)
{
    global $db_conn;
    if (conectar()) {
        try {
            $stmt = $db_conn->prepare("DELETE FROM comentario WHERE id_comentario=:id_comentario");
            $stmt->execute(array(":id_comentario" => $id_comentario,));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectComentario($id)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id == "") {
                $stmt = $db_conn->prepare("SELECT comentario.* FROM comentario where comentario.estado=1 ");
            } else {
                $stmt = $db_conn->prepare("SELECT comentario.* FROM comentario where comentario.estado=1 and id_evento ='" . $id . "'  order by fecha desc");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectComentariosTodos()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT comentario.* FROM comentario order by fecha desc");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
