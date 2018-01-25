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
$password=recoge("password");
$nombre=recoge("nombre");
$apellidos=recoge("apellidos");

try {
    $base=conectadb();
    //Funcion para insertar los datos
    $sql="UPDATE usuarios SET usuario='$usuario', password='$password', nombre='$nombre', apellidos='$apellidos' WHERE usuario='$usuario' ";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":usuario"=>$usuario, ":password"=>$password, ":nombre"=>$nombre, ":apellidos"=>$apellidos));
    
    
    echo "Registro actualizado de $usuario <br>";
    echo "<a href='menu.php'>Volver al menu</a>";   
    
    
    
    
    $resultado->closeCursor();
    
    
    
    
    
}catch (Exception $e) {
    die('Error: ' .$e->GetMessage());
    
}finally{
    $base=null;
}