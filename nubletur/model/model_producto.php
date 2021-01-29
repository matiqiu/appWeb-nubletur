<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function insertProducto($id_usuario, $nombre, $descripcion, $precio)
{
    global $db_conn;
    if (conectar()) {
        try {
            $query = "INSERT INTO producto (id_usuario, nombre, descripcion, precio, estado) Values (?,?,?,?,?);";
            $estado = 1;
            $stmt = $db_conn->prepare($query);
            $stmt->bindParam(1, $id_usuario);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $descripcion);
            $stmt->bindParam(4, $precio);
            $stmt->bindParam(5, $estado);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
function selectProducto($id)
{
    global $db_conn;
    if (conectar()) {
        try {
            if ($id == "") {
                $stmt = $db_conn->prepare("SELECT producto.* FROM producto where producto.estado=1 ");
            } else {
                $stmt = $db_conn->prepare("SELECT producto.* FROM producto where producto.estado=1 and id_usuario =$id");
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "<b>ERROR</b>: " . $e->getMessage();
        }
    }
}
function deleteProducto($id_producto)
{  
	global $db_conn;   
	if(conectar())
	{ 
		try
		{    
			$stmt = $db_conn->prepare("DELETE FROM producto WHERE id_producto=:id_producto");
			$stmt->execute(array(":id_producto"=>$id_producto, )); 
		}
		catch(PDOException $e)
		{ 
			echo $e->getMessage();
		} 
	} 
	  
}