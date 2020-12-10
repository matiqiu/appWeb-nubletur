<?php
    function insertAsistencia($id_usuario, $presentacion, $contenido, $fecha_publicacion)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                $query="INSERT INTO Asistencia Values (?,?,?,?);";
                $stmt=$db_conn->prepare($query);
                $stmt->bindParam(1,$id_usuario);
                $stmt->bindParam(2,$presentacion);
                $stmt->bindParam(3,$contenido);
                $stmt->bindParam(4,$fecha_publicacion);
                $stmt ->execute();
                $stmt=null;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function editAsistencia($id_asistencia,$id_usuario, $presentacion, $contenido, $fecha_publicacion)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                $query="UPDATE Asistencia SET presentacion=?,contenido=? where id_asistencia=? and id_usuario=?;";
                $stmt=$db_conn->prepare($query);
                $stmt->bindParam(1,$presentacion);
                $stmt->bindParam(2,$contenido);
                $stmt->bindParam(3,$id_asistencia);
                $stmt->bindParam(4,$id_usuario);
                $stmt ->execute();
                $stmt=null;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
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
                if($id_asistencia!="")
                {
                    $query="DELETE FROM Asistencia Where id_asistencia=?";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$id_asistencia);
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
    function selectAsistencia($id_asistencia)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_asistencia!="")
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Asistencia where id_asistencia=".$id_asistencia);
                }
                else
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Asistencia");
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