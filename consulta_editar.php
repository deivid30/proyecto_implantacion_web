<html>
<head>
  <title>Listado usuario</title>
</head>

<body>

<?php
   require_once "bda.php";
   function recoge($var)
   {
       $tmp = (isset($_REQUEST[$var]))
       ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
       : "";
       return $tmp;
   }
   
   
   $usuario=recoge("usuario");
   try{
       $base=conectadb();
       $sql="select usuario, password, nombre, apellidos from usuarios where usuario like '%$usuario%'";
       $resultado=$base->prepare($sql);
       $resultado->execute();
       while($registro=$resultado->fetch()){
           echo "<form action='actualizar.php' method='post'>";
           echo "<input type='text' name='usuario' value='" . $registro['usuario'] . "' readonly='readonly'><br>";
           echo "<input type='text' name='password' value='" . $registro['password'] . "'><br>";
           echo "<input type='text' name='nombre' value='" . $registro['nombre'] . "'><br>";
           echo "<input type='text' name='apellidos' value='" . $registro['apellidos'] . "'><br>";
           echo "<input type='submit' name='enviar' value='Enviar'>";
           echo "</form>";
           echo "<br>";
               
       }
       $resultado->closeCursor();
   }catch(exception $e){
       die('Error: ' .$e->GetMessage());
       
   }finally{
       $base=null;
   }
   
   
?>
<br>
<a href="menu.php">Volver al menú</a>
</body>
</html>
