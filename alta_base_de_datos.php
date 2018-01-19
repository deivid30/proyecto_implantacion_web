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
    $stmt=$pdo->prepare("INSERT INTO usuarios (usuario, password, nombre, apellidos) values(:usuario, :password, :nombre, :apellidos)");
    $datos=array(':name'=>'usuario', ':password'=>'password', ':nombre'=>'nombre', ':apellidos'=>'apellidos');
    
    
    
    
}catch (Exception $e) {
    die('Error: ' .$e->GetMessage());
    
}finally{
    $base=null;
}