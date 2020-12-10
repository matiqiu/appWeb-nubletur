<?php
    function insertComentario($id_usuario_evento, $id_evento, $fecha, $contenido)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                $query="INSERT INTO Comentarios Values (?,?,?,?);";
                $stmt=$db_conn->prepare($query);
                $stmt->bindParam(1,$id_usuario_evento);
                $stmt->bindParam(2,$id_evento);
                $stmt->bindParam(3,$fecha);
                $stmt->bindParam(4,$contenido);
                $stmt ->execute();
                $stmt=null;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function editComentario($id_comentario,$id_usuario_evento,$contenido)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_comentario!="")
                {
                    $query="UPDATE Comentarios SET contenido=? WHERE id_comentario=? and id_usuario_evento=?;";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$contenido);
                    $stmt->bindParam(2,$id_comentario);
                    $stmt->bindParam(3,$id_usuario_evento);
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
    function deleteComentario($id_comentario)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_comentario!="")
                {
                    $query="DELETE FROM Comentarios Where id_comentario=?";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$id_comentario);
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
    function selectComentario($id_comentario)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_comentario!="")
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Comentarios where id_comentario=".$id_comentario);
                }
                else
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Comentarios");
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