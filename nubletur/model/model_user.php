<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function insertUser1($nombre, $email, $password)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "insert into usuario (nombre, email, password, estado) values (?,?,?,?)";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $email);
            $stmt->bindValue(3, password_hash($password, PASSWORD_DEFAULT));
            $stmt->bindParam(4, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function editUserEvento($id, $telefono, $comuna, $localidad, $empresa, $rubro)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "UPDATE usuario SET telefono=?,comuna=?,localidad=?,empresa=?,rubro=?,fecha_registro=NOW() where id_usuario=?;";
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $telefono);
            $stmt->bindParam(2, $comuna);
            $stmt->bindParam(3, $localidad);
            $stmt->bindParam(4, $empresa);
            $stmt->bindParam(5, $rubro);
            $stmt->bindParam(6, $id);
            return ($stmt->execute()) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function editPyme($id, $nombre_pyme, $descripcion_pyme, $telefono, $comuna, $localidad, $rubro, $imagen_pyme)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "UPDATE usuario SET nombre_pyme=?, descripcion_pyme=?, telefono=?,comuna=?,localidad=?,rubro=?,imagen_pyme=?,fecha_registro=NOW() where id_usuario=?;";
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $nombre_pyme);
            $stmt->bindParam(2, $descripcion_pyme);
            $stmt->bindParam(3, $telefono);
            $stmt->bindParam(4, $comuna);
            $stmt->bindParam(5, $localidad);
            $stmt->bindParam(6, $rubro);
            $stmt->bindParam(7, $imagen_pyme);
            $stmt->bindParam(8, $id);
            return ($stmt->execute()) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function deleteUser($id)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "DELETE FROM UsuarioEventos WHERE id_usuario=?;";
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectUser($id)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id == "") {
                $stmt = $db_conn->prepare("SELECT usuario.* from usuario WHERE usuario.estado=1");
            } else {
                $stmt = $db_conn->prepare("SELECT usuario.* from usuario where usuario.estado=1 and id_usuario='" . $id . "'");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectUltimoUser()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT id_usuario from usuario  order by fecha_registro desc limit 1");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function editPassword($id_usuario, $password)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "UPDATE usuario SET password=? where id_usuario=?;";
            $stmt = $db_conn->prepare($query);
            $stmt->bindValue(1, password_hash($password, PASSWORD_DEFAULT));
            $stmt->bindParam(2, $id_usuario);
            return ($stmt->execute()) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectPymeRandom()
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT * from usuario WHERE nombre_pyme is not null ORDER BY RAND() limit 6");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectPyme($id)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id == "") {
                $stmt = $db_conn->prepare("SELECT usuario.* from usuario WHERE usuario.estado=1 and nombre_pyme is not null");
            } else {
                $stmt = $db_conn->prepare("SELECT usuario.* from usuario WHERE usuario.estado=1 and id_usuario ='" . $id . "' and nombre_pyme is not null");
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function buscaUserRepetido($email)
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT usuario.* from usuario WHERE usuario.email='$email'");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function selectUserPorEmail($email)
{
    global $db_conn;
    if (conectar()) {
        try {

            $stmt = $db_conn->prepare("SELECT usuario.* from usuario WHERE email = $email");

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
