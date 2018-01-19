<?php
// FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
function conectaDb()
{
    try{
        $tmp = new PDO('mysql:host=localhost;dbname=iaw', 'root', '');
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $tmp->exec("set names utf8mb4");
        return($tmp);
    }
    catch(PDOException $e) {
        print "  <p>Error: No puede conectarse con la base de datos.</p>\n\n";
        print"  <p>Error: ". $e->getMessage() ."</p>\n";
        exit();
    }
}
?>
    