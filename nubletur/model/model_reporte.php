<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function insertReporteEvento($id_evento, $motivo, $descripcion_reporte)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "INSERT INTO reporte (id_evento, motivo, descripcion_reporte, estado) Values (?,?,?,?);";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_evento);
            $stmt->bindParam(2, $motivo);
            $stmt->bindParam(3, $descripcion_reporte);
            $stmt->bindParam(4, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function insertReporteComentario($id_comentario, $motivo, $descripcion_reporte)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "INSERT INTO reporte (id_comentario, motivo, descripcion_reporte, estado) Values (?,?,?,?);";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_comentario);
            $stmt->bindParam(2, $motivo);
            $stmt->bindParam(3, $descripcion_reporte);
            $stmt->bindParam(4, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectReportes()
{
    global $db_conn;
    if (conectar()) {
        try {
                $stmt = $db_conn->prepare("SELECT reporte.* FROM reporte order by fecha desc");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}