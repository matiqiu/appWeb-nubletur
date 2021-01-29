<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function insertPrivilegio1($id_usuario)
{

    global $db_conn;
    if (conectar()) {
        try {
            $query = "insert into privilegio (id_usuario, tipo_privilegio) values (?,?);";
            $tipo_privilegio = 1;

            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $tipo_privilegio);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function insertPrivilegio2($id_usuario)
{

    global $db_conn;
    if (conectar()) {
        try {
            $query = "insert into privilegio (id_usuario, tipo_privilegio) values (?,?);";
            $tipo_privilegio = 2;

            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $tipo_privilegio);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function insertPrivilegio3($id_usuario)
{

    global $db_conn;
    if (conectar()) {
        try {
            $query = "insert into privilegio (id_usuario, tipo_privilegio) values (?,?);";
            $tipo_privilegio = 3;

            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $tipo_privilegio);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


//////////////////////////////////////////////////////////

function editPrivilegio($id_privilegio, $id_usuario, $tipo_priv)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id_privilegio != "" and $id_usuario != "") {
                $query = "UPDATE Privilegio SET tipo_priv=? WHERE id_privilegio=? and id_usuario=?;";
                $stmt = $db_conn->prepare($query);
                $stmt->bindParam(1, $tipo_priv);
                $stmt->bindParam(2, $id_privilegio);
                $stmt->bindParam(3, $id_usuario);
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
function deletePrivilegio($id_privilegio)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id_privilegio != "") {
                $query = "DELETE FROM Privilegio Where id_privilegio=?";
                $stmt = $db_conn->prepare($query);
                $stmt->bindParam(1, $id_privilegio);
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
function selectPrivilegio($id_privilegio)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id_privilegio != "") {
                $stmt = $db_conn->prepare("SELECT * FROM Privilegio where id_privilegio=" . $id_privilegio);
            } else {
                $stmt = $db_conn->prepare("SELECT * FROM Privilegio");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
