<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header('Content-Type: text/html; charset=utf-8');
   
    define("DB_HOST", "tesisnuble2020.ccb0l5jnabt7.us-east-2.rds.amazonaws.com");
    define("DB_USER", "admin");
    define("DB_PASS", "tesis1234");
    define("DB_NAME", "nubletur");

    $db_conn;
    function conectar()
    {
        global $db_conn;
    
        $return = true;
        try {
            $db_conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";", DB_USER, DB_PASS);
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db_conn->exec("SET CHARACTER SET utf8");
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            $return = false;
        }
        return $return;
    }
    
?>