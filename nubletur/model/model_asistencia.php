<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function insertAsistencia($id_usuario, $id_evento)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "INSERT INTO asistencia (id_usuario, id_evento, estado) Values (?,?,?);";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $id_evento);
            $stmt->bindParam(3, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectAsistencia($id_evento)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id_evento == "") {
                $stmt = $db_conn->prepare("SELECT asistencia.* FROM asistencia where asistencia.estado=1 ");
            } else {
                $stmt = $db_conn->prepare("SELECT asistencia.* FROM asistencia where asistencia.estado=1 and id_evento = $id_evento");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectAsistenciaUsuarioEvento($id_usuario,$id_evento)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id_usuario == "") {
                $stmt = $db_conn->prepare("SELECT asistencia.* FROM asistencia where asistencia.estado=1 ");
            } else {
                $stmt = $db_conn->prepare("SELECT asistencia.* FROM asistencia where asistencia.estado=1 and id_usuario = $id_usuario and id_evento = $id_evento");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function deleteAsistencia($id_asistencia)
{  
	global $db_conn;   
	if(conectar())
	{ 
		try
		{    
			$stmt = $db_conn->prepare("DELETE FROM asistencia WHERE id_asistencia=:id_asistencia");
			$stmt->execute(array(":id_asistencia"=>$id_asistencia, )); 
		}
		catch(PDOException $e)
		{ 
			echo $e->getMessage();
		} 
	} 
	  
}