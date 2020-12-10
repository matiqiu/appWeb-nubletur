<?php
    function insertPrivilegio($id_usuario,$tipo_priv)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                $query="INSERT INTO Privilegio Values (?,?);";
                $stmt=$db_conn->prepare($query);
                $stmt->bindParam(1,$id_usuario);
                $stmt->bindParam(2,$tipo_priv);
                $stmt ->execute();
                $stmt=null;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function editPrivilegio($id_privilegio,$id_usuario,$tipo_priv)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_privilegio!="" and $id_usuario !="")
                {
                    $query="UPDATE Privilegio SET tipo_priv=? WHERE id_privilegio=? and id_usuario=?;";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$tipo_priv);
                    $stmt->bindParam(2,$id_privilegio);
                    $stmt->bindParam(3,$id_usuario);
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
    function deletePrivilegio($id_privilegio)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_privilegio!="")
                {
                    $query="DELETE FROM Privilegio Where id_privilegio=?";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$id_privilegio);
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
    function selectPrivilegio($id_privilegio)
    {
        global $db_conn;
        if(conectar())
        {
            try 
            {
                if($id_privilegio!="")
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Privilegio where id_privilegio=".$id_privilegio);
                }
                else
                {
                    $stmt=$db_conn->prepare("SELECT * FROM Privilegio");
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