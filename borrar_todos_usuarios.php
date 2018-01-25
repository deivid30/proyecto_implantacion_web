<?php
require_once 'bda.php';
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
    ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
    : "";
    return $tmp;
}
$usuario=recoge("usuario");

try {
    $base=conectadb();
    //Funcion para insertar los datos
    $sql="DELETE FROM usuarios";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":usuario"=>$usuario));
   
    
    
    echo "Borrado correcto de la base datos <br>";
    echo "<a href='menu.php'>Volver al menu</a>";   
    
    
    
    
    $resultado->closeCursor();
    
    
    
    
    
}catch (Exception $e) {
    die('Error: ' .$e->GetMessage());
    
}finally{
    $base=null;
}
