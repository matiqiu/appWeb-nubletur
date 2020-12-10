<?php
    define("DB_HOST", "tesisnuble2020.ccb0l5jnabt7.us-east-2.rds.amazonaws.com");
	define("DB_USER", "admin");
	define("DB_PASS", "tesisnubletur2020");
	define("DB_NAME", "NubleTur"); 

    $db_conn;
    function conectar()
    {
        global $db_conn;
        $return = true;
        try
        {
            $db_conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";",DB_USER,DB_PASS);
  		    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
	    {
  		    echo $e->getMessage();
		    $return=false;
 	    }	
	    return $return;
    }
?>