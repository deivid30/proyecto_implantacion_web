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
    $sql="INSERT INTO usuarios (usuario, password, nombre, apellidos) values(:usuario, :password, :nombre, :apellidos)";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":usuario"=>$usuario, ":password"=>$password, ":nombre"=>$nombre, ":apellidos"=>$apellidos));
    
    
    echo "Registro insertado de $usuario <br>";
    echo "<a href='menu.php'>Volver al menu</a>";   
    
    
    
    
    $resultado->closeCursor();
    
    
    
    
    
}catch (Exception $e) {
    die('Error: ' .$e->GetMessage());
    
}finally{
    $base=null;
}