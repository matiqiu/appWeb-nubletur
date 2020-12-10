<?php
    function insertUser($nombre,$localidad,$empresa,$fecha_reg,$pass,$email,$tipo_cta,$rubro,$comuna)
    {
        global $db_conn;
        if(conectar())
        {
            try {
               $query="INSERT INTO UsuarioEventos (id_usuario, nombre, localidad, empresa, fecha_reg, password, email, tipo_cta, rubro, comuna) VALUES (?,?,?,?,?,?,?,?,?);";
               $stmt=$db_conn->prepare($query);
               $stmt->bindParam(1,$nombre);
               $stmt->bindParam(2,$localidad);
               $stmt->bindParam(3,$empresa);
               $stmt->bindParam(4,$fecha_reg);
               $stmt->bindParam(5,$pass);
               $stmt->bindParam(6,$email);
               $stmt->bindParam(7,$tipo_cta);
               $stmt->bindParam(8,$rubro);
               $stmt->bindParam(9,$comuna);
               $stmt ->execute();
               $stmt=null;
               
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    function editUser($id,$nombre,$localidad,$empresa,$pass,$email,$tipo_cta,$rubro,$comuna)
    {
        global $db_conn;   
        if(conectar())
        {
            try 
            {
                if($pass=="")
                {
                    $query="UPDATE UsuarioEvento SET nombre=?,localidad=?,empresa=?,email=?,tipo_cta=?,rubro=?,comuna=? where id_usuario=?;";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$nombre);
                    $stmt->bindParam(2,$localidad);
                    $stmt->bindParam(3,$empresa);
                    $stmt->bindParam(4,$email);
                    $stmt->bindParam(5,$tipo_cta);
                    $stmt->bindParam(6,$rubro);
                    $stmt->bindParam(7,$comuna);
                    $stmt->bindParam(8,$id);
                    return ($stmt->execute()) ? true : false;
                }
                else
                {
                    $query="UPDATE UsuarioEvento SET nombre=?,localidad=?,empresa=?,password=?,email=?,tipo_cta=?,rubro=?,comuna=? where id_usuario=?;";
                    $stmt=$db_conn->prepare($query);
                    $stmt->bindParam(1,$nombre);
                    $stmt->bindParam(2,$localidad);
                    $stmt->bindParam(3,$empresa);
                    $stmt->bindParam(4,$pass);
                    $stmt->bindParam(5,$email);
                    $stmt->bindParam(6,$tipo_cta);
                    $stmt->bindParam(7,$rubro);
                    $stmt->bindParam(8,$comuna);
                    $stmt->bindParam(9,$id);
                    return ($stmt->execute()) ? true : false;     
                }
            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function deleteUser($id)
    {
        global $db_conn;   
        if(conectar())
        {
            try 
            {
                $query="DELETE FROM UsuarioEventos WHERE id_usuario=?;";
                $stmt=$db_conn->prepare($query);
                $stmt->bindParam(1,$id);
            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
        }
    }
    function selectUser($id)
    {
        global $db_conn;   
        if(conectar())
        {
            try 
            {
               if($id=="")
               {
                    $stmt = $db_conn->prepare("SELECT * from UsuarioEventos");
               }
               else
               {
                    $stmt = $db_conn->prepare("SELECT * from UsuarioEventos where id_usuario=".$id);
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