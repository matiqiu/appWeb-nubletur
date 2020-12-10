<?php
    function insertEvento($id_usuario_eventos,$id_asistencia,$nombre,$localidad, $direccion, $contenido)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                $query="INSERT INTO Evento Values (?,?,?,?,?,?);";
                $stmt=$db_conn->prepare($query);
                $stmt->bindParam(1,$id_usuario_eventos);
                $stmt->bindParam(2,$id_asistencia);
                $stmt->bindParam(3,$nombre);
                $stmt->bindParam(4,$localidad);
                $stmt->bindParam(5,$direccion);
                $stmt->bindParam(6,$contenido);
                $stmt ->execute();
                $stmt=null;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function editEvento($id_evento, $id_usuario_eventos, $nombre, $localidad, $direccion, $contenido)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_usuario_eventos!="" and $id_evento !="")
                {
                    $query="UPDATE Evento SET nombre=?,localidad=?,direccion=?,contenido=? WHERE id_evento=? and id_usuario_eventos=?;";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$nombre);
                    $stmt->bindParam(2,$localidad);
                    $stmt->bindParam(3,$direccion);
                    $stmt->bindParam(4,$contenido);
                    $stmt->bindParam(5,$id_evento);
                    $stmt->bindParam(6,$id_usuario_eventos);
                    $stmt ->execute();
                    $stmt=null;
                }
                else
                {
                    echo "<b>ERROR</b>";
                }
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function deleteEvento($id_evento)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_evento!="")
                {
                    $query="DELETE FROM Evento Where id_evento=?";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$id_evento);
                    $stmt ->execute();
                    $stmt=null;
                }
                else
                {
                    echo "<b>ERROR</b>";
                }
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }

    }
    function selectEventos($id_evento)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_evento!="")
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Evento where id_evento=".$id_evento);
                }
                else
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Evento");
                }
                $stmt->execute();
                return $stmt;
            }
            catch (PDOException $e) 
            {
                echo "<b>ERROR</b>: ". $e->getMessage();
            }
        }

    }

?>